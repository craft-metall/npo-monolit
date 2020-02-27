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
<div class="sphere-section">
		<div class="sphere-item">
			<div class="section-title">Сферы применения</div>
			металлоконструкций,<br> сэндвич-панелей, ТПА
		</div>
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<?
		//$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		//$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
			<div class="sphere-item">
				<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
					<div class="sphere-item-img">
						<img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arElement["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arElement["PREVIEW_PICTURE"]["TITLE"]?>" />
					</div>
				<?endif?>
				<div class="sphere-item-title"><?=$arElement["NAME"]?></div>
				<!--<div class="hover-block"> -->
						<?//=$arElement["PREVIEW_TEXT"]?>
                <!--</div> -->
			</div>
		<?endforeach;?>
</div>
