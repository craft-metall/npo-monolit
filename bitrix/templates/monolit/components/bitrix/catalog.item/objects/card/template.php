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
	<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" width="100%" height="auto" title="<?=$imgTitle?>" alt="<?=$imgTitle?>">
	<div class="hover-block">
		<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>">
			<div class="product-item-title"><?=$productTitle?></div>
		</a>
	</div>
