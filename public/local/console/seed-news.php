<?php
require "prolog.php";

Bitrix\Main\Loader::includeModule('iblock');

$faker = Faker\Factory::create('ru_RU');
$el = new CIBlockElement();
$arTags = $faker->words(20);

for($i = 0; $i < 100; $i++){
    shuffle($arTags);
    $el->Add([
        'IBLOCK_ID' => IB_CONTENT_NEWS,
        'NAME' => $faker->realText(100),
        'DETAIL_TEXT' => $faker->realText(1000),
        'DATE_ACTIVE_FROM' => $faker->dateTimeThisMonth->format('d.m.Y H:i:s'),
        'TAGS' => implode(', ', array_slice($arTags, 0, rand(3, 5)))
    ]);
}