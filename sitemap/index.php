<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Карта сайта");
$APPLICATION->SetTitle("Карта сайта");
?><h1>Карта сайта</h1>
<?$APPLICATION->IncludeComponent("bitrix:main.map", "monolit", Array(
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COL_NUM" => "2",	// Количество колонок
		"LEVEL" => "3",	// Максимальный уровень вложенности (0 - без вложенности)
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_DESCRIPTION" => "N",	// Показывать описания
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>