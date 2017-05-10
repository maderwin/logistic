<?php

namespace Logistic\Component;

use Maderwin\Utils\Helper;

class CWidgetAnalyticsTop extends \Maderwin\Component {
    protected function execute()
    {
        $this->arResult['ARTICLE_LIST']  = $this->getArticleList();
        $this->arResult['INTERVIEW_LIST']  = $this->getInterviewList();
        $this->arResult['PRESS_LIST']  = $this->getPressList();
    }

    public function getArticleList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsArticle = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_ARTICLE,
                'ACTIVE' => 'Y',
            ],
            false,
            [ 'nTopCount' => 4 ],
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

        $rsArticle->SetUrlTemplates();

        $arArticleList = [];
        $arImageList = [];

        $i = 0;

        while($arArticle = $rsArticle->GetNext()){
            if(++$i>4) {break;}
            $arArticleList[] = $arArticle;
            $arImageList[] = $arArticle['PREVIEW_PICTURE'];
        }

        $arImageList = Helper::GetFileData($arImageList);

        foreach ($arArticleList as $k => $arArticle) {
            $arArticleList[$k]['PREVIEW_PICTURE'] = \CFile::ResizeImageGet(
                $arImageList[$arArticle['PREVIEW_PICTURE']],
                [ 'width' => 640, 'height' => 480 ],
                BX_RESIZE_IMAGE_EXACT
            );
        }

        return $arArticleList;
    }

    public function getPressList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsPress = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_PRESS,
                'ACTIVE' => 'Y',
            ],
            false,
            [ 'nTopCount' => 4 ],
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

        $rsPress->SetUrlTemplates();

        $arPressList = [];
        $arImageList = [];

        $i = 0;

        while($arPress = $rsPress->GetNext()){
            if(++$i>4) {break;}
            $arPressList[] = $arPress;
            $arImageList[] = $arPress['PREVIEW_PICTURE'];
        }

        $arImageList = Helper::GetFileData($arImageList);

        foreach ($arPressList as $k => $arPress) {
            $arPressList[$k]['PREVIEW_PICTURE'] = \CFile::ResizeImageGet(
                $arImageList[$arPress['PREVIEW_PICTURE']],
                [ 'width' => 640, 'height' => 480 ],
                BX_RESIZE_IMAGE_EXACT
            );
        }

        return $arPressList;
    }

    public function getInterviewList(){
        \Bitrix\Main\Loader::includeModule('iblock');

        $el = new \CIBlockElement();

        $rsInterview = $el->GetList(
            [ 'DATE_ACTIVE_FROM' => 'DESC' ],
            [
                'IBLOCK_ID' => IB_CONTENT_INTERVIEW,
                'ACTIVE' => 'Y',
            ],
            false,
            [ 'nTopCount' => 4 ],
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

        $rsInterview->SetUrlTemplates();

        $arInterviewList = [];
        $arImageList = [];

        $i = 0;

        while($arInterview = $rsInterview->GetNext()){
            if(++$i>4) {break;}
            $arInterviewList[] = $arInterview;
            $arImageList[] = $arInterview['PREVIEW_PICTURE'];
        }

        $arImageList = Helper::GetFileData($arImageList);

        foreach ($arInterviewList as $k => $arInterview) {
            $arInterviewList[$k]['PREVIEW_PICTURE'] = \CFile::ResizeImageGet(
                $arImageList[$arInterview['PREVIEW_PICTURE']],
                [ 'width' => 640, 'height' => 480 ],
                BX_RESIZE_IMAGE_EXACT
            );
        }

        return $arInterviewList;
    }
}