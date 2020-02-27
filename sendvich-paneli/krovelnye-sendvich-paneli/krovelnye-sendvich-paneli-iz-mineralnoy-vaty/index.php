<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Сэндвич-панели из минеральной ваты цена");
$APPLICATION->SetPageProperty("title", "Title");

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