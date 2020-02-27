<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetPageProperty("title", '404 Страница не найдена');

header("HTTP/1.0 404 Not Found");

$APPLICATION->IncludeComponent(
	"bitrix:main.map", 
	"monolit", 
	array(
		"LEVEL" => "1",
		"COL_NUM" => "2",
		"SHOW_DESCRIPTION" => "Y",
		"SET_TITLE" => "N",
		"CACHE_TIME" => "36000000",
		"COMPONENT_TEMPLATE" => "monolit",
		"CACHE_TYPE" => "A"
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>