<div class="col-md-4">
    <div class="col_item hidden-xs hidden-sm">
        <div class="items event-list">
            <div class="title">Мероприятия</div>
            <? foreach ($arResult['EVENT_LIST'] as $arEvent): ?>
                <div class="item_right">
                    <div class="title_r"><a href="<?=$arEvent['DETAIL_PAGE_URL']?>"><?=$arEvent['NAME']?></a></div>
                    <div class="content_r"><?=$arEvent['PREVIEW_TEXT']?></div>
                    <div class="time_r">Дата:<span><?=$arEvent['DATE_ACTIVE_FROM']?></span></div>
                    <div class="place_r">Место:<span><?=$arEvent['PROPERTY_PLACE_VALUE']?></span></div>
                </div>
            <? endforeach; ?>
            <? if(sizeof($arResult['EVENT_LIST'])): ?>
                <div class="all"><a href="<?=reset($arResult['EVENT_LIST'])['LIST_PAGE_URL']?>">Все новости рубрики</a></div>
            <? endif ?>
        </div>
    </div>
</div>