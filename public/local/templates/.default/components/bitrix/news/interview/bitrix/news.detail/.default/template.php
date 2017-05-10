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
<?
$date = \DateTime::createFromFormat('d.m.Y H:i:s', $arResult['DATE_ACTIVE_FROM']);
if(!$date) {
    $date = \DateTime::createFromFormat('d.m.Y', $arResult['DATE_ACTIVE_FROM']);
}
?>
<div class="more_block">
    <div class="title"><?=$arResult["NAME"]?></div>
    <div class="group_t_p">
        <?if($date):?>
            <div class="publication">Опубликовано <span><?=$date->format('d.m.Y, H:i:s')?></span></div>
        <?endif?>
        <?if($arResult['TAGS']):?>
        <div class="tags">
            <?foreach (explode(',', $arResult['TAGS']) as $tag):?>
                <div><a href="#"><?=ucfirst(strtolower(trim($tag)))?></a></div>
            <?endforeach;?>
        </div>
        <?endif?>
    </div>
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <div class="box_image">
            <img
                    class="detail_picture"
                    border="0"
                    src="<?=$arResult["DETAIL_PICTURE_RESIZED"]["src"]?>"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
        </div>
    <?endif?>
    <div class="content">
        <?if(strlen($arResult["DETAIL_TEXT"])>0):?>
            <?echo $arResult["DETAIL_TEXT"];?>
        <?else:?>
            <?echo $arResult["PREVIEW_TEXT"];?>
        <?endif?>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/local/include/share.php",
        "EDIT_TEMPLATE" => ""
    )
);?>