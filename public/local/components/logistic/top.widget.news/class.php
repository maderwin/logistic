<?php

namespace Logistic\Component;

use Maderwin\Utils\Helper;

class CTopWidgetNews extends \Maderwin\Component {
    protected function execute()
    {
        $this->arResult['NEWS_LIST']  = $this->getNewsList();
        $this->arResult['IMPORTANT_NEWS_LIST']  = $this->getImportantNewsList();
        $this->arResult['MAIN_NEWS_LIST']  = $this->getMainNewsList();
    }

    public function getNewsList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsNews = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_NEWS,
                'ACTIVE' => 'Y'
            ],
            false,
            [ 'nTopCount' => 6 ],
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DATE_ACTIVE_FROM',
                'DETAIL_PAGE_URL',
                'LIST_PAGE_URL',
                'PREVIEW_TEXT',
            ]
        );

        $rsNews->SetUrlTemplates();

        $arNewsList = [];

        while($arNews = $rsNews->GetNext()){
            $arNewsList[] = $arNews;
        }

        return $arNewsList;
    }

    public function getImportantNewsList(){
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
            [ 'nTopCount' => 6 ],
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DATE_ACTIVE_FROM',
                'DETAIL_PAGE_URL',
                'LIST_PAGE_URL',
                'PREVIEW_TEXT',
            ]
        );

        $rsNews->SetUrlTemplates();

        $arNewsList = [];

        while($arNews = $rsNews->GetNext()){
            $arNewsList[] = $arNews;
        }

        return $arNewsList;
    }

    public function getMainNewsList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $arLevelList = Helper::GetEnum(IB_CONTENT_NEWS, 'LEVEL', false, true);

        $el = new \CIBlockElement();

        $rsNews = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_NEWS,
                'ACTIVE' => 'Y',
                'PROPERTY_LEVEL' => $arLevelList['MAIN']
            ],
            false,
            [ 'nTopCount' => 3 ],
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DATE_ACTIVE_FROM',
                'PREVIEW_PICTURE',
                'DETAIL_PAGE_URL',
                'LIST_PAGE_URL',
                'PREVIEW_TEXT',
                'IBLOCK_SECTION_ID'
            ]
        );

        $rsNews->SetUrlTemplates();

        $arNewsList = [];
        $arImageList = [];
        $arSectionIDList = [];

        while($arNews = $rsNews->GetNext()){
            $arNewsList[] = $arNews;
            $arImageList[] = $arNews['PREVIEW_PICTURE'];
            if($arNews['IBLOCK_SECTION_ID']) {
                $arSectionIDList[] = $arNews['IBLOCK_SECTION_ID'];
            }
        }

        $rsSection = \CIBlockSection::GetList(
            ['SORT' => 'ASC'],
            [
                'ID' => $arSectionIDList,
                'IBLOCK_ID' => IB_CONTENT_NEWS
            ],
            false,
            [
                'ID',
                'NAME',
                'IBLOCK_ID',
                'SECTION_PAGE_URL'
            ]
        );

        $rsSection->SetUrlTemplates();

        $arSectionList = [];

        while ($arSection = $rsSection->GetNext()){
            $arSectionList[$arSection['ID']] = $arSection;
        }

        $arImageList = Helper::GetFileData($arImageList);

        foreach ($arNewsList as $k => $arNews) {
            $arNewsList[$k]['PREVIEW_PICTURE'] = \CFile::ResizeImageGet(
                $arImageList[$arNews['PREVIEW_PICTURE']],
                [ 'width' => 640, 'height' => 480 ],
                BX_RESIZE_IMAGE_EXACT
            );
            if($arNews['IBLOCK_SECTION_ID']) {
                $arNewsList[$k]['SECTION'] = $arSectionList[$arNews['IBLOCK_SECTION_ID']];
            }
        }


        return $arNewsList;
    }
}