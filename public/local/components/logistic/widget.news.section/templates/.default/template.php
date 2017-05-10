<? if($arResult['SECTION']): ?>
    <div class="col-md-4 col-sm-6">
        <div class="col_item">
            <a class="title" href="<?=$arResult['SECTION']['SECTION_PAGE_URL']?>"><?=$arResult['SECTION']['NAME']?></a>
            <? $i = 0; foreach($arResult['NEWS_LIST'] as $arNews): ?>
                <?
                $date = \DateTime::createFromFormat('d.m.Y H:i:s', $arNews['DATE_ACTIVE_FROM']);
                if(!$date) {
                    $date = \DateTime::createFromFormat('d.m.Y', $arNews['DATE_ACTIVE_FROM']);
                }
                ?>
                <a class="<?=(!$i)?'items':'item'?>" href="<?=$arNews['DETAIL_PAGE_URL']?>">
                    <div class="img_box"><img src="<?=$arNews['PREVIEW_PICTURE']['src']?>" alt=""></div>
                    <div class="content_title"><?=$arNews['NAME']?></div>
                    <div class="time"><?=$date?$date->format('H:i'):''?></div>
                    <? if(!$i): ?>
                        <div class="content"><?=$arNews['PREVIEW_TEXT']?></div>
                    <? endif ?>
                </a>
            <? $i++; endforeach; ?>
            <div class="all"><a href="<?=$arResult['SECTION']['SECTION_PAGE_URL']?>">Все новости рубрики</a></div>
        </div>
    </div>
<? endif; ?>