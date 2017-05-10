<?php
    foreach ($arResult['ITEMS'] as $k => $arItem) {
        $arResult['ITEMS'][$k]['DETAIL_PICTURE_RESIZED'] = \CFile::ResizeImageGet(
            $arItem['DETAIL_PICTURE'],
            ['width' => 1024, 'height' => 768],
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT
        );
    }