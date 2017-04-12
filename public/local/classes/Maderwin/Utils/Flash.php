<?php

namespace Maderwin\Utils;

class Flash
{
    public static function Debug($message)
    {
        if (!$_SESSION['FLASH_MESSAGES']) {
            $_SESSION['FLASH_MESSAGES'] = [];
        }
        $_SESSION['FLASH_MESSAGES']['DEBUG'][] = $message;
    }

    public static function Warning($message)
    {
        if (!$_SESSION['FLASH_MESSAGES']) {
            $_SESSION['FLASH_MESSAGES'] = [];
        }
        $_SESSION['FLASH_MESSAGES']['WARNING'][] = $message;
    }

    public static function Danger($message)
    {
        if (!$_SESSION['FLASH_MESSAGES']) {
            $_SESSION['FLASH_MESSAGES'] = [];
        }
        $_SESSION['FLASH_MESSAGES']['DANGER'][] = $message;
    }

    public static function Success($message)
    {
        $_SESSION['FLASH_MESSAGES']['SUCCESS'][] = $message;
    }
}