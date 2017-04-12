<?php

namespace Maderwin;

class Validator {
    /**
     * Validation rules array. It has the following structure:
     * [
     *  [
     *       [[[array_key, subarray_key, ...], ...], validation_type, options],
     *        ...
     *  ],
     * ...
     * ]
     * where array_key, subarray_key - keys for array and nested arrays to get value,
     * options - additional constraints for validation or setting scenario
     * validation_type:
     *      required; options - trim(do not allow only spaces)
     *      integer, float; options - min(minimal value inclusive), max(maximal value inclusive)
     *      string; options - min(minimal length inclusive),
     *                        max(maximal length inclusive),
     *                        regex(matches given regex),
     *                        only - array or scalar of limitations to string symbols
     *                              can be predefined or regex part, see example below
     *      date; options - format
     *      email;
     *      inn; options - legal (boolean, default true)(legal entity - 10 chars), natural (boolean, default true)(natural person - 12 chars)
     *      boolean;
     *      enum; options - values (array)
     *      equal; options - value (mixed)
     *      by_callback; options - callback(callback for validating: ($value) -> boolean)
     * Example of rules:
     * [[
     *   [['smth_string_value'], 'string', 'only' => ['cyrillic', 'latin', 'number', 'space', '\w']],
     *   [[['no', 'trimmed'], ['second', 'not', 'trimmed']], 'required'],
     *   [['trimmed', ['second', 'trimmed']], 'required', 'trim' => true],
     *   [[['int', 'max'], ['second', 'trimmed']], 'integer', 'min' => 16, 'scenario' => 'update'],
     *   [[['int', 'max']], 'integer', 'max' => 10, 'scenario' => 'create'],
     *   [[['no', 'trimmed']], 'string', 'min' => 4, 'regex' => '/^[edc].*[ytr]$/'],
     *   [['hi'], 'by_callback', 'callback' => function($v){
     *          return ($v % 2) == 0;
     *   }]
     * ]]
     */
    protected $ruleSet = [ ];

    protected $modelName;

    protected $currentValueName;

    public $errors = [ ];

    const CYRILLIC_SYMBOLS = 'ЁЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮйцукеёнгшщзхъфывапролджэячсмитьбю';
    const EN_SYMBOLS = 'A-Za-z';

    /**
     * Validator constructor.
     *
     * @param $modelName
     * @param array $ruleSet
     */
    public function __construct( $modelName, array $ruleSet ) {
        $this->modelName = $modelName;
        $this->ruleSet   = $ruleSet;
    }

    protected function errorValue( $message ) {
        $this->errors[] = "$this->currentValueName " . $message;
    }

    /**
     * Validates array values by rules
     *
     * @param $array array for validation
     * @param string|null $scenario
     * @return bool result of validation
     */
    public function validate( $array, $scenario = null ) {
        foreach ( $this->ruleSet as $rules ) {
            $this->errors = [ ];
            $valid        = true;
            foreach ( $rules as $rule ) {
                if ( ! isset( $rule[0], $rule[1] ) ) {
                    $this->errors[] = 'Invalid validation rule: a rule must specify both attribute names and validator type';

                    return false;
                }
                $arKeys         = $rule[0];
                $validation     = $rule[1];
                $options        = array_slice( $rule, 2 );
                $applicableRule = true;
                if ( isset( $options['scenario'] ) ) {
                    if ( is_array( $options['scenario'] ) ) {
                        if ( ! in_array( $scenario, $options['scenario'] ) ) {
                            $applicableRule = false;
                        }
                    } else {
                        if ( $scenario !== $options['scenario'] ) {
                            $applicableRule = false;
                        }
                    }
                    unset( $options['scenario'] );
                }
                if ( $applicableRule ) {
                    foreach ( $arKeys as $keys ) {
                        $this->currentValueName = $this->modelName . $this->keyString( $keys );
                        if ( ! $this->issetArrayValue( $array, $keys ) ) {
                            if ( $validation === 'required' ) {
                                $this->errorValue( 'not exists' );
                                $valid = false;
                            }
                            continue;
                        }
                        $value = $this->getArrayValue( $array, $keys );
                        if ( $validation !== 'required' ) {
                            if ( empty( $value ) ) {
                                continue;
                            }
                        }

                        $result = $this->isValid( $value, $validation, $options );
                        $valid  = $valid && $result;
                    }
                }
            }
            if ( $valid ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks is $value valid by $validationRule
     *
     * @param $value
     * @param $validationRule
     * @param array $options
     *
     * @return bool
     */
    protected function isValid( $value, $validationRule, $options ) {
        switch ( $validationRule ) {
            case 'required':
                return $this->isRequiredExists( $value, $options );
                break;
            case 'integer':
            case 'boolean':
            case 'float':
            case 'email':
                return $this->isScalar( $validationRule, $value, $options );
                break;
            case 'string':
                return $this->isString( $value, $options );
                break;
            case 'inn':
                return $this->isINN( $value, $options );
                break;
            case 'passport':
                return $this->isPassport( $value );
                break;
            case 'date':
                return $this->isDate( $value, $options );
                break;
            case 'enum':
                return $this->isEnum( $value, $options );
                break;
            case 'equal':
                return $this->isEqual( $value, $options );
                break;
            case 'by_callback':
                return $this->validateByCallback( $value, $options );
                break;
            default:
                $this->errors[] = 'Invalid validation type';

                return false;
        }
    }

    /**
     * Checks that $value not empty or contains only spaces
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isRequiredExists( $value, $options ) {
        if ( isset( $options['trim'] ) && $options['trim'] && is_string( $value ) ) {
            $value = trim( $value );
        }
        if ( empty( $value ) ) {
            $this->errorValue( 'is empty' );

            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks using filter_var
     * Also can check numbers by min and max
     *
     * @param $scalarName
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isScalar( $scalarName, $value, $options ) {
        switch ( $scalarName ) {
            case 'integer':
                $filter = FILTER_VALIDATE_INT;
                break;
            case 'float':
                $filter = FILTER_VALIDATE_FLOAT;
                break;
            case 'email':
                $filter = FILTER_VALIDATE_EMAIL;
                break;
            default:
                $filter = FILTER_VALIDATE_BOOLEAN;
                break;
        }
        $result = true;
        if ( filter_var( ltrim($value,'0'), $filter ) === false ) {
            $this->errorValue( "is not $scalarName" );
            $result = false;
        }

        if ( isset( $options['max'] ) ) {
            $max = $options['max'];
            if ( $value > $max ) {
                $this->errorValue( "is bigger than $max" );
                $result = false;
            }
        }
        if ( isset( $options['min'] ) ) {
            $min = $options['min'];
            if ( $value < $min ) {
                $this->errorValue( "is less than $min" );
                $result = false;
            }
        }

        return $result;
    }

    /**
     * Checks that $value is string
     * Also can check string length by min and max,
     * and test string by regex
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isString( $value, $options ) {
        if ( ! is_string( $value ) ) {
            $this->errorValue( 'is not a string' );

            return false;
        }
        $result = true;
        if ( isset( $options['max'] ) ) {
            $max = $options['max'];
            if ( strlen( $value ) > $max ) {
                $this->errorValue( "length is bigger than $max" );
                $result = false;
            }
        }
        if ( isset( $options['min'] ) ) {
            $min = $options['min'];
            if ( strlen( $value ) < $min ) {
                $this->errorValue( "length is less than $min" );
                $result = false;
            }
        }
        if ( isset( $options['regex'] ) ) {
            $regex = $options['regex'];
            if ( preg_match( $regex, $value ) !== 1 ) {
                $this->errorValue( "doesn't match to regex $regex" );
                $result = false;
            }
        }
        if( isset( $options['only'] ) ) {
            $only = $options['only'];
            $regex = '/^[';
            if(is_array($only)){
                foreach ($only as $limitation){
                    switch ($limitation){
                        case 'cyrillic':
                            $regex .= static::CYRILLIC_SYMBOLS;
                            break;
                        case 'latin':
                            $regex .= static::EN_SYMBOLS;
                            break;
                        case 'number':
                            $regex .= '\d';
                            break;
                        case 'space':
                            $regex .= '\s';
                            break;
                        case 'dash':
                            $regex .= '-';
                            break;
                        case 'quote':
                            $regex .= "'";
                            break;
                        default:
                            $regex .= $limitation;
                            break;
                    }
                }
            }else {
                $regex .= $only;
            }
            $regex .= ']*$/u';
            if ( preg_match( $regex, $value ) !== 1 ) {
                $this->errorValue( "doesn't match to regex $regex" );
                $result = false;
            }
        }

        return $result;
    }

    /**
     * Checks using MakeTimeStamp that $value is a date
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isDate( $value, $options ) {
        if ( isset( $options['format'] ) ) {
            $format = $options['format'];
            if ( MakeTimeStamp( $value, $format ) === false ) {
                $this->errorValue( 'is not valid date' );

                return false;
            } else {
                return true;
            }
        } else {
            $this->errorValue( "validation date format isn't passed to options" );

            return false;
        }
    }

    /**
     * Checks that $value is in enum range
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isEnum( $value, $options ) {
        if ( isset( $options['values'] ) ) {
            if (in_array($value, $options['values'])) {
                return true;
            } else {
                $this->errorValue("value not in enum");
                return false;
            }
        } else {
            $this->errorValue( "enum values aren't passed to options" );
            return false;
        }
    }

    /**
     * Checks that $value is in enum range
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isEqual( $value, $options ) {
        if ( isset( $options['value'] ) ) {
            if ($value == $options['value']){
                return true;
            }else {
                $this->errorValue( "value not equal to passed for validation" );
                return false;
            }
        } else {
            $this->errorValue( "value isn't passed to options" );
            return false;
        }
    }

    protected function isPassport($value){
        if(preg_match('/^\d{4}\s\d{6}/',$value)){
            return true;
        }
        else{
            $this->errorValue( 'value not is \d{4}\s\d{6}' );
            return false;
        }
    }

    /**
     * Checks that $value is an INN
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function isINN( $value, $options ) {
        if ( !isset( $value ) || trim($value) ) {
            return true;
        }

        if(!preg_match('/^\d{10}(\d{2})?$/', $value)) {
            $arCheck = explode(' ', chunk_split($value, 1, ' '));

            if(sizeof($value) == 10 && (isset($options['legal']) ? $options['legal'] : true)) {
                $arCoef = [2, 4, 10, 3, 5, 9, 4, 6, 8];

                if($this->getINNCheckSum($arCoef, $arCheck)){
                    return true;
                }
            }

            if(sizeof($value) == 12 && (isset($options['natural']) ? $options['natural'] : true)) {
                $arCoef1 = [7, 2, 4, 10, 3, 5, 9, 4, 6, 8];
                $arCoef2 = [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8];

                if($this->getINNCheckSum($arCoef1, $arCheck) && $this->getINNCheckSum($arCoef2, $arCheck)){
                    return true;
                }
            }
        }

        $this->errorValue( "value is not a valid INN" );
        return false;
    }

    /**
     * Calculates checksum based on given coefs and checks if given value is valid
     *
     * @param $arCoef
     * @param $arVal
     *
     * @return bool
     */
    protected function getINNCheckSum($arCoef, $arVal){
        return $arVal[sizeof($arCoef)] == (array_reduce(
            array_map(
                function($a, $b){ return $a * $b; },
                $arCoef,
                array_slice($arVal, 0, sizeof($arCoef))
            ),
            function($a, $b){ return $a + $b; },
            0
        ) % 11) % 10;
    }


    /**
     * Calls user-defined function that checks $value
     *
     * @param $value
     * @param $options
     *
     * @return bool
     */
    protected function validateByCallback( $value, $options ) {
        if ( isset( $options['callback'] ) ) {
            $callback = $options['callback'];
            if ( is_callable( $callback ) ) {
                $cbResult = call_user_func( $callback, $value );
                if ( ! $cbResult ) {
                    $this->errorValue( 'is not valid by callback' );
                    return false;
                } else {
                    return true;
                }
            } else {
                $this->errorValue( 'validation callback is not callable' );

                return false;
            }
        } else {
            $this->errorValue( "validation callback isn't passed to options" );

            return false;
        }
    }

    /**
     * Checks that array value in given keys exists
     *
     * @param $array
     * @param $keys
     *
     * @return bool
     */
    protected function issetArrayValue( $array, $keys ) {
        $value = $array;
        if ( is_scalar( $keys ) ) {
            return isset( $value[ $keys ] );
        }
        foreach ( $keys as $key ) {
            if ( ! isset( $value[ $key ] ) ) {
                return false;
            }
            $value = $value[ $key ];
        }

        return true;
    }

    /**
     * Gets value from $array by $keys
     *
     * @param $array
     * @param $keys
     *
     * @return mixed
     */
    protected function getArrayValue( $array, $keys ) {
        $value = $array;
        if ( is_scalar( $keys ) ) {
            return $value[ $keys ];
        }
        foreach ( $keys as $key ) {
            $value = $value[ $key ];
        }

        return $value;
    }

    /**
     * @param $keys array
     *
     * @return string representation of array key
     */
    protected function keyString( $keys ) {
        if ( is_scalar( $keys ) ) {
            return "['$keys']";
        }
        $str = '';
        foreach ( $keys as $key ) {
            $str .= "['$key']";
        }

        return $str;
    }
}