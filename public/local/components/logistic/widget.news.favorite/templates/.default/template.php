<?if(sizeof($arResult['EDITOR_NEWS_LIST'])+sizeof($arResult['READER_NEWS_LIST'])):?>
    <div class="col-md-8">
        <div class="tabs_title">Выбор</div>
        <div class="infotabs_1" id="infotabs_1">
            <ul>
                <?if(sizeof($arResult['EDITOR_NEWS_LIST'])):?><li>Редакции</li><?endif?>
                <?if(sizeof($arResult['READER_NEWS_LIST'])):?><li>Читателей</li><?endif?>
            </ul>
            <div class="content">
                <?if(sizeof($arResult['EDITOR_NEWS_LIST'])):?>
                    <div class="info_1">
                        <div class="row">
                            <?$i=0;foreach ($arResult['EDITOR_NEWS_LIST'] as $arNews):?>
                                <?
                                $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arNews['DATE_ACTIVE_FROM']);
                                if(!$date) {
                                    $date = \DateTime::createFromFormat('d.m.Y', $arNews['DATE_ACTIVE_FROM']);
                                }
                                ?>
                                <?if($i==0):?>
                                    <div class="col-md-12">
                                        <a class="item_big" href="<?=$arNews['DETAIL_PAGE_URL']?>">
                                            <div class="col-md-5"><img src="<?=$arNews['PREVIEW_PICTURE']['src']?>" alt=""></div>
                                            <div class="col-md-7">
                                                <div class="title"><?=$arNews['NAME']?></div>
                                                <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                                <div class="content"><p><?=$arNews['PREVIEW_TEXT']?></p></div>
                                            </div>
                                        </a>
                                    </div>
                                <?else:?>
                                    <div class="col-md-6">
                                        <a class="item_mini" href="<?=$arNews['DETAIL_PAGE_URL']?>">
                                            <div class="img_box">
                                                <img src="<?=$arNews['PREVIEW_PICTURE']['src']?>" alt="">
                                            </div>
                                            <div class="title"><?=$arNews['NAME']?></div>
                                            <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                        </a>
                                    </div>
                                <?endif?>
                            <?$i++;endforeach;?>
<!--                            <div class="col-md-12">-->
<!--                                <div class="all"><a href="#">Все новости рубрики</a></div>-->
<!--                            </div>-->
                        </div>
                    </div>
                <?endif?>
                <?if(sizeof($arResult['READER_NEWS_LIST'])):?>
                    <div class="info_1">
                        <div class="row">
                            <?$i=0;foreach ($arResult['READER_NEWS_LIST'] as $arNews):?>
                                <?
                                $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arNews['DATE_ACTIVE_FROM']);
                                if(!$date) {
                                    $date = \DateTime::createFromFormat('d.m.Y', $arNews['DATE_ACTIVE_FROM']);
                                }
                                ?>
                                <?if($i==0):?>
                                    <div class="col-md-12">
                                        <a class="item_big" href="<?=$arNews['DETAIL_PAGE_URL']?>">
                                            <div class="col-md-5"><img src="<?=$arNews['PREVIEW_PICTURE']['src']?>" alt=""></div>
                                            <div class="col-md-7">
                                                <div class="title"><?=$arNews['NAME']?></div>
                                                <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                                <div class="content"><p><?=$arNews['PREVIEW_TEXT']?></p></div>
                                            </div>
                                        </a>
                                    </div>
                                <?else:?>
                                    <div class="col-md-6">
                                        <a class="item_mini" href="<?=$arNews['DETAIL_PAGE_URL']?>">
                                            <div class="img_box">
                                                <img src="<?=$arNews['PREVIEW_PICTURE']['src']?>" alt="">
                                            </div>
                                            <div class="title"><?=$arNews['NAME']?></div>
                                            <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                        </a>
                                    </div>
                                <?endif?>
                                <?$i++;endforeach;?>
                            <!--                            <div class="col-md-12">-->
                            <!--                                <div class="all"><a href="#">Все новости рубрики</a></div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                <?endif?>
            </div>
        </div>
    </div>
<?endif?>