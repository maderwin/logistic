<?php

namespace Logistic\Component;

class CWidgetEventList extends \Maderwin\Component {
    protected function execute()
    {
        $this->arResult['EVENT_LIST']  = $this->getEventList();
    }

    public function getEventList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsEvent = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_EVENT,
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
                'PROPERTY_PLACE'
            ]
        );

        $rsEvent->SetUrlTemplates();

        $arEventList = [];

        while($arEvent = $rsEvent->GetNext()){
            $arEventList[] = $arEvent;
        }

        return $arEventList;
    }
}