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
$this->setFrameMode(true);?>
<form class="m-form" action="<?=$arResult["FORM_ACTION"]?>">
    <?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
        "bitrix:search.suggest.input",
        "",
        array(
            "NAME" => "q",
            "VALUE" => "",
            "INPUT_SIZE" => 15,
            "DROPDOWN_SIZE" => 10,
        ),
        $component, array("HIDE_ICONS" => "Y")
    );?>

    <?else:?>
        <input class="hdn-input" type="text" name="q" value="" placeholder="Поиск"/>
    <?endif;?>
    <button class="hdn-button" name="s" type="submit"><img width="15" src="/upload/src-b.png" alt="Поиск" title="Поиск"></button>
</form>
<script>
    $('.btn-search-mob').click(function() {
        $('.m-form').toggleClass('vis');
        return false;
    })
</script>
