<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
$dbResult = CIBlock::GetByID($arParams['IBLOCK_ID']); 
if($arIBlock = $dbResult->GetNext()) { 
    echo $arIBlock['DESCRIPTION']; 
}
?>
<div class="metall-list metall-construction">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="metall-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
			<div class="metall-item-img"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" /></div>
			<div class="metall-item-title">
				<div class="sort"><?echo $arItem["PREVIEW_TEXT"]?></div>
				<?echo $arItem["NAME"]?>
			</div>
		</a>
	</div>
<?endforeach;?>
<div class="metall-item last-child"></div>
<div class="metall-item last-last-child"></div>
</div>
