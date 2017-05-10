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
    <div class="box_head_t">
        <div class="row">
            <div class="col-md-5"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""></div>
            <div class="col-md-7">
                <ul>
                    <li><span>Адрес: </span><?=$arResult['PROPERTIES']['ADDRESS']['VALUE']?></li>
                    <li><span>Телефон/факс: </span><?=$arResult['PROPERTIES']['PHONE']['VALUE']?></li>
                    <li><span>E-mail: </span> <?=$arResult['PROPERTIES']['EMAIL']['VALUE']?></li>
                    <li><span>Сайт:  </span><?=$arResult['PROPERTIES']['LINK']['VALUE']?></li>
                    <li><span>Часы работы: </span><?=$arResult['PROPERTIES']['WORKHOURS']['VALUE']?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <?if(strlen($arResult["DETAIL_TEXT"])>0):?>
            <?echo $arResult["DETAIL_TEXT"];?>
        <?else:?>
            <?echo $arResult["PREVIEW_TEXT"];?>
        <?endif?>
    </div>
</div>

<?if($arResult['DISPLAY_PROPERTIES']['SERVICES'] && sizeof($arResult['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'])):?>
<div class="uslugi">
    <div class="title">Услуги компании</div>
    <div class="box_uslug">
        <div class="row">
            <?foreach($arResult['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'] as $service):?>
                <div class="col-md-4">
                    <div class="item"><?=$service?>;</div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<?endif?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/local/include/share.php",
        "EDIT_TEMPLATE" => ""
    )
);?>