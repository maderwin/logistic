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
    <div class="group_t_p">
        <div class="publication">Опубликовано <span><?=$date->format('d.m.Y, H:i:s')?></span></div>
        <div class="tags">
            <?foreach (explode(',', $arResult['TAGS']) as $tag):?>
                <div><a href="#"><?=ucfirst(strtolower(trim($tag)))?></a></div>
            <?endforeach;?>
        </div>
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