<?php

namespace Logistic\Component;

use Maderwin\Utils\Helper;

class CWidgetNewsFavorite extends \Maderwin\Component {
    protected function execute()
    {
        $this->arResult['EDITOR_NEWS_LIST']  = $this->getEditorNewsList();
        $this->arResult['READER_NEWS_LIST']  = $this->getReaderNewsList();
    }

    public function getEditorNewsList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $arLevelList = Helper::GetEnum(IB_CONTENT_NEWS, 'LEVEL', false, true);

        $el = new \CIBlockElement();

        $rsNews = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_NEWS,
                'ACTIVE' => 'Y',
                'PROPERTY_LEVEL' => $arLevelList['IMPORTANT']
            ],
            false,
            [ 'nTopCount' => 5 ],
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DATE_ACTIVE_FROM',
                'DETAIL_PAGE_URL',
                'LIST_PAGE_URL',
                'PREVIEW_TEXT',
                'PREVIEW_PICTURE',
            ]
        );

        $rsNews->SetUrlTemplates();

        $arNewsList = [];
        $arImageList = [];

        while($arNews = $rsNews->GetNext()){
            $arNewsList[] = $arNews;
            $arImageList[] = $arNews['PREVIEW_PICTURE'];
        }

        $arImageList = Helper::GetFileData($arImageList);

        foreach ($arNewsList as $k => $arNews) {
            $arNewsList[$k]['PREVIEW_PICTURE'] = \CFile::ResizeImageGet(
                $arImageList[$arNews['PREVIEW_PICTURE']],
                [ 'width' => 640, 'height' => 480 ],
                BX_RESIZE_IMAGE_EXACT
            );
        }

        return $arNewsList;
    }

    public function getReaderNewsList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsNews = $el->GetList(
            [
                'shows' => 'DESC',
                'DATE_ACTIVE_FROM' => 'DESC'
            ],
            [
                'IBLOCK_ID' => IB_CONTENT_NEWS,
                'ACTIVE' => 'Y'
            ],
            false,
            [ 'nTopCount' => 5 ],
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DATE_ACTIVE_FROM',
                'DETAIL_PAGE_URL',
                'LIST_PAGE_URL',
                'PREVIEW_TEXT',
                'PREVIEW_PICTURE',
            ]
        );

        $rsNews->SetUrlTemplates();

        $arNewsList = [];
        $arImageList = [];

        while($arNews = $rsNews->GetNext()){
            $arNewsList[] = $arNews;
            $arImageList[] = $arNews['PREVIEW_PICTURE'];
        }

        $arImageList = Helper::GetFileData($arImageList);

        foreach ($arNewsList as $k => $arNews) {
            $arNewsList[$k]['PREVIEW_PICTURE'] = \CFile::ResizeImageGet(
                $arImageList[$arNews['PREVIEW_PICTURE']],
                [ 'width' => 640, 'height' => 480 ],
                BX_RESIZE_IMAGE_EXACT
            );
        }

        return $arNewsList;
    }
}