<?php

    $arResult['DETAIL_PICTURE_RESIZED'] = \CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE'],
        [ 'width' => 1366, 'height' => 768 ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT
    );