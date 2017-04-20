<?php
require "prolog.php";

Bitrix\Main\Loader::includeModule('iblock');

$faker = Faker\Factory::create('ru_RU');
$el = new CIBlockElement();

for($i = 0; $i < 30; $i++){
    $el->Add([
        'IBLOCK_ID' => IB_CONTENT_COMPANY,
        'NAME' => $faker->company,
        'PREVIEW_TEXT' => $faker->realText(100),
        'DETAIL_TEXT' => $faker->realText(1000),
        'DATE_ACTIVE_FROM' => $faker->dateTimeThisMonth->format('d.m.Y H:i:s'),
        'PROPERTY_VALUES' => [
            'ADDRESS' => $faker->address,
            'PHONE' => $faker->phoneNumber,
            'EMAIL' => $faker->companyEmail,
            'LINK' => $faker->url,
            'WORKHOURS' => '9:00 - 18:00',
        ],
    ]);
}