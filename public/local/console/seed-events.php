<?php
require "prolog.php";

Bitrix\Main\Loader::includeModule('iblock');

$faker = Faker\Factory::create('ru_RU');
$el = new CIBlockElement();

for($i = 0; $i < 30; $i++){
    $el->Add([
        'IBLOCK_ID' => IB_CONTENT_EVENT,
        'NAME' => $faker->realText(100),
        'PREVIEW_TEXT' => $faker->realText(100),
        'DETAIL_TEXT' => $faker->realText(1000),
        'DATE_ACTIVE_FROM' => $faker->dateTimeThisMonth->format('d.m.Y H:i:s'),
        'PROPERTY_VALUES' => [
            'PLACE' => $faker->address,
            'PRICE' => rand(10, 200) * 10,
            'COORDINATES' => $faker->latitude . ',' . $faker->longitude
        ],
    ]);
}