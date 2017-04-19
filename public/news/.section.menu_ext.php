<?

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "ID" => $_REQUEST["ELEMENT_ID"],
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => IB_CONTENT_NEWS,
        "SECTION_URL" => "/news/#SECTION_CODE#/",
        "CACHE_TIME" => "3600",
        "DEPTH_LEVEL" => '1'
    )
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>