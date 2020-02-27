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

	echo json_encode($data);

	exit();
}

if ($REQUEST_METHOD == 'POST' && strlen($Update . $Apply . $RestoreDefaults) > 0 && check_bitrix_sessid()) {
	//echo '<pre>'; print_r($_POST); echo '</pre>';
	//exit();

	IncludeModuleLangFile($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/logicasoft.iblockevent/install/index.php', LANGUAGE_ID);

	if (isset($_REQUEST['iblock'])) {
		$arIBlockEventMessageTemplateTmp = array();

		foreach ($_REQUEST['iblock'] as $key=>$iblock) {
			if ((int)$iblock > 0) {
				if (isset($_REQUEST['delete_iblock_event_message_template'][$key]) && $_REQUEST['delete_iblock_event_message_template'][$key] == 'Y') {
					continue;
				}

				$message = new CEventMessage;
				if ((int)$_REQUEST['message_template'][$key] == 0) {
					$arFieldsMessage = array(
						'EVENT_NAME' => 'LOGICASOFT_IBLOCKEVENT',
						'LID' => 's1',
						'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
						'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
						'SUBJECT' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_NAME'),
						'MESSAGE' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_DESC')
					);

					if (isset($_REQUEST['message_template_email_from']) && strlen(trim($_REQUEST['message_template_email_from'][$key]))) {
						$arFieldsMessage['EMAIL_FROM'] = $_REQUEST['message_template_email_from'][$key];
					}

					if (isset($_REQUEST['message_template_email_to']) && strlen(trim($_REQUEST['message_template_email_to'][$key]))) {
						$arFieldsMessage['EMAIL_TO'] = $_REQUEST['message_template_email_to'][$key];
					}

					if (isset($_REQUEST['message_template_theme']) && strlen(trim($_REQUEST['message_template_theme'][$key])) && strlen(trim($_REQUEST['message_template_text'][$key]))) {
						$arFieldsMessage['SUBJECT'] = $_REQUEST['message_template_theme'][$key];
						$arFieldsMessage['MESSAGE'] = $_REQUEST['message_template_text'][$key];
					}
					//echo '<pre>'; print_r($arFieldsMessage); echo '</pre>';
					if (!($mtid = $message->Add($arFieldsMessage))) {
						//echo $message->LAST_ERROR;
						//exit();
					}
					//exit();
				} else {
					$mtid = $_REQUEST['message_template'][$key];

					if (isset($_REQUEST['message_template_theme']) && strlen(trim($_REQUEST['message_template_theme'][$key])) && strlen(trim($_REQUEST['message_template_text'][$key]))) {
						$arFieldsMessage = array();

						if (isset($_REQUEST['message_template_email_from']) && strlen(trim($_REQUEST['message_template_email_from'][$key]))) {
							$arFieldsMessage['EMAIL_FROM'] = $_REQUEST['message_template_email_from'][$key];
						}

						if (isset($_REQUEST['message_template_email_to']) && strlen(trim($_REQUEST['message_template_email_to'][$key]))) {
							$arFieldsMessage['EMAIL_TO'] = $_REQUEST['message_template_email_to'][$key];
						}

						$arFieldsMessage['SUBJECT'] = $_REQUEST['message_template_theme'][$key];
						$arFieldsMessage['MESSAGE'] = $_REQUEST['message_template_text'][$key];

						$message->Update($mtid, $arFieldsMessage);
					}
				}

				if (!in_array($mtid, $arIBlockEventMessageTemplateTmp[$_REQUEST['event'][$key].'_'.$iblock])) {
					$arIBlockEventMessageTemplateTmp[$_REQUEST['event'][$key].'_'.$iblock][] = $mtid;
				}
			}
		}
		//echo '<pre>'; print_r($arIBlockEventMessageTemplateTmp); echo '</pre>';
		//exit();
		\Bitrix\Main\Config\Option::set('logicasoft.iblockevent', 'iblock_event_message_template', serialize($arIBlockEventMessageTemplateTmp));
	}

	if (strlen($Update) > 0 && strlen($_REQUEST['back_url_settings']) > 0) {
		LocalRedirect($_REQUEST['back_url_settings']);
	} else {
		LocalRedirect($APPLICATION->GetCurPage() . '?mid=' . urlencode($mid) . '&lang=' . urlencode(LANGUAGE_ID) . '&back_url_settings=' . urlencode($_REQUEST['back_url_settings']) . '&' . $tabControl->ActiveTabParam());
	}
}

if (is_object($message)) {
	echo $message->Show();
}


$tabControl->Begin();
?>
<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?=LANGUAGE_ID?>" id="options">
	<?
	foreach($aTabs as $aTab):
		$tabControl->BeginNextTab();
		?>
		<tr>
			<td><b><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_TABLE_HEAD_N');?></b></td>
			<?php foreach($aTab['OPTIONS'] as $name => $arOption):?>
				<td><b><?echo $arOption[0]?></b></td>
			<?php endforeach;?>
			<td><b><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_TABLE_HEAD_EDIT_TEMPLATE');?></b></td>
			<td><b><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_TABLE_HEAD_DELETE_TEMPLATE');?></b></td>
		</tr>
		<?php
		$num = 1;
		foreach ($arIBlockEventMessageTemplate as $key=>$arTemplates):
			$arTemplates = !is_array($arTemplates) ? array($arTemplates) : $arTemplates;
			foreach ($arTemplates as $template_id):
				$ar = explode('_', $key);
				$arValue = array(
					'iblock' => $ar[1],
					'event' => $ar[0],
					'message_template' => $template_id
				);
			?>
			<tr>
				<td><?php echo $num;?></td>
				<?
				foreach($aTab['OPTIONS'] as $name => $arOption):
					if ($bVarsFromForm) {
						$val = $_POST[$name];
					} else {
						$val = $arValue[$name];
					}
					$type = $arOption[1];
					?>
					<td>
						<?php if ($name == 'iblock'):?>
							<select name="<?echo htmlspecialcharsbx($name)?>[<?php echo $num;?>]" id="<?echo htmlspecialcharsbx($name)?>_num_<?php echo $num;?>" onchange="cls_show_message_template(<?php echo $num;?>, false);">
								<?foreach($type[1] as $_key => $arr):?>
									<optgroup label="<?php echo $arr['NAME'];?>" id="<?php echo $_key;?>">
										<?php foreach ($arr['IBLOCKS'] as $iblockId=>$iblockName):?>
											<option value="<?echo htmlspecialcharsbx($iblockId)?>" <?if ($val == $iblockId) echo 'selected="selected"'?>><?echo htmlspecialcharsEx($iblockName)?></option>
										<?endforeach?>
									</optgroup>
								<?endforeach?>
							</select>
						<?php else:?>
							<select name="<?echo htmlspecialcharsbx($name)?>[<?php echo $num;?>]" id="<?echo htmlspecialcharsbx($name)?>_num_<?php echo $num;?>" onchange="cls_show_message_template(<?php echo $num;?>, false);">
								<?foreach($type[1] as $_key => $value):?>
									<option value="<?echo htmlspecialcharsbx($_key)?>" <?if ($val == $_key) echo 'selected="selected"'?>><?echo htmlspecialcharsEx($value)?></option>
								<?endforeach?>
							</select>
						<?php endif;?>
					</td>
				<?php endforeach;?>
				<td><input type="button" name="show_message_template_<?php echo $num;?>" class="cls_show_message_template" value="..." data-num="<?php echo $num;?>" onclick="cls_show_message_template(<?php echo $num;?>, true);" /></td>
				<td><input type="checkbox" name="delete_iblock_event_message_template[<?php echo $num;?>]" value="Y" /></td>
			</tr>
			<tr>
				<td id="cls_message_template_<?php echo $num;?>" colspan="6" class="cls_message_template">
					<table>
						<tr>
							<td><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_TEMPLATE_EMAIL_FROM');?></td>
							<td><input type="text" name="message_template_email_from[<?php echo $num;?>]" id="message_template_email_from_<?php echo $num;?>" value=""  /></td>
						</tr>
						<tr>
							<td><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_TEMPLATE_EMAIL_TO');?></td>
							<td><input type="text" name="message_template_email_to[<?php echo $num;?>]" id="message_template_email_to_<?php echo $num;?>" value=""  /></td>
						</tr>
						<tr>
							<td><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_TEMPLATE_THEME');?></td>
							<td><input type="text" name="message_template_theme[<?php echo $num;?>]" id="message_template_theme_<?php echo $num;?>" value=""  /></td>
						</tr>
					</table>
					<textarea name="message_template_text[<?php echo $num;?>]" id="message_template_text_<?php echo $num;?>" class="cls_message_template_text"></textarea><br />
					<b><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_TEMPLATE_INSERT_MACROS');?></b> <input type="button" class="cls_menu_message_template" value="..." id="menu_message_template_<?php echo $num;?>" />
				</td>
			</tr>
		<?php
			$num++;
		endforeach;
	endforeach;
	?>
	<tr>
		<td><?php echo $num;?></td>
		<?
		foreach($aTab['OPTIONS'] as $name => $arOption):
			if ($bVarsFromForm) {
				$val = $_POST[$name];
			} else {
				$val = $arValue[$name];
			}
			$type = $arOption[1];
			?>
			<td>
				<?php if ($name == 'iblock'):?>
					<select name="<?echo htmlspecialcharsbx($name)?>[<?php echo $num;?>]">
						<option value="0"><?php echo GetMessage('LOGICASOFT_IBLOCKEVENT_OPTIONS_IBLOCK_SELECT');?></option>
						<?foreach($type[1] as $key => $arr):?>
							<optgroup label="<?php echo $arr['NAME'];?>" id="<?php echo $key;?>">
								<?php foreach ($arr['IBLOCKS'] as $iblockId=>$iblockName):?>
									<option value="<?echo htmlspecialcharsbx($iblockId)?>"><?echo htmlspecialcharsEx($iblockName)?></option>
								<?endforeach?>
							</optgroup>
						<?endforeach?>
					</select>
				<?php else:?>
					<select name="<?echo htmlspecialcharsbx($name)?>[<?php echo $num;?>]">
						<?foreach($type[1] as $key => $value):?>
							<option value="<?echo htmlspecialcharsbx($key)?>"><?echo htmlspecialcharsEx($value)?></option>
						<?endforeach?>
					</select>
				<?php endif;?>
			</td>
		<?php endforeach;?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php endforeach;?>

	<?$tabControl->Buttons();?>
	<input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>" class="adm-btn-save">
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
		<input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
		<input type="hidden" name="back_url_settings" value="<?=htmlspecialcharsbx($_REQUEST["back_url_settings"])?>">
	<?endif?>
	<!--<input type="submit" name="RestoreDefaults" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="return confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">//-->
	<?=bitrix_sessid_post();?>
	<?$tabControl->End();?>
</form>
<script>
BX.ready(function(){
	BX.addClass('index_edit_table', 'internal');
});

function cls_show_message_template(num, show) {
	var block = 'cls_message_template_' + num;
	var iblock_id = BX('iblock_num_' + num).value;
	var tid = BX('message_template_num_' + num).value;

	BX.ajax.loadJSON(location.href, 'get_template_and_macros=Y&iblock=' + iblock_id + '&block=message_template_text_' + num + '&tid=' + tid, BX.proxy(function(res){
		//console.log(res);
		//console.log(res['message_template']['message']);
		//console.log(BX('menu_message_template_' + num));

		BX('message_template_email_from_' + this.num).value = res['message_template']['email_from'];
		BX('message_template_email_to_' + this.num).value = res['message_template']['email_to'];
		BX('message_template_theme_' + this.num).value = res['message_template']['subject'];
		BX('message_template_text_' + this.num).value = res['message_template']['message'];
		if (this.show) {
			BX('cls_message_template_' + this.num).style.display = 'table-cell';
		}

		BX.unbind(BX('menu_message_template_' + this.num), 'click');
		if (typeof BX('menu_message_template_' + this.num).OPENER != 'undefined') {
			//console.log(res.macros);
			BX('menu_message_template_' + this.num).OPENER.SetMenu(res.macros);
		}
		BX.bind(BX('menu_message_template_' + this.num), 'click', BX.proxy(function() {
			//console.log(this);
			BX.adminShowMenu(this.block, this.res, '');
		}, {block: BX('menu_message_template_' + this.num), res: res.macros}));
	}, {num: num, show: show}));
}

function setMacroTextarea(block, macro) {
	//console.log(block);
	//console.log(macro);
	insert_text_cursor(block, macro);
}

function doShowAndHide()
{
	var form = BX('options');
	var selects = BX.findChildren(form, {tag: 'select'}, true);
	for (var i = 0; i < selects.length; i++)
	{
		var selectedValue = selects[i].value;
		var trs = BX.findChildren(form, {tag: 'tr'}, true);
		for (var j = 0; j < trs.length; j++)
		{
			if (/show-for-/.test(trs[j].className))
			{
				if (trs[j].className.indexOf(selectedValue) >= 