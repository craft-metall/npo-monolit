<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Элементы обрамления кровли");
$APPLICATION->SetPageProperty("title", "Купить элементы обрамления кровли");

?>
<?$APPLICATION->IncludeFile(
    "/include/pannels.php",
    [],
    ["MODE"=>"php"]
)?>
<br>
<?$APPLICATION->IncludeFile(
								$APPLICATION->GetTemplatePath("/include/feedback_form.php"),
								Array(),
								Array("MODE"=>"php")
							);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>