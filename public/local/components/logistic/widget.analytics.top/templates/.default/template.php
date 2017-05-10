<?if(sizeof($arResult['ARTICLE_LIST'])+sizeof($arResult['INTERVIEW_LIST'])+sizeof($arResult['PRESS_LIST'])):?>
    <div class="col-md-8">
        <div class="tabs_title">Выбор</div>
        <div class="infotabs_2" id="infotabs_2">
            <ul>
                <?if(sizeof($arResult['ARTICLE_LIST'])):?><li title="1">Статьи</li><?endif?>
                <?if(sizeof($arResult['INTERVIEW_LIST'])):?><li title="2">Интервью</li><?endif?>
                <?if(sizeof($arResult['PRESS_LIST'])):?><li title="3">Пресс-релизы</li><?endif?>
            </ul>
            <div class="content content_b">
                <?if(sizeof($arResult['ARTICLE_LIST'])):?>
                    <div class="info_2">
                        <div class="row">
                            <?foreach ($arResult['ARTICLE_LIST'] as $arArticle):?>
                                <?
                                $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arArticle['DATE_ACTIVE_FROM']);
                                if(!$date) {
                                    $date = \DateTime::createFromFormat('d.m.Y', $arArticle['DATE_ACTIVE_FROM']);
                                }
                                ?>
                                <div class="col-md-6">
                                    <a class="item_mini_1" href="<?=$arArticle['DETAIL_PAGE_URL']?>">
                                        <div class="img_box">
                                            <img src="<?=$arArticle['PREVIEW_PICTURE']['src']?>" alt="">
                                        </div>
                                        <div class="title"><?=$arArticle['NAME']?></div>
                                        <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                    </a>
                                </div>
                            <?endforeach;?>
                            <div class="col-md-12">
                                <div class="all"><a href="#">Все новости рубрики</a></div>
                            </div>
                        </div>
                    </div>
                <?endif?>
                <?if(sizeof($arResult['INTERVIEW_LIST'])):?>
                    <div class="info_2">
                        <div class="row">
                            <?foreach ($arResult['INTERVIEW_LIST'] as $arInterview):?>
                                <?
                                $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arInterview['DATE_ACTIVE_FROM']);
                                if(!$date) {
                                    $date = \DateTime::createFromFormat('d.m.Y', $arInterview['DATE_ACTIVE_FROM']);
                                }
                                ?>
                                <div class="col-md-6">
                                    <a class="item_mini" href="<?=$arInterview['DETAIL_PAGE_URL']?>">
                                        <div class="img_box">
                                            <img src="<?=$arInterview['PREVIEW_PICTURE']['src']?>" alt="">
                                        </div>
                                        <div class="title"><?=$arInterview['NAME']?></div>
                                        <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                    </a>
                                </div>
                            <?endforeach;?>
                            <div class="col-md-12">
                                <div class="all"><a href="#">Все новости рубрики</a></div>
                            </div>
                        </div>
                    </div>
                <?endif?>
                <?if(sizeof($arResult['PRESS_LIST'])):?>
                    <div class="info_2">
                        <div class="row">
                            <?foreach ($arResult['PRESS_LIST'] as $arPress):?>
                                <?
                                $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arPress['DATE_ACTIVE_FROM']);
                                if(!$date) {
                                    $date = \DateTime::createFromFormat('d.m.Y', $arPress['DATE_ACTIVE_FROM']);
                                }
                                ?>
                                <div class="col-md-6">
                                    <a class="item_mini" href="<?=$arPress['DETAIL_PAGE_URL']?>">
                                        <div class="img_box">
                                            <img src="<?=$arPress['PREVIEW_PICTURE']['src']?>" alt="">
                                        </div>
                                        <div class="title"><?=$arPress['NAME']?></div>
                                        <div class="time"><?=$date?$date->format('H:i'):''?></div>
                                    </a>
                                </div>
                            <?endforeach;?>
                            <div class="col-md-12">
                                <div class="all"><a href="#">Все новости рубрики</a></div>
                            </div>
                        </div>
                    </div>
                <?endif?>
            </div>
        </div>
    </div>
<?endif?>