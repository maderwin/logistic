<?php

namespace Logistic\Component;

use Maderwin\Utils\Helper;

class CWidgetNewsSection extends \Maderwin\Component {
    protected function execute()
    {
        $this->arResult['SECTION']  = $this->getSection($this->arParams['SECTION_CODE']);
        if($this->arResult['SECTION']) {
            $this->arResult['NEWS_LIST'] = $this->getNewsList($this->arResult['SECTION']['ID']);
        }
    }

    public function getNewsList($sectionId){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsNews = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_NEWS,
                'ACTIVE' => 'Y',
                'SECTION_ID' => $sectionId,
                'INCLUDE_SUBSECTIONS' => 'Y'
            ],
            false,
            [ 'nTopCount' => 3 ],
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DATE_ACTIVE_FROM',
                'DETAIL_PAGE_URL',
                'LIST_PAGE_URL',
                'PREVIEW_TEXT',
                'PREVIEW_PICTURE'
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
                [ 'width' => 1024, 'height' => 768 ],
                BX_RESIZE_IMAGE_EXACT
            );
        }

        return $arNewsList;
    }

    public function getSection($sectionCode){
        $rsSection = \CIBlockSection::GetList(
            ['SORT' => 'ASC'],
            [
                'CODE' => $sectionCode,
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

        if ($arSection = $rsSection->GetNext()){
            return $arSection;
        }

        return false;
    }
}