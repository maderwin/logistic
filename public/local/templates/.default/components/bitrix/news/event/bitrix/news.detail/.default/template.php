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
?>
<div class="more_block">
    <div class="title"><?=$arResult["NAME"]?></div>
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <div class="box_image">
            <img
                    class="detail_picture"
                    border="0"
                    src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                    width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                    height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
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
<div class="date_price">
    <div class="title">дата и стоимость</div>
    <div class="t_content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">Дата и время проведения</div>
            <div class="col-md-6 col-sm-6 col-xs-6">Стоимость</div>
        </div>
    </div>
    <div class="p_content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6"><?=\DateTime::createFromFormat('d.m.Y H:i:s', $arResult['DATE_ACTIVE_FROM'])->format('d.m.Y в H:i')?></div>
            <div class="col-md-6 col-sm-6 col-xs-6"><?=$arResult['PROPERTIES']['PRICE']['VALUE']?> руб.</div>
        </div>
    </div>
</div>
<div class="map_box">
    <div class="title">Место проведения</div>
    <div class="content_map"><?=$arResult['PROPERTIES']['PLACE']['VALUE']?></div>
    <?$APPLICATION->IncludeComponent(
            "bitrix:map.yandex.view",
            ".default",
            Array(
            "INIT_MAP_TYPE" => "MAP",
            "MAP_DATA" => serialize([
                "yandex_lat" => explode(',',$arResult['PROPERTIES']['COORDINATES']['VALUE'])[0],
                "yandex_lon" => explode(',',$arResult['PROPERTIES']['COORDINATES']['VALUE'])[1],
                'yandex_scale' => 11,
                "PLACEMARKS" => [
                    [
                        "LAT" => explode(',',$arResult['PROPERTIES']['COORDINATES']['VALUE'])[0],
                        "LON" => explode(',',$arResult['PROPERTIES']['COORDINATES']['VALUE'])[1],
                        "TEXT" => $arResult['NAME'] . ' - ' . $arResult['PROPERTIES']['PLACE']['VALUE']
                    ]
                ]
            ]),
            "MAP_WIDTH" => "AUTO",
            "MAP_HEIGHT" => "AUTO",
            "CONTROLS" => array(
                "TOOLBAR",
                "ZOOM",
                "SMALLZOOM",
                "TYPECONTROL",
                "SCALELINE"
            ),
            "OPTIONS" => array(
                "ENABLE_SCROLL_ZOOM",
                "ENABLE_DBLCLICK_ZOOM",
                "ENABLE_DRAGGING"
            ),
            "MAP_ID" => "yam_1"
        )
    );?>
</div>
<div class="socku">
    <span>Поделиться: </span>
    <ul>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
    </ul>
</div>
<div class="other_box">
    <div class="title">Другие статьи по теме</div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="#" class="item">
                <img src="<?=P_ASSETS?>img/other1.jpg" alt="">
                <div class="time"><span>12:00</span>19.10.16</div>
                <div class="title_item">На южном направлени складывается дефицит...</div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="all"><a href="#">Все статьи по теме</a></div>
        </div>
    </div>
</div>