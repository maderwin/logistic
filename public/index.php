<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

    <section class="box_information">
        <div class="container">
            <div class="row">
                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.section",
                    "",
                    Array(
                        'SECTION_CODE' => 'transport'
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.section",
                    "",
                    Array(
                        'SECTION_CODE' => 'customs'
                    )
                );?>
                <div class="col-md-4 col-sm-6">
                    <div class="col_item hidden-xs hidden-sm">
                        <div class="items">
                            <div class="title">Курсы валют</div>
                            <div class="curs">
                                <div class="row">
                                    <div class="col-md-3"><div class="head">Нал.</div></div>
                                    <div class="col-md-3"><div class="money">USD</div></div>
                                    <div class="col-md-2"><div class="time_money">03:18</div></div>
                                    <div class="col-md-2"><div class="money_price up">63,98</div></div>
                                    <div class="col-md-2"><div class="money_price">63,98</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head"></div></div>
                                    <div class="col-md-3"><div class="money">EUR</div></div>
                                    <div class="col-md-2"><div class="time_money">03:18</div></div>
                                    <div class="col-md-2"><div class="money_price up">73,42</div></div>
                                    <div class="col-md-2"><div class="money_price down">71,20</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head">Бирж.</div></div>
                                    <div class="col-md-3"><div class="money">USD</div></div>
                                    <div class="col-md-2"><div class="time_money">03:24</div></div>
                                    <div class="col-md-2"><div class="money_price up">63,04</div></div>
                                    <div class="col-md-2"><div class="money_price">63,98</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head"></div></div>
                                    <div class="col-md-3"><div class="money">EUR</div></div>
                                    <div class="col-md-2"><div class="time_money">03:24</div></div>
                                    <div class="col-md-2"><div class="money_price up">72,04</div></div>
                                    <div class="col-md-2"><div class="money_price">70,01</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head"></div></div>
                                    <div class="col-md-3"><div class="money">GBR</div></div>
                                    <div class="col-md-2"><div class="time_money">03:24</div></div>
                                    <div class="col-md-2"><div class="money_price up">72,04</div></div>
                                    <div class="col-md-2"><div class="money_price down">71,01</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head">ЦБ.</div></div>
                                    <div class="col-md-3"><div class="money">USD</div></div>
                                    <div class="col-md-2"><div class="time_money">03:18</div></div>
                                    <div class="col-md-2"><div class="money_price up">63,1</div></div>
                                    <div class="col-md-2"><div class="money_price">66,45</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head"></div></div>
                                    <div class="col-md-3"><div class="money">EUR</div></div>
                                    <div class="col-md-2"><div class="time_money">03:18</div></div>
                                    <div class="col-md-2"><div class="money_price up">63,20</div></div>
                                    <div class="col-md-2"><div class="money_price down">65,98</div></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><div class="head">EUR/USD</div></div>
                                    <div class="col-md-3"><div class="money"></div></div>
                                    <div class="col-md-2"><div class="time_money">03:18</div></div>
                                    <div class="col-md-2"><div class="money_price up">1,12</div></div>
                                    <div class="col-md-2"><div class="money_price">1,12</div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reck hidden-xs hidden-sm"><a href="#"><img src="<?=P_ASSETS?>img/rec.jpg" alt=""></a></div>
                </div>
            </div>
            <div class="row">

                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.section",
                    "",
                    Array(
                        'SECTION_CODE' => 'business'
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.section",
                    "",
                    Array(
                        'SECTION_CODE' => 'petroleum'
                    )
                );?>
                <div class="col-md-4 col-sm-12">
                    <div class="col_item">
                        <div class="items">
                            <div class="title">Спецпроекты</div>
                            <ul class="superproject">
                                <li><a href="#" style="background-image: url(<?=P_ASSETS?>img/right_bar_1.jpg);"><span>Нефтегазовая территория</span></a></li>
                                <li><a href="#" style="background-image: url(<?=P_ASSETS?>img/right_bar_2.jpg);"><span>Транспортные проекты</span></a></li>
                                <li><a href="#" style="background-image: url(<?=P_ASSETS?>img/right_bar_3.jpg);"><span>О погоде <br/> и транспорте</span></a></li>
                                <li><a href="#" style="background-image: url(<?=P_ASSETS?>img/right_bar_4.jpg);"><span>Внешняя политика и экономика</span></a></li>
                                <li><a href="#" style="background-image: url(<?=P_ASSETS?>img/right_bar_5.jpg);"><span>Москва <br/> сегодня</span></a></li>
                                <li><a href="#" style="background-image: url(<?=P_ASSETS?>img/right_bar_6.jpg);"><span>Газовая дипломатия</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.section",
                    "",
                    Array(
                        'SECTION_CODE' => 'storage'
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.section",
                    "",
                    Array(
                        'SECTION_CODE' => 'technology'
                    )
                );?>

                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.event.list",
                    "",
                    Array(

                    )
                );?>
            </div>
            <div class="row">

                <?$APPLICATION->IncludeComponent(
                    "logistic:widget.news.favorite",
                    "",
                    Array(

                    )
                );?>
                <div class="col-md-4">
                    <div class="col_item_2">
                        <div class="items">
                            <div class="title">Новые документы</div>
                            <div class="item_right">
                                <div class="title_r"><span>11:41</span>Нормативные акты и распоряжения: « О внесении изменения в пункт 2-1 Решения комисси Таможенного союза от 28 мая 2010г. №299»</div>
                                <div class="content_r">
                                    Решение Коллегия ЕЭК №118 <br>от 2016-10-25 11:41:47
                                </div>
                            </div>
                            <div class="item_right">
                                <div class="title_r"><span>12:12</span>Нормативные акты и распоряжения: «О признании утратившими силу некоторых нормативных правовых актов ФТС России»</div>
                                <div class="content_r">
                                    Приказ ФТС РФ № 1934 от 2016-10-10 08:12:12.
                                </div>
                            </div>
                            <div class="item_right">
                                <div class="title_r"><span>10:09</span>Нормативные акты и распоряжения: «О признании утратившим силу приказа ФТС России от 30 июля 2015 г. N 1526»</div>
                                <div class="content_r">
                                    Приказ ФТС РФ № 1935 от 2016-10-10 08:10:09.
                                </div>
                            </div>
                            <div class="all"><a href="#">Все новости рубрики</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>