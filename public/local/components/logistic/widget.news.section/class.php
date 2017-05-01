<?php

namespace Logistic\Component;

class CWidgetEventList extends \Maderwin\Component {
    protected function execute()
    {
        $this->arResult['SECTION']  = $this->getSection();
        $this->arResult['NEWS_LIST']  = $this->getNewsList();
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

        while($arNews = $rsNews->GetNext()){
            $arNewsList[] = $arNews;
        }

        return $arNewsList;
    }
}