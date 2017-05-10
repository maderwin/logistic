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
    <div class="title">Пресс-релизы</div>
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
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                    <div class="time"><?=$date?$date->format('H:i'):''?> <span><?=$date?$date->format('d.m.Y'):''?></span></div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="title_cont"><?=$arItem["NAME"]?></div>
                    <div class="content"><?= $arItem["PREVIEW_TEXT"] ? $arItem["PREVIEW_TEXT"] : substr($arItem["DETAIL_TEXT"],0, strpos($arItem["DETAIL_TEXT"], ' ', 200)) . '...'?></div>
                    <?if($arItem['TAGS']):?>
                        <div class="tags">
                            <?foreach(explode(',', $arItem['TAGS']) as $tag):?>
                                <div><?=ucfirst(strtolower(trim($tag)))?></div>
                            <?endforeach;?>
                        </div>
                    <?endif?>
                </div>
            </div>
        </a>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<!--        <br />--><?//=$arResult["NAV_STRING"]?>
        <div class="all"><a href="#">Загрузить еще</a></div>
    <?endif;?>
</div>
