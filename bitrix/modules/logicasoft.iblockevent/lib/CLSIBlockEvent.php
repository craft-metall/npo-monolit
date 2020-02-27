<?php
/**
 * Created by PhpStorm.
 * User: Shein D.E.
 * Date: 19.12.2014
 * Time: 20:31
 */

namespace CLS\General;

use Bitrix\Main\Loader;

class CLSIBlockEvent
{
	const EVENT_ADD = 'OnAfterIBlockElementAdd';
	const EVENT_UPDATE = 'OnAfterIBlockElementUpdate';
	const EVENT_DELETE = 'OnAfterIBlockElementDelete';

	private static $instance;
	private $options = array();
	private $arFields = array();

	private function __construct()
	{
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementUpdate_.txt', date('d.m.Y H:i')."\n__construct:\n\n", FILE_APPEND);
		$this->getOptions();
	}

	public static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function getOptions() {
		$this->options = \Bitrix\Main\Config\Option::get('logicasoft.iblockevent', 'iblock_event_message_template');
		$this->options = unserialize($this->options);
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementUpdate_.txt', date('d.m.Y H:i')."\n$this->options:\n\n".print_r($this->options, true)."\n", FILE_APPEND);
	}

	public function getElementByID($id) {
		if ((int)$id <= 0) {
			return array();
		}

		Loader::includeModule('iblock');

		$res = \CIBlock::GetList(array('SORT' => 'ASC'), array());
		$arIBlockFields = array();
		while ($row = $res->Fetch()) {
			$arIBlockFields[$row['ID']] = $row['NAME'];
		}

		$res = \CIBlockElement::GetList(
			array(),
			array(
				'ID' => (int)$id
			),
			false,
			false,
			array(
				'ID',
				'CODE',
				'XML_ID',
				'NAME',
				'IBLOCK_ID',
				'IBLOCK_CODE',
				'IBLOCK_SECTION_ID',
				'ACTIVE',
				'DATE_ACTIVE_FROM',
				'DATE_ACTIVE_TO',
				'PREVIEW_PICTURE',
				'PREVIEW_TEXT',
				'DETAIL_PICTURE',
				'DETAIL_TEXT',
				'DATE_CREATE',
				'CREATED_BY',
				'CREATED_USER_NAME',
				'TIMESTAMP_X',
				'MODIFIED_BY',
				'USER_NAME',
				'LIST_PAGE_URL',
				'DETAIL_PAGE_URL',
				'SHOW_COUNTER',
				'SHOW_COUNTER_START',
				'WF_COMMENTS',
				'WF_STATUS_ID',
				'LOCK_STATUS',
				'TAGS',
				'PROPERTY_*'
			)
		);
		if ($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();

			$arFields['IBLOCK_NAME'] = $arIBlockFields[$arFields['IBLOCK_ID']];

			$rsUser = \CUser::GetByID($arFields['CREATED_BY']);
			$arUser = $rsUser->Fetch();
			$arFields['CREATED_BY.EMAIL'] = $arUser['EMAIL'];

			$rsUser = \CUser::GetByID($arFields['MODIFIED_BY']);
			$arUser = $rsUser->Fetch();
			$arFields['MODIFIED_BY.EMAIL'] = $arUser['EMAIL'];

			if ((int)$arFields['IBLOCK_SECTION_ID'] > 0) {
				$res = \CIBlockSection::GetByID($arFields['IBLOCK_SECTION_ID']);
				if ($ar_res = $res->GetNext()) {
					$arFields['IBLOCK_SECTION_CODE'] = $ar_res['CODE'];
					$arFields['IBLOCK_SECTION_NAME'] = $ar_res['NAME'];
				} else {
					$arFields['IBLOCK_SECTION_CODE'] = '';
					$arFields['IBLOCK_SECTION_NAME'] = '';
				}
			} else {
				$arFields['IBLOCK_SECTION_CODE'] = '';
				$arFields['IBLOCK_SECTION_NAME'] = '';
			}

			if ((int)$arFields['PREVIEW_PICTURE'] > 0) {
				$arFields['PREVIEW_PICTURE'] = \CFile::GetPath($arFields['PREVIEW_PICTURE']);
			}
			if ((int)$arFields['DETAIL_PICTURE'] > 0) {
				$arFields['DETAIL_PICTURE'] = \CFile::GetPath($arFields['DETAIL_PICTURE']);
			}

			$arFields['PROP'] = $ob->GetProperties();
			foreach ($arFields['PROP'] as $code=>$arr) {
				if ($arr['MULTIPLE'] == 'N' && in_array($arr['PROPERTY_TYPE'], array('S', 'N', 'L')) && in_array($arr['USER_TYPE'], array('', 'DateTime'))) {
					$arFields['PROPERTY_'.$arr['CODE']] = $arr['VALUE'];
				} else if ($arr['MULTIPLE'] == 'N' && $arr['PROPERTY_TYPE'] == 'F') {
					if ((int)$arr['VALUE'] > 0) {
						$rsFile = \CFile::GetByID($arr['VALUE']);
						$arFile = $rsFile->Fetch();

						$arFields['PROPERTY_'.$arr['CODE'].'.SIZE'] = \CFile::FormatSize($arFile['FILE_SIZE']);
						$arFields['PROPERTY_'.$arr['CODE'].'.FILE_NAME'] = $arFile['FILE_NAME'];
						$arFields['PROPERTY_'.$arr['CODE'].'.ORIGINAL_NAME'] = $arFile['ORIGINAL_NAME'];
						$arFields['PROPERTY_'.$arr['CODE'].'.LINK'] = '/'.\Bitrix\Main\Config\Option::get('main', 'upload_dir', 'upload').'/'.$arFile['SUBDIR'].'/'.$arFile['FILE_NAME'];
					} else {
						$arFields['PROPERTY_'.$arr['CODE'].'.SIZE'] = '';
						$arFields['PROPERTY_'.$arr['CODE'].'.FILE_NAME'] = '';
						$arFields['PROPERTY_'.$arr['CODE'].'.ORIGINAL_NAME'] = '';
						$arFields['PROPERTY_'.$arr['CODE'].'.LINK'] = '';
					}
				} else if ($arr['MULTIPLE'] == 'N' && in_array($arr['PROPERTY_TYPE'], array('E', 'G'))) {
					if (in_array($arr['PROPERTY_TYPE'], array('E')) && (int)$arr['VALUE'] > 0) {
						$res = \CIBlockElement::GetList(
							array(),
							array(
								'ID' => (int)$arr['VALUE']
							),
							false,
							false,
							array(
								'ID',
								'IBLOCK_ID',
								'CODE',
								'XML_ID',
								'NAME',
								'CREATED_BY',
								'CREATED_USER_NAME',
								'MODIFIED_BY',
								'USER_NAME',
								'PROPERTY_*'
							)
						);
						if ($ob = $res->GetNextElement()) {
						//if ($row = $res->Fetch()) {
							$row = $ob->GetFields();
							//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\n ID: ".(int)$arr['VALUE']." row:\n\n".print_r($row, true)."\n", FILE_APPEND);

							$rsUser = \CUser::GetByID($row['CREATED_BY']);
							$arUser = $rsUser->Fetch();
							$arFields['PROPERTY_'.$arr['CODE'].'.CREATED_BY.EMAIL'] = $arUser['EMAIL'];

							$rsUser = \CUser::GetByID($row['MODIFIED_BY']);
							$arUser = $rsUser->Fetch();
							$arFields['PROPERTY_'.$arr['CODE'].'.MODIFIED_BY.EMAIL'] = $arUser['EMAIL'];

							$arFields['PROPERTY_'.$arr['CODE'].'.ID'] = $row['ID'];
							$arFields['PROPERTY_'.$arr['CODE'].'.CODE'] = $row['CODE'];
							$arFields['PROPERTY_'.$arr['CODE'].'.NAME'] = $row['NAME'];
							$arFields['PROPERTY_'.$arr['CODE'].'.CREATED_BY'] = $row['CREATED_BY'];
							$arFields['PROPERTY_'.$arr['CODE'].'.CREATED_USER_NAME'] = $row['CREATED_USER_NAME'];
							$arFields['PROPERTY_'.$arr['CODE'].'.MODIFIED_BY'] = $row['MODIFIED_BY'];
							$arFields['PROPERTY_'.$arr['CODE'].'.USER_NAME'] = $row['USER_NAME'];

							$subprops = $ob->GetProperties();
							//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\n ID: ".(int)$arr['VALUE']." props:\n\n".print_r($props, true)."\n", FILE_APPEND);
							foreach ($subprops as $subprop) {
								if ($subprop['MULTIPLE'] == 'N' && in_array($subprop['PROPERTY_TYPE'], array('S', 'N', 'L')) && in_array($subprop['USER_TYPE'], array('', 'DateTime'))) {
									$arFields['PROPERTY_'.$arr['CODE'].'.PROPERTY_'.$subprop['CODE']] = $subprop['VALUE'];
								}
							}
						} else {
							$arFields['PROPERTY_'.$arr['CODE'].'.ID'] = '';
							$arFields['PROPERTY_'.$arr['CODE'].'.CODE'] = '';
							$arFields['PROPERTY_'.$arr['CODE'].'.NAME'] = '';
						}
					} else if (in_array($arr['PROPERTY_TYPE'], array('G')) && (int)$arr['VALUE'] > 0) {
						$res = \CIBlockSection::GetByID((int)$arr['VALUE']);
						if ($row = $res->Fetch()) {
							$arFields['PROPERTY_'.$arr['CODE'].'.ID'] = $row['ID'];
							$arFields['PROPERTY_'.$arr['CODE'].'.CODE'] = $row['CODE'];
							$arFields['PROPERTY_'.$arr['CODE'].'.NAME'] = $row['NAME'];
						} else {
							$arFields['PROPERTY_'.$arr['CODE'].'.ID'] = '';
							$arFields['PROPERTY_'.$arr['CODE'].'.CODE'] = '';
							$arFields['PROPERTY_'.$arr['CODE'].'.NAME'] = '';
						}
					} else {
						$arFields['PROPERTY_'.$arr['CODE'].'.ID'] = '';
						$arFields['PROPERTY_'.$arr['CODE'].'.CODE'] = '';
						$arFields['PROPERTY_'.$arr['CODE'].'.NAME'] = '';
					}
				} else if ($arr['MULTIPLE'] == 'Y' && in_array($arr['PROPERTY_TYPE'], array('E'))) {
					//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\n arr:\n\n".print_r($arr, true)."\n", FILE_APPEND);
					$res = \CIBlockElement::GetList(
						array(),
						array(
							'ID' => $arr['VALUE']
						),
						false,
						false,
						array(
							'ID',
							'CODE',
							'XML_ID',
							'NAME',
							'CREATED_BY',
							'CREATED_USER_NAME',
							'MODIFIED_BY',
							'USER_NAME'
						)
					);
					$arID = array();
					$arNAME = array();
					$arCODE = array();
					$arXMLID = array();
					while ($row = $res->Fetch()) {
						$arID[] = $row['ID'];
						$arNAME[] = $row['NAME'];
						$arCODE[] = $row['CODE'];
						$arXMLID[] = $row['XML_ID'];
					}
					$arSeparator = array(', ', ' / ', '; ', ' ');
					foreach ($arSeparator as $separator) {
						$arFields['PROPERTY_'.$arr['CODE'].'.ID('.trim($separator).')'] = implode($separator, $arID);
						$arFields['PROPERTY_'.$arr['CODE'].'.NAME('.trim($separator).')'] = implode($separator, $arNAME);
						$arFields['PROPERTY_'.$arr['CODE'].'.CODE('.trim($separator).')'] = implode($separator, $arCODE);
						$arFields['PROPERTY_'.$arr['CODE'].'.XML_ID('.trim($separator).')'] = implode($separator, $arXMLID);
					}

					//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\n arFields:\n\n".print_r($arFields, true)."\n", FILE_APPEND);
				}
			}

			$arFields['CLIENT_IP'] = $_SERVER['REMOTE_ADDR'];
			$arFields['CLIENT_BROWSER'] = $_SERVER['HTTP_USER_AGENT'];
			$arFields['PAGE_URL'] = $_SERVER['REQUEST_URI'];

			return $arFields;
		} else {
			return array();
		}
	}

	public function onAfterIBlockElementAdd(&$arFields) {
		$iblockevent = self::getInstance();
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\narFields:\n\n".print_r($arFields, true)."\n", FILE_APPEND);
		if ($arFields['ID'] > 0) {
			$key = CLSIBlockEvent::EVENT_ADD.'_'.$arFields['IBLOCK_ID'];
			//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\n key:\n\n".print_r($key, true)."\n", FILE_APPEND);
			if (array_key_exists($key, $iblockevent->options)) {
				IncludeModuleLangFile(__FILE__);

				$arEventFields = $iblockevent->getElementByID($arFields['ID']);
				$arEventFields['EVENT_NAME'] = GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_EVENT_ADD');

				//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementAdd_.txt', date('d.m.Y H:i')."\ngetElementByID arEventFields:\n\n".print_r($arEventFields, true)."\n", FILE_APPEND);
				$templates = is_array($iblockevent->options[$key]) ? $iblockevent->options[$key] : array($iblockevent->options[$key]);
				foreach ($templates as $tid) {
					\CEvent::Send('LOGICASOFT_IBLOCKEVENT', 's1', $arEventFields, 'Y', $tid);
				}
			}
		}
	}

	public function onAfterIBlockElementUpdate($arFields) {
		$iblockevent = self::getInstance();
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementUpdate_.txt', date('d.m.Y H:i')."\narFields:\n\n".print_r($arFields, true)."\n", FILE_APPEND);
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementUpdate_.txt', date('d.m.Y H:i')."\nOptions:\n\n".print_r($iblockevent->options, true)."\n", FILE_APPEND);
		if ($arFields['RESULT']) {
			$key = CLSIBlockEvent::EVENT_UPDATE.'_'.$arFields['IBLOCK_ID'];
			//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementUpdate_.txt', date('d.m.Y H:i')."\n key:\n\n".print_r($key, true)."\n", FILE_APPEND);
			if (array_key_exists($key, $iblockevent->options)) {
				IncludeModuleLangFile(__FILE__);

				$arEventFields = $iblockevent->getElementByID($arFields['ID']);
				$arEventFields['EVENT_NAME'] = GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_EVENT_UPDATE');

				//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementUpdate_.txt', date('d.m.Y H:i')."\ngetElementByID arEventFields:\n\n".print_r($arEventFields, true)."\n", FILE_APPEND);
				$templates = is_array($iblockevent->options[$key]) ? $iblockevent->options[$key] : array($iblockevent->options[$key]);
				foreach ($templates as $tid) {
					\CEvent::Send('LOGICASOFT_IBLOCKEVENT', 's1', $arEventFields, 'Y', $tid);
				}
			}
		}
	}

	public function onBeforeIBlockElementDelete($ID) {
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onBeforeIBlockElementDelete ID:\n\n".print_r($ID, true)."\n", FILE_APPEND);

		$iblockevent = self::getInstance();

		Loader::includeModule('iblock');
		$res = \CIBlockElement::GetByID($ID);
		$arFields = $res->Fetch();

		$key = CLSIBlockEvent::EVENT_DELETE.'_'.$arFields['IBLOCK_ID'];
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onBeforeIBlockElementDelete key:\n\n".print_r($key, true)."\n", FILE_APPEND);
		if (array_key_exists($key, $iblockevent->options)) {
			$iblockevent->arFields[$arFields['ID']] = $iblockevent->getElementByID($arFields['ID']);
			//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onBeforeIBlockElementDelete getElementByID arEventFields:\n\n".print_r($iblockevent->arFields[$arFields['ID']], true)."\n", FILE_APPEND);
		}
	}

	public function onAfterIBlockElementDelete($arFields) {
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onAfterIBlockElementDelete arFields:\n\n".print_r($arFields, true)."\n", FILE_APPEND);

		$iblockevent = self::getInstance();
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onAfterIBlockElementDelete iblockevent:\n\n".print_r($iblockevent, true)."\n", FILE_APPEND);

		$key = CLSIBlockEvent::EVENT_DELETE.'_'.$arFields['IBLOCK_ID'];
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onAfterIBlockElementDelete key:\n\n".print_r($key, true)."\n", FILE_APPEND);
		if (array_key_exists($key, $iblockevent->options)) {
			IncludeModuleLangFile(__FILE__);

			$arEventFields = $iblockevent->arFields[$arFields['ID']];
			$arEventFields['EVENT_NAME'] = GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_EVENT_DELETE');

			//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/onAfterIBlockElementDelete_.txt', date('d.m.Y H:i')."\n onAfterIBlockElementDelete getElementByID arEventFields:\n\n".print_r($arEventFields, true)."\n", FILE_APPEND);
			$templates = is_array($iblockevent->options[$key]) ? $iblockevent->options[$key] : array($iblockevent->options[$key]);
			foreach ($templates as $tid) {
				\CEvent::Send('LOGICASOFT_IBLOCKEVENT', 's1', $arEventFields, 'Y', $tid);
			}
		}
	}
} 