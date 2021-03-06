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
?>
<div class="subscribe-form"  id="subscribe-form">
    <?
    $frame = $this->createFrame("subscribe-form", false)->begin();
    ?>
    <form action="<?=$arResult["FORM_ACTION"]?>" style="text-align: right">
        <div style="display:inline-block">
            <?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
                <?if ($itemValue['NAME'] == "Новости"):?>
                    <label style="visibility: hidden" for="sf_RUB_ID_<?=$itemValue["ID"]?>">
                        <input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /> <?=$itemValue["NAME"]?>
                    </label><br />
                <?endif;?>
            <?endforeach;?>
        </div>

        <div style="display:inline-block;padding-left: 100px;">
            <input class="subscribe-input" type="text" name="sf_EMAIL" placeholder="Ваш e-mail" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" />
            <input class="subscribe-submit" type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" />
        </div>

    </form>
    <?
    $frame->beginStub();
    ?>
    <form action="<?=$arResult["FORM_ACTION"]?>">

        <?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
            <label for="sf_RUB_ID_<?=$itemValue["ID"]?>">
                <input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>" /> <?=$itemValue["NAME"]?>
            </label><br />
        <?endforeach;?>

        <input type="text" name="sf_EMAIL" size="20" value="" title="<?=GetMessage("subscr_form_email_title")?>" />
        <input type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" />

    </form>
    <?
    $frame->end();
    ?>
</div>
