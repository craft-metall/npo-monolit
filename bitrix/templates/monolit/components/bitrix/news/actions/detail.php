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
<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" 			=> $arParams["USE_SHARE"],
		"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : '')
	),
	$component
);?>
<?//if(CSite::InDir('/news/vystavka2017/')||CSite::InDir('/sankt-peterburg/news/vystavka2017/')||CSite::InDir('/krasnodar/news/vystavka2017/')):?>
<!--<h3 id="regorder" style="text-align:center">Регистрация на выставку Металл Экспо 2017</h3>-->
<?$APPLICATION->IncludeComponent("altasib:feedback.form", "registration", array(
	"ACTIVE_ELEMENT" => "Y",
		"ADD_HREF_LINK" => "N",
		"ADD_LEAD" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"ALX_CHECK_NAME_LINK" => "N",
		"ALX_LINK_POPUP" => "N",
		"ALX_LOAD_PAGE" => "N",
		"ALX_NAME_LINK" => "",
		"BACKCOLOR_ERROR" => "#ffffff",
		"BBC_MAIL" => "",
		"BORDER_RADIUS" => "3px",
		"CAPTCHA_TYPE" => "recaptcha",
		"CATEGORY_SELECT_NAME" => "",
		"CHANGE_CAPTCHA" => "N",
		"CHECKBOX_TYPE" => "CHECKBOX",
		"CHECK_ERROR" => "Y",
		"COLOR_ERROR" => "#8E8E8E",
		"COLOR_ERROR_TITLE" => "#A90000",
		"COLOR_HINT" => "#000000",
		"COLOR_INPUT" => "#727272",
		"COLOR_MESS_OK" => "#963258",
		"COLOR_NAME" => "#000000",
		"COLOR_OTHER" => "#b4272d",
		"COLOR_SCHEME" => "BRIGHT",
		"COLOR_THEME" => "",
		"EVENT_TYPE" => "ALX_REGISTER_FORM",
		"FB_TEXT_NAME" => "",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "8",
		"HIDE_FORM" => "Y",
		"IBLOCK_ID" => "40",
		"IBLOCK_TYPE" => "altasib_feedback",
		"IMG_ERROR" => "",
		"IMG_OK" => "",
		"INPUT_APPEARENCE" => array(
			0 => "DEFAULT",
		),
		"JQUERY_EN" => "N",
		"LEAD_ADDRESS" => "",
		"LEAD_COMPANY_TITLE" => "",
		"LEAD_DATE_CLOSED" => "",
		"LEAD_EMAIL_HOME" => "",
		"LEAD_EMAIL_OTHER" => "",
		"LEAD_EMAIL_WORK" => "",
		"LEAD_LAST_NAME" => "",
		"LEAD_NAME" => "",
		"LEAD_OPPORTUNITY" => "",
		"LEAD_PHONE_FAX" => "",
		"LEAD_PHONE_HOME" => "",
		"LEAD_PHONE_MOBILE" => "",
		"LEAD_PHONE_OTHER" => "",
		"LEAD_PHONE_PAGER" => "",
		"LEAD_PHONE_WORK" => "",
		"LEAD_POST" => "",
		"LEAD_SECOND_NAME" => "",
		"LEAD_TITLE" => "",
		"LEAD_WEB_FACEBOOK" => "",
		"LEAD_WEB_HOME" => "",
		"LEAD_WEB_LIVEJOURNAL" => "",
		"LEAD_WEB_OTHER" => "",
		"LEAD_WEB_TWITTER" => "",
		"LEAD_WEB_WORK" => "",
		"LINK_SEND_MORE_TEXT" => "",
		"LOCAL_REDIRECT_ENABLE" => "N",
		"MASKED_INPUT_PHONE" => array(
			0 => "PHONE",
		),
		"MESSAGE_OK" => "Спасибо! Заявка на регистрацию принята.",
		"NAME_ELEMENT" => "COMPANY_NAME",
		"NOT_CAPTCHA_AUTH" => "Y",
		"POPUP_ANIMATION" => "0",
		"PROPERTY_FIELDS" => array(
			0 => "COMPANY_NAME",
			1 => "FIO",
			2 => "POSITION",
			3 => "COUNTRY",
			4 => "ZIP",
			5 => "CITY",
			6 => "STREET",
			7 => "HOUSE",
			8 => "PHONE",
			9 => "EMAIL",
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
			0 => "COMPANY_NAME",
			1 => "FIO",
			2 => "PHONE",
			3 => "EMAIL",
		),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(
			0 => "EMAIL",
		),
		"PROPS_AUTOCOMPLETE_NAME" => array(
			0 => "FIO",
		),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(
			0 => "PHONE",
		),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"RECAPTCHA_THEME" => "light",
		"RECAPTCHA_TYPE" => "image",
		"REWIND_FORM" => "N",
		"SECTION_FIELDS_ENABLE" => "N",
		"SECTION_MAIL_ALL" => "info@craftmetall.ru",
		"SEND_IMMEDIATE" => "Y",
		"SEND_MAIL" => "Y",
		"SHOW_LINK_TO_SEND_MORE" => "N",
		"SHOW_MESSAGE_LINK" => "Y",
		"SIZE_HINT" => "10px",
		"SIZE_INPUT" => "12px",
		"SIZE_NAME" => "12px",
		"USERMAIL_FROM" => "N",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_INPUT_LABEL" => "",
		"USER_CONSENT_IS_CHECKED" => "N",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CAPTCHA" => "Y",
		"WIDTH_FORM" => "50%",
		"COMPONENT_TEMPLATE" => ".default",
		"USER_EVENT" => "ALX_FEEDBACK_FORM_SEND_MAIL"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
<?//endif;?>
<?if($arParams["USE_RATING"]=="Y" && $ElementID):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:iblock.vote",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_ID" => $ElementID,
		"MAX_VOTE" => $arParams["MAX_VOTE"],
		"VOTE_NAMES" => $arParams["VOTE_NAMES"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
	),
	$component
);?>
<?endif?>
<?if($arParams["USE_CATEGORIES"]=="Y" && $ElementID):
	global $arCategoryFilter;
	$obCache = new CPHPCache;
	$strCacheID = $componentPath.LANG.$arParams["IBLOCK_ID"].$ElementID.$arParams["CATEGORY_CODE"];
	if(($tzOffset = CTimeZone::GetOffset()) <> 0)
		$strCacheID .= "_".$tzOffset;
	if($arParams["CACHE_TYPE"] == "N" || $arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "N")
		$CACHE_TIME = 0;
	else
		$CACHE_TIME = $arParams["CACHE_TIME"];
	if($obCache->StartDataCache($CACHE_TIME, $strCacheID, $componentPath))
	{
		$rsProperties = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $ElementID, "sort", "asc", array("ACTIVE"=>"Y","CODE"=>$arParams["CATEGORY_CODE"]));
		$arCategoryFilter = array();
		while($arProperty = $rsProperties->Fetch())
		{
			if(is_array($arProperty["VALUE"]) && count($arProperty["VALUE"])>0)
			{
				foreach($arProperty["VALUE"] as $value)
					$arCategoryFilter[$value]=true;
			}
			elseif(!is_array($arProperty["VALUE"]) && strlen($arProperty["VALUE"])>0)
				$arCategoryFilter[$arProperty["VALUE"]]=true;
		}
		$obCache->EndDataCache($arCategoryFilter);
	}
	else
	{
		$arCategoryFilter = $obCache->GetVars();
	}
	if(count($arCategoryFilter)>0):
		$arCategoryFilter = array(
			"PROPERTY_".$arParams["CATEGORY_CODE"] => array_keys($arCategoryFilter),
			"!"."ID" => $ElementID,
		);
		?>
		<hr /><h3><?=GetMessage("CATEGORIES")?></h3>
		<?foreach($arParams["CATEGORY_IBLOCK"] as $iblock_id):?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				$arParams["CATEGORY_THEME_".$iblock_id],
				Array(
					"IBLOCK_ID" => $iblock_id,
					"NEWS_COUNT" => $arParams["CATEGORY_ITEMS_COUNT"],
					"SET_TITLE" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"FILTER_NAME" => "arCategoryFilter",
					"CACHE_FILTER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
				),
				$component
			);?>
		<?endforeach?>
	<?endif?>
<?endif?>
<?if($arParams["USE_REVIEW"]=="Y" && IsModuleInstalled("forum") && $ElementID):?>
<hr />
<?$APPLICATION->IncludeComponent(
	"bitrix:forum.topic.reviews",
	"",
	Array(
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
		"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
		"PATH_TO_SMILE" => $arParams["PATH_TO_SMILE"],
		"FORUM_ID" => $arParams["FORUM_ID"],
		"URL_TEMPLATES_READ" => $arParams["URL_TEMPLATES_READ"],
		"SHOW_LINK_TO_FORUM" => $arParams["SHOW_LINK_TO_FORUM"],
		"DATE_TIME_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"ELEMENT_ID" => $ElementID,
		"AJAX_POST" => $arParams["REVIEW_AJAX_POST"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"URL_TEMPLATES_DETAIL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
	),
	$component
);?>
<?endif?>
