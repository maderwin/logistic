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
<section class="linenews">
    <div class="container">
        <div class="row hidden-xs">
            <div class="col-md-9">
                <div class="head_slider hidden-xs">
                    <?$i = 0;foreach ($arResult['MAIN_NEWS_LIST'] as $arNews): ?>
                        <?
                        $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arNews['DATE_ACTIVE_FROM']);
                        if(!$date) {
                            $date = \DateTime::createFromFormat('d.m.Y', $arNews['DATE_ACTIVE_FROM']);
                        }
                        ?>
                        <div
                            class="<?=($i)?'mini_container':'big_container'?>"
                            <?if($arNews['PREVIEW_PICTURE']):?>
                                style="background-image: url(<?=$arNews['PREVIEW_PICTURE']['src']?>);"
                            <?endif;?>
                        >
                            <div class="inf">
                                <?if($arNews['SECTION']):?>
                                    <div class="theme">
                                        <a href="<?=$arNews['SECTION']['SECTION_PAGE_URL']?>"><?=$arNews['SECTION']['NAME']?></a>
                                    </div>
                                <?endif?>
                                <div class="title"><?=$arNews['NAME']?></div>
                                <div class="content"><?=$arNews['PREVIEW_TEXT']?></div>
                                <a href="<?=$arNews['DETAIL_PAGE_URL']?>">Читать</a>
                            </div>
                        </div>
                    <?$i++; endforeach;?>
                </div>
            </div>
            <div class="col-md-3 hidden-xs hidden-sm">
                <div class="right_bar">
                    <div class="title">Лента новостей</div>
                    <ul class="tabs">
                        <li>Новости дня</li>
                        <li>В центре событий</li>
                    </ul>
                    <div class="items">
                        <?foreach ($arResult['NEWS_LIST'] as $arNews): ?>
                            <?
                            $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arNews['DATE_ACTIVE_FROM']);
                            if(!$date) {
                                $date = \DateTime::createFromFormat('d.m.Y', $arNews['DATE_ACTIVE_FROM']);
                            }
                            ?>
                            <a href="<?=$arNews['DETAIL_PAGE_URL']?>">
                                <span><?=$date?$date->format('H:i'):''?></span>
                                <?=$arNews['NAME']?>
                            </a>
                        <?endforeach;?>
                    </div>
                    <?if($arResult['NEWS_LIST']):?>
                        <div class="all"><a href="<?=reset($arResult['NEWS_LIST'])['LIST_PAGE_URL']?>">Вся лента</a></div>
                    <?endif?>
                </div>
            </div>
        </div>
    </div>
</section>
