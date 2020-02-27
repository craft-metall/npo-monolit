<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="rm">  <button class="navbar-toggler right_m" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="lm"> КАТАЛОГ </span> <span class="navbar-toggler-icon"></span>
  </button>
  </div>
  <!--<div class="menu" >Главное меню</div> -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	 <div class="db"><hr></div>

<ul id="horizontal-multilevel-menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li><li class='sep'><div></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>
		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li<?if ($arItem["IS_PARENT"]):?> class="parent parent_m"<?endif?>><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="mobi_d">
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul class="mobi_d">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item dropdown-item<?endif?>"><?=$arItem["TEXT"]?></a></li><li class="sep"><div></div></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>
	
	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li><li class='sep'><div></div></li>", ($previousLevel-1) );?>
<?endif?>
</ul>
  </div>
<div class="menu-clear-left"></div>

<?endif?>

