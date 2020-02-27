<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Подписка на рассылки");
$APPLICATION->SetTitle( "Подписка на рассылки");?>

<p>Вы можете подписаться на наши рассылки</p>
<?$APPLICATION->IncludeComponent("bitrix:sender.subscribe","monolit",Array(
                                                              "COMPONENT_TEMPLATE" => "monolit",
                                                              "USE_PERSONALIZATION" => "Y",
                                                              "CONFIRMATION" => "N",
                                                              "SHOW_HIDDEN" => "Y",
                                                              "AJAX_MODE" => "Y",
                                                              "AJAX_OPTION_JUMP" => "Y",
                                                              "AJAX_OPTION_STYLE" => "Y",
                                                              "AJAX_OPTION_HISTORY" => "Y",
                                                              "CACHE_TYPE" => "A",
                                                              "CACHE_TIME" => "3600",
                                                              "SET_TITLE" => "N"
                                                          )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
