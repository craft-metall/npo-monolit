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
?>

<a class="bx_catalog_tile_img" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>">
    
		<?if(is_array($item["PREVIEW_PICTURE"])):?>
			<img
								src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$item["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$item["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$productTitle?>"
								title="<?=$productTitle?>"
								/>
		<?endif?>
</a>


		<div class="bx_catalog_tile_title">
			<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>"><?=$productTitle?></a>
		</div>
