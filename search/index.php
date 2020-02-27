<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Поиск по сайту");
$APPLICATION->SetTitle("Поиск по сайту");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"monolit",
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DEFAULT_SORT" => "rank",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_NAME" => "",
		"NO_WORD_LOGIC" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "modern",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGE_RESULT_COUNT" => "5",
		"RESTART" => "Y",
		"SHOW_WHEN" => "N",
		"SHOW_WHERE" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "N",
		"USE_TITLE_RANK" => "N",
		"arrFILTER" => array(
			0 => "main",
			1 => "iblock_content",
			2 => "iblock_catalog",
		),
		"arrWHERE" => "",
		"COMPONENT_TEMPLATE" => "monolit",
		"arrFILTER_main" => array(
		),
		"arrFILTER_iblock_content" => array(
			0 => "all",
		),
		"arrFILTER_iblock_catalog" => array(
			0 => "all",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
