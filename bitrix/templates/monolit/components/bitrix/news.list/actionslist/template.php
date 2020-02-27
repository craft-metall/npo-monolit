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

if (count($arResult["ITEMS"]) > 0) {
 ?>
 <div class="row pt-3 pt-md-5 pb-4">
  <?
		foreach($arResult["ITEMS"] as $arItem) { ?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
  <div class="col-12 d-flex justify-content-center mb-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
   <div class="action__item d-flex justify-content-center align-items-end mx-auto">
     <?if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
      <?$arRes = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>960, 'height'=>203), BX_RESIZE_IMAGE_EXACT, true);?>
      <img src="<?=$arRes["src"]?>" width="<?=$arRes["width"]?>" height="<?=$arRes["height"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
     <?endif?>
     <div class="action__item_block px-5 pt-5 w-100">
      <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
       <div class="action__item_date mb-3">
        <?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
       </div>
      <?endif?>
      <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
       <div class="action__title">
        <?echo $arItem["NAME"]?>
       </div>
      <?endif?>
      <?if($arItem["PREVIEW_TEXT"]):?>
       <p class="action__description py-4"><?=$arItem["PREVIEW_TEXT"];?></p>
      <?endif;?>
     </div>
     <div class="action__wrapper w-100 h-100">
     <a class="action__item_button" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Узнать больше</a>
     </div>
   </div>
  </div>
  <? } ?>
 </div>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
<? } ?>
