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

<div class="uslugi">
    <div class="title">Услуги компании</div>
    <div class="box_uslug">
        <div class="row">
            <div class="col-md-4">
                <div class="item">Железнодорожные перевозки;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Автоперевозки грузов;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Доставка контейнеров;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Международные жд перевозки;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Перевозка в крытых вагонах;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Перевозка в крытых вагонах;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Международные жд перевозки;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Перевозка в крытых вагонах;</div>
            </div>
            <div class="col-md-4">
                <div class="item">Перевозка в крытых вагонах;</div>
            </div>
        </div>
    </div>
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