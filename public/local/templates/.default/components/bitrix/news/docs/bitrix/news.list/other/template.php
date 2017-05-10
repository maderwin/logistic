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
<?if(sizeof($arResult["ITEMS"])):?>
<div class="other_box">
    <div class="title">Другие статьи по теме</div>
    <div class="row">
        <?$i=0;foreach($arResult["ITEMS"] as $arItem):?>
            <?if($i>0 && ($i%4)==0):?>
                </div>
                <div class="row">
            <?endif?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <?
            $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arItem['ACTIVE_FROM']);
            if(!$date) {
                $date = \DateTime::createFromFormat('d.m.Y', $arItem['ACTIVE_FROM']);
            }
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                    <div class="time"><?=$date?$date->format('H:i'):''?> <span><?=$date?$date->format('d.m.Y'):''?></span></div>
                    <div class="title_item"><?= $arItem["NAME"]?></div>
                </a>
            </div>
        <?$i++;if($i==8){break;}endforeach;?>
    </div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <!--        <br />--><?//=$arResult["NAV_STRING"]?>
        <div class="row">
            <div class="col-md-12">
                <div class="all"><a href="#">Все статьи по теме</a></div>
            </div>
        </div>
    <?endif;?>
</div>
<?endif?>
