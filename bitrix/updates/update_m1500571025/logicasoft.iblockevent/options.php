<?php
/**
 * Created by PhpStorm.
 * User: Shein D.E.
 * Date: 05.01.2015
 * Time: 18:09
 */

define('ADMIN_MODULE_ID', 'logicasoft.iblockevent');

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT.'/modules/main/options.php');
IncludeModuleLangFile(__FILE__);

/** @global CMain $APPLICATION */
global $APPLICATION;
/** @var CAdminMessage $message */

if (!CModule::IncludeModule('iblock')) {
	ShowError(GetMessage('IBLOCK_MODULE_NOT_INSTALLED'));
	return;
}
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/iblock/prolog.php');

CModule::IncludeModule('logicasoft.iblockevent');

CJSCore::Init(array('fileman'));

$APPLICATION->SetAdditionalCSS('/bitrix/js/'.ADMIN_MODULE_ID.'/css/options.css');

$arTypesEx = CIBlockParameters::GetIBlockTypes();
//echo '<pre>'; print_r($arTypesEx); echo '</pre>';
$arIBlocks = array();
foreach ($arTypesEx as $key=>$name) {
	$arIBlocks[$key] = array(
		'NAME' => $name,
		'IBLOCKS' => array()
	);
}
$res = CIBlock::GetList(array('SORT' => 'ASC'), array(
	//'SITE_ID' => $_REQUEST['site'],
	//'TYPE' => ($arCurrentValues['IBLOCK_TYPE'] != '-' ? $arCurrentValues['IBLOCK_TYPE'] : '')
));
while ($row = $res->Fetch()) {
	$arIBlocks[$row['IBLOCK_TYPE_ID']]['IBLOCKS'][$row['ID']] = $row['NAME'];
}

//echo '<pre>'; print_r($arIBlocks); echo '</pre>';

// Возможные события
$arEvents = array(
	'OnAfterIBlockElementAdd' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_OnAfterIBlockElementAdd'),
	'OnAfterIBlockElementUpdate' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_OnAfterIBlockElementUpdate'),
	'OnAfterIBlockElementDelete' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_OnAfterIBlockElementDelete')
);

// Почтовые шаблоны
$res = CEventMessage::GetList($by='subject', $order="asc", array('TYPE_ID'=>'LOGICASOFT_IBLOCKEVENT'));
$message_template = array(
	GetMessage('LOGICASOFT_IBLOCKEVENT_TEMPLATE_NEW')
);
$message_template_all_fields = array();
while ($row = $res->Fetch()) {
	//echo '<pre>'; print_r($row); echo '</pre>';
	$message_template[$row['ID']] = '(ID: '.$row['ID'].') '.$row['SUBJECT'];
	$message_template_all_fields[$row['ID']] = $row;
}

// Текущие связки инфоблок/событие/шаблон
$arIBlockEventMessageTemplate = \Bitrix\Main\Config\Option::get('logicasoft.iblockevent', 'iblock_event_message_template');
$arIBlockEventMessageTemplate = unserialize($arIBlockEventMessageTemplate);
if (empty($arIBlockEventMessageTemplate)) {
	$arIBlockEventMessageTemplate = array();
}
//echo '<pre>'; print_r($arIBlockEventMessageTemplate); echo '</pre>';

$bVarsFromForm = false;
$aTabs = array(
	array(
		'DIV' => 'index',
		'TAB' => GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_TAB_INDEX'),
		'ICON' => 'search_settings',
		'TITLE' => GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_TAB_TITLE'),
		'OPTIONS' => array(
			'iblock' => array(
				GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_IBLOCK'),
				array(
					'select',
					$arIBlocks
				)
			),
			'event' => array(
				GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_EVENT'),
				array(
					'select',
					$arEvents
				)
			),
			'message_template' => array(
				GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_MESSAGE_TEMPLATE'),
				array(
					'select',
					$message_template
				)
			)
		)
	)
);
$tabControl = new CAdminTabControl('tabControl', $aTabs);

if (isset($_REQUEST['get_template_and_macros'])) {
	$GLOBALS['APPLICATION']->RestartBuffer();

	$data = array();

	$oIBlockElementMacros = new CLS\General\CLSIBlockElementMacros();
	$data['macros'] = $oIBlockElementMacros->getMacros((int)$_REQUEST['iblock'], $_REQUEST['block']);

	if (array_key_exists($_REQUEST['tid'], $message_template_all_fields)) {
		$data['message_template'] = array(
			'email_from' => $message_template_all_fields[$_REQUEST['tid']]['EMAIL_FROM'],
			'email_to' => $message_template_all_fields[$_REQUEST['tid']]['EMAIL_TO'],
			'subject' => $message_template_all_fields[$_REQUEST['tid']]['SUBJECT'],
			'message' => $message_template_all_fields[$_REQUEST['tid']]['MESSAGE']
		);
	} else {
		$data['message_template'] = array(
			'email_from' => '',
			'email_to' => '',
			'subject' => '',
			'message' => ''
		);
	}

	echo j