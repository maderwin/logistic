<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="spec_proj">
    <div class="bto"></div>
    <div class="title">Мероприятия</div>
    <div class="header hidden-xs hidden-sm">
        <div class="s_bottom_name">
            <div class="row">
                <div class="col-md-4">Дата публикации</div>
                <div class="col-md-2">Тип документа</div>
                <div class="col-md-2">Ведомство</div>
                <div class="col-md-2">Рубрика</div>
            </div>
        </div>
        <div class="s_bottom_input">
            <div class="row">
                <div class="col-md-2">
                    <select class="start_time">
                        <option value="">Выбрать дату</option>
                        <option value="">23.08.17</option>
                        <option value="">24.08.17</option>
                        <option value="">25.08.17</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="end_time">
                        <option value="">Выбрать дату</option>
                        <option value="">24.08.17</option>
                        <option value="">25.08.17</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="type_doc">
                        <option value="">Выбрать тип</option>
                        <option value="">Акты</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="vedomstvo">
                        <option value="">Выбрать ведомство</option>
                        <option value="">Ведомство 1</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="rubric">
                        <option value="">Выбрать рубрику</option>
                        <option value="">Нормативные акты</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="search_button">Поиск</button>
                    <button class="close_search_button">×</button>
                </div>
            </div>
        </div>
    </div>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <?
            $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arItem['DATE_ACTIVE_FROM']);
            if(!$date) {
                $date = \DateTime::createFromFormat('d.m.Y', $arItem['DATE_ACTIVE_FROM']);
            }
        ?>
        <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                    <div class="time"><?=$date?$date->format('H:i'):''?> <span><?=$date?$date->format('d.m.Y'):''?></span></div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="title_cont"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                    <div class="content"><?= $arItem["PREVIEW_TEXT"] ? $arItem["PREVIEW_TEXT"] : substr($arItem["DETAIL_TEXT"],0, strpos($arItem["DETAIL_TEXT"], ' ', 200)) . '...'?></div>
                    <div class="map"><a href="#"><?=$arItem['PROPERTIES']['PLACE']['VALUE']?></a></div>
                </div>
            </div>
        </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<!--        <br />--><?//=$arResult["NAV_STRING"]?>
        <div class="all"><a href="#">Загрузить еще</a></div>
    <?endif;?>
</div>
