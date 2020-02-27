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
<div class="wrap">
<div class="frame" id="cyclepages">
<ul class="clearfix">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?
                         $arRes = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>230, 'height'=>142), BX_RESIZE_IMAGE_EXACT, true);
                        ?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						src="<?=$arRes["src"]?>" width="<?=$arRes["width"]?>" height="<?=$arRes["height"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/></a>
		<?endif?>
	</li>
<?endforeach;?>
</ul>
			</div>
<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
		</div>
