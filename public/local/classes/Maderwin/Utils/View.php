<?php

namespace Maderwin\Utils;

class View
{
    /**
     * @param $size
     * @param int $round
     *
     * @return string
     */
    public static function GetFileSizeUnits($size, $round = 2)
    {
        $sizes = array('Б', 'Кб', 'Мб', 'Гб');
        for ($i = 0; $size > 1024 && $i < count($sizes) - 1; $i++) {
            $size /= 1024;
        }

        return round($size, $round) . " " . $sizes[$i];
    }

    public static function GetPlural($n, $base, $postfix = array('', '', ''))
    {
        $a = ($n + 9) % 10;
        $b = floor($n % 100 / 10);
        if ($a > 3 || $b == 1) {
            return $base . $postfix[2];
        } elseif ($a == 0) {
            return $base . $postfix[0];
        }

        return $base . $postfix[1];
    }

    public static function FormatPrice($price)
    {
        return number_format($price, 2, ".", "&nbsp;");
    }

    public static function FormatXML($xml)
    {
        $dom = new \DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);

        return htmlspecialchars($dom->saveXml());
    }

    public static function NumberToRoman($value)
    {
        if ($value < 0) {
            return "";
        }
        if (!$value) {
            return "0";
        }
        $thousands = (int)($value / 1000);
        $value -= $thousands * 1000;
        $result = str_repeat("M", $thousands);
        $table = array(
            900 => "CM",
            500 => "D",
            400 => "CD",
            100 => "C",
            90 => "XC",
            50 => "L",
            40 => "XL",
            10 => "X",
            9 => "IX",
            5 => "V",
            4 => "IV",
            1 => "I"
        );
        while ($value) {
            foreach ($table as $part => $fragment) {
                if ($part <= $value) {
                    break;
                }
            }
            $amount = (int)($value / $part);
            $value -= $part * $amount;
            $result .= str_repeat($fragment, $amount);
        }

        return $result;
    }

    public static function GetInitials($arUser)
    {
        $sn = isset($arUser['SECOND_NAME']) ? 'SECOND_NAME' : 'PATRONYM';
        $arName = [
            $arUser['LAST_NAME'],
            !trim($arUser['NAME']) ? '' : mb_substr($arUser['NAME'], 0, 1) . '.',
            !trim($arUser[$sn]) ? '' : mb_substr($arUser[$sn], 0, 1) . '.',
        ];
        return implode(' ', $arName);
    }

    public static function Tpl($tpl, $arData)
    {
        if (is_array($tpl)) {
            $tpl = Helper::GetListItem($tpl[0], $tpl[1]);
        }
        foreach ($arData as $key => $value) {
            $tpl = str_replace("{{" . $key . "}}", $value, $tpl);
        }

        return $tpl;
    }
}