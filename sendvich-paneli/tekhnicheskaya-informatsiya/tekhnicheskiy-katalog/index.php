<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Заказать сэндвич-панели");
$APPLICATION->SetPageProperty("title", "Каталог сэндвич-панелей");

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