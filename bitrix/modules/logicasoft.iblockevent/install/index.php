<?php
IncludeModuleLangFile(__FILE__);

Class logicasoft_iblockevent extends CModule
{
	const MODULE_ID = 'logicasoft.iblockevent';
	var $MODULE_ID = 'logicasoft.iblockevent';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $strError = '';

	function __construct()
	{
		$arModuleVersion = array();
		include(dirname(__FILE__) . "/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = GetMessage("logicasoft.iblockevent_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("logicasoft.iblockevent_MODULE_DESC");

		$this->PARTNER_NAME = GetMessage("logicasoft.iblockevent_PARTNER_NAME");
		$this->PARTNER_URI = GetMessage("logicasoft.iblockevent_PARTNER_URI");
	}

	function InstallDB($arParams = array())
	{
		RegisterModuleDependences('iblock', 'OnAfterIBlockElementAdd', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onAfterIBlockElementAdd');
		RegisterModuleDependences('iblock', 'OnAfterIBlockElementUpdate', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onAfterIBlockElementUpdate');
		RegisterModuleDependences('iblock', 'OnBeforeIBlockElementDelete', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onBeforeIBlockElementDelete');
		RegisterModuleDependences('iblock', 'OnAfterIBlockElementDelete', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onAfterIBlockElementDelete');

		return true;
	}

	function UnInstallDB($arParams = array())
	{
		UnRegisterModuleDependences('iblock', 'OnAfterIBlockElementAdd', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onAfterIBlockElementAdd');
		UnRegisterModuleDependences('iblock', 'OnAfterIBlockElementUpdate', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onAfterIBlockElementUpdate');
		UnRegisterModuleDependences('iblock', 'OnBeforeIBlockElementDelete', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onBeforeIBlockElementDelete');
		UnRegisterModuleDependences('iblock', 'OnAfterIBlockElementDelete', self::MODULE_ID, 'CLS\General\CLSIBlockEvent', 'onAfterIBlockElementDelete');

		return true;
	}

	function InstallEvents()
	{
		$arEventTypes = array();
		$langs = CLanguage::GetList($b='', $o='');
		while ($language = $langs->Fetch()) {
			$lid = $language['LID'];
			IncludeModuleLangFile(__FILE__, $lid);

			$arEventTypes[] = array(
				'LID' => $lid,
				'EVENT_NAME' => 'LOGICASOFT_IBLOCKEVENT',
				'NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_TYPE_NAME'),
				'DESCRIPTION' => GetMessage('LOGICASOFT_IBLOCKEVENT_TYPE_DESC'),
				'SORT' => 10
			);
		}

		$type = new CEventType;
		foreach ($arEventTypes as $arEventType) {
			$type->Add($arEventType);
		}

		IncludeModuleLangFile(__FILE__, LANGUAGE_ID);

		$arMessages = array();
		$arMessages[] = array(
			'EVENT_NAME' => 'LOGICASOFT_IBLOCKEVENT',
			'LID' => 's1',
			'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
			'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
			'SUBJECT' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_NAME'),
			'MESSAGE' => GetMessage('LOGICASOFT_IBLOCKEVENT_EVENT_DESC')
		);

		$message = new CEventMessage;
		foreach ($arMessages as $arMessage) {
			$message->Add($arMessage);
		}

		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles($arParams = array())
	{
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . self::MODULE_ID . '/admin')) {
			if ($dir = opendir($p)) {
				while (false !== $item = readdir($dir)) {
					if ($item == '..' || $item == '.' || $item == 'menu.php') {
						continue;
					}
					file_put_contents($file = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/' . self::MODULE_ID . '_' . $item, '<' . '? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/' . self::MODULE_ID . '/admin/' . $item . '");?' . '>');
				}
				closedir($dir);
			}
		}
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . self::MODULE_ID . '/install/components')) {
			if ($dir = opendir($p)) {
				while (false !== $item = readdir($dir)) {
					if ($item == '..' || $item == '.') {
						continue;
					}
					CopyDirFiles($p . '/' . $item, $_SERVER['DOCUMENT_ROOT'] . '/bitrix/components/' . $item, $ReWrite = True, $Recursive = True);
				}
				closedir($dir);
			}
		}

		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.self::MODULE_ID.'/install/js', $_SERVER['DOCUMENT_ROOT'].'/bitrix/js', true, true);

		return true;
	}

	function UnInstallFiles()
	{
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . self::MODULE_ID . '/admin')) {
			if ($dir = opendir($p)) {
				while (false !== $item = readdir($dir)) {
					if ($item == '..' || $item == '.') {
						continue;
					}
					unlink($_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/' . self::MODULE_ID . '_' . $item);
				}
				closedir($dir);
			}
		}
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . self::MODULE_ID . '/install/components')) {
			if ($dir = opendir($p)) {
				while (false !== $item = readdir($dir)) {
					if ($item == '..' || $item == '.' || !is_dir($p0 = $p . '/' . $item)) {
						continue;
					}

					$dir0 = opendir($p0);
					while (false !== $item0 = readdir($dir0)) {
						if ($item0 == '..' || $item0 == '.') {
							continue;
						}
						DeleteDirFilesEx('/bitrix/components/' . $item . '/' . $item0);
					}
					closedir($dir0);
				}
				closedir($dir);
			}
		}

		DeleteDirFilesEx('/bitrix/js/'.self::MODULE_ID.'/');

		return true;
	}

	function DoInstall()
	{
		global $APPLICATION;
		$this->InstallFiles();
		$this->InstallDB();
		$this->InstallEvents();
		RegisterModule(self::MODULE_ID);
	}

	function DoUninstall()
	{
		global $APPLICATION;
		UnRegisterModule(self::MODULE_ID);
		$this->UnInstallEvents(); 
		$this->UnInstallDB();
		$this->UnInstallFiles();
	}
}