<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_RECURSIVE" => "N",
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "bottom",
        "EDIT_TEMPLATE" => ""
    )
);?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="content">
                    <a href="#"><img src="<?=P_ASSETS?>img/logo.png" alt=""></a>
                    <div class="information">
                        LOGISTIC.RU® — новости логистики, транспорта и таможни. Эксклюзивные материалы <br> и новостные ленты ведущих агентств. Новости авиатранспорта и автотранспорта, ответственное хранение грузов.

                        <span>Все права защищены, © ООО «Логистик.Ру». <br> Любое использование материалов допускается только <br> при соблюдении правил перепечатки <br> и при наличии гиперссылки на logistic.ru</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <?$APPLICATION->IncludeComponent("bitrix:menu",
                    "footer",
                    Array(
                        "ROOT_MENU_TYPE" => "footer1",	// Тип меню для первого уровня
                        "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                        "MAX_LEVEL" => "1",	// Уровень вложенности меню
                        "CHILD_MENU_TYPE" => "footer1",	// Тип меню для остальных уровней
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    ),
                    false
                );?>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <?$APPLICATION->IncludeComponent("bitrix:menu",
                    "footer",
                    Array(
                        "ROOT_MENU_TYPE" => "footer2",	// Тип меню для первого уровня
                        "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                        "MAX_LEVEL" => "1",	// Уровень вложенности меню
                        "CHILD_MENU_TYPE" => "footer1",	// Тип меню для остальных уровней
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    ),
                    false
                );?>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-12">
                <div class="logo_assg">
                    <span class="hidden-xs">Разработка сайта:</span>
                    <a href="http://as-sg.ru/"><img src="<?=P_ASSETS?>img/assg_logo_white.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<div class="sb-right" id="sb-right"  off-canvas="sb-right right shift">
    <div class="logo"><a href="/"><img src="<?=P_ASSETS?>img/logo.png" alt=""></a></div>
</div>


<!-- Optimized loading JS Start -->
<script>var scr = {"scripts":[
    {"src" : "<?=P_ASSETS?>js/libs.min.js", "async" : false},
    {"src" : "<?=P_ASSETS?>js/common.js", "async" : false}
  ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Optimized loading JS End -->

</body>
</html>