<?php

namespace Maderwin\Utils;

/**
 * Набор общих хелперов
 */
use SimpleXMLElement;

class Helper
{

    protected static $siteData;
    protected static $iBlockTypes;

    /**
     * Возвращает информацию о файле
     *
     * @param int|array $fid ID файла, либо массив ID файлов
     *
     * @return bool|array - данные информация о файле
     */
    public static function GetFileData($fid)
    {
        if (!isset($fid)) {
            return false;
        }

        $cFile = new \CFile();
        if (is_array($fid)) {
            $rsFile = $cFile->GetList(array(), array("@ID" => implode(",", $fid)));
        } else {
            $rsFile = $cFile->GetByID($fid);
        }

        $ret = array();

        while ($ifile = $rsFile->Fetch()) {
            if (array_key_exists("~src", $ifile)) {
                if ($ifile["~src"]) {
                    $ifile["SRC"] = $ifile["~src"];
                } else {
                    $ifile["SRC"] = $cFile->GetFileSRC($ifile, false, false);
                }
            } else {
                $ifile["SRC"] = $cFile->GetFileSRC($ifile, false);
            }

            $ret[$ifile['ID']] = $ifile;
        }

        if (is_array($fid)) {
            return $ret;
        } else {
            return $ret[$fid];
        }
    }

    /**
     * @param $iBlockId
     */
    public static function GetIBlockType($iBlockId)
    {
        if (self::$iBlockTypes === null) {
            self::$iBlockTypes = array();
            $res = \CIBlock::GetList();
            while ($arItem = $res->Fetch()) {
                self::$iBlockTypes[$arItem["ID"]] = $arItem["IBLOCK_TYPE_ID"];
            }
        }
        if (!isset(self::$iBlockTypes[$iBlockId])) {
            self::$iBlockTypes[$iBlockId] = false;
        }

        return self::$iBlockTypes[$iBlockId];
    }

    public static function ResizeImageFile($file, $w, $h, $crop = FALSE)
    {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newWidth = $w;
            $newHeight = $h;
        } else {
            if ($w / $h > $r) {
                $newWidth = $h * $r;
                $newHeight = $h;
            } else {
                $newHeight = $w / $r;
                $newWidth = $w;
            }
        }
        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        return $dst;
    }

    public static function ArrayToXml($data)
    {
        return static::ArrayToXmlRec($data, '<?xml version="1.0" encoding="UTF-8"?><response></response>')->asXML();
    }

    public static function StringifyBool($val)
    {
        if (is_bool($val)) {
            $val = $val ? 'true' : 'false';
        }

        return $val;
    }

    public static function ArrayToXmlRec($data, $template)
    {
        if (is_string($template)) {
            $template = new SimpleXMLElement($template);
        }

        if (is_array($data)) {

            foreach ($data as $key => $value) {
                if (!is_array($value)) {
                    $value = static::stringifyBool($value);
                    if (!is_null($value) && trim($value) !== "") {
                        $template->addChild($key, $value);
                    }
                    continue;
                }

                if (is_numeric($key)) {
                    static::arrayToXmlRec(static::stringifyBool($value), $template);
                    continue;
                }

                if (is_array($value)) {
                    if (!count($value)) {
                        continue;
                    }
                    $next = false;
                    $subnode = false;
                    foreach ($value as $k => $v) {
                        if (!is_array($v)) {
                            if (is_numeric($k)) {
                                $template->addChild($key, static::stringifyBool($v));
                            } else {
                                if (!$subnode) {
                                    $subnode = $template->addChild($key);
                                }
                                $subnode->addChild($k, static::stringifyBool($v));
                            }
                            continue;
                        }

                        $subnode = $template->addChild($key);


                        static::arrayToXmlRec([$k => static::stringifyBool($v)], $subnode);
                        $next = true;
                    }
                    if ($next) {
                        continue;
                    }
                } else {
                    $subnode = $template->addChild($key);
                    static::arrayToXmlRec(static::stringifyBool($value), $subnode);
                }

            }
        } else {
            $template->addChild('item', static::stringifyBool($data));
        }
        return $template;
    }

    public static function GetEnum($iblockId, $propertyName = false, $idKey = true, $xmlIdKey = false)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $arFilter = [];
        $arFilter['IBLOCK_ID'] = $iblockId;

        if ($propertyName) {
            $arFilter['CODE'] = $propertyName;
        }

        $rsProps = (new \CIBlockPropertyEnum())->GetList(
            [
                'SORT' => 'ASC',
                'NAME' => 'ASC'
            ],
            $arFilter
        );

        $arPropList = [];
        while ($arProp = $rsProps->Fetch()) {
            if ($idKey) {
                $arPropList[$arProp['ID']] = [
                    'ID' => $arProp['ID'],
                    'SORT' => $arProp['SORT'],
                    'CODE' => $arProp['XML_ID'],
                    'NAME' => $arProp['VALUE'],
                ];
            }
            if ($xmlIdKey) {
                $arPropList[$arProp['XML_ID']] = [
                    'ID' => $arProp['ID'],
                    'SORT' => $arProp['SORT'],
                    'CODE' => $arProp['XML_ID'],
                    'NAME' => $arProp['VALUE'],
                ];
            }
        }

        return $arPropList;
    }
}
