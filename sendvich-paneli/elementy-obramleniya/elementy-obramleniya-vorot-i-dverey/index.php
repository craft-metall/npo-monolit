<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Купить элементы обрамления ворот и дверей");
$APPLICATION->SetPageProperty("title", "Элементы обрамления ворот и дверей");

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