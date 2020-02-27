<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */

if ($haveOffers)
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];
	$showPropsBlock = $showDisplayProps || $showProductProps;
	$showSkuBlock = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && !empty($item['OFFERS_PROP']);
}
else
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']);
	$showPropsBlock = $showDisplayProps || $showProductProps;
	$showSkuBlock = false;
}
?>
<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>">
    
		<?if(is_array($item["PREVIEW_PICTURE"])):?>
			<img
								src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$item["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$item["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$item["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$item["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
		<?endif?>
</a>


		<div class="bx_catalog_tile_title">
			<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>"><?=$productTitle?></a>
		</div>
