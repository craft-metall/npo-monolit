<?php
/**
 * Created by PhpStorm.
 * User: Shein D.E.
 * Date: 07.01.2015
 * Time: 03:18
 */

namespace CLS\General;

use Bitrix\Main\Loader;

class CLSIBlockElementMacros
{
	public function __construct() {

	}

	public function getMacros($iblock_id=0, $block='') {
		IncludeModuleLangFile(__FILE__);

		$arMacros = array(
			'ELEMENT_FIELDS' => array(
				'TEXT' => GetMessage('MACROS_ELEMENT_FIELDS_TEXT'),
				'MENU' => array()//$this->getElementFields()
			),
			'ELEMENT_PROPERTIES' => array(
				'TEXT' => GetMessage('MACROS_ELEMENT_PROPERTIES_TEXT'),
				'MENU' => array()//$this->getElementProperties()
			),
			'SECTION_FIELDS' => array(
				'TEXT' => GetMessage('MACROS_SECTION_FIELDS_TEXT'),
				'MENU' => array()//$this->getSectionFields()
			),
			'IBLOCK_FIELDS' => array(
				'TEXT' => GetMessage('MACROS_IBLOCK_FIELDS_TEXT'),
				'MENU' => array()//$this->getIBlockFields()
			),
			'ADDITIONAL_FIELDS' => array(
				'TEXT' => GetMessage('MACROS_ADDITIONAL_FIELDS_TEXT'),
				'MENU' => array()//$this->getAdditionalFields()
			)
		);

		foreach ($this->getElementFields() as $key=>$name) {
			$arMacros['ELEMENT_FIELDS']['MENU'][] = array(
				'TEXT' => $name,
				'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#'.$key.'#\');'
			);
		}

		foreach ($this->getElementProperties($iblock_id, $block) as $key=>$name) {
			if (is_array($name)) {
				$arMacros['ELEMENT_PROPERTIES']['MENU'][] = $name;
			} else {
				$arMacros['ELEMENT_PROPERTIES']['MENU'][] = array(
					'TEXT' => $name,
					'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#'.$key.'#\');'
				);
			}
		}

		foreach ($this->getSectionFields() as $key=>$name) {
			$arMacros['SECTION_FIELDS']['MENU'][] = array(
				'TEXT' => $name,
				'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#'.$key.'#\');'
			);
		}

		foreach ($this->getIBlockFields() as $key=>$name) {
			$arMacros['IBLOCK_FIELDS']['MENU'][] = array(
				'TEXT' => $name,
				'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#'.$key.'#\');'
			);
		}

		foreach ($this->getAdditionalFields() as $key=>$name) {
			$arMacros['ADDITIONAL_FIELDS']['MENU'][] = array(
				'TEXT' => $name,
				'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#'.$key.'#\');'
			);
		}

		$ar = array();
		foreach ($arMacros as $arr) {
			$ar[] = $arr;
		}
		$arMacros = $ar;

		return $arMacros;
	}

	public function getAdditionalFields() {
		IncludeModuleLangFile(__FILE__);

		return array(
			'DEFAULT_EMAIL_FROM' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_DEFAULT_EMAIL_FROM'),
			'SITE_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_SITE_NAME'),
			'SERVER_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_SERVER_NAME'),
			'CLIENT_IP' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_CLIENT_IP'),
			'CLIENT_BROWSER' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_CLIENT_BROWSER'),
			'PAGE_URL' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PAGE_URL'),
		);
	}

	public function getElementFields() {
		IncludeModuleLangFile(__FILE__);

		return array(
			'EVENT_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_EVENT_NAME'),
			'ID' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_ID'),
			'CODE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_CODE'),
			'XML_ID' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_XML_ID'),
			'NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_NAME'),
			'ACTIVE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_ACTIVE'),
			'DATE_ACTIVE_FROM' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_DATE_ACTIVE_FROM'),
			'DATE_ACTIVE_TO' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_DATE_ACTIVE_TO'),
			'PREVIEW_PICTURE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_PREVIEW_PICTURE'),
			'PREVIEW_TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_PREVIEW_TEXT'),
			'DETAIL_PICTURE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_DETAIL_PICTURE'),
			'DETAIL_TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_DETAIL_TEXT'),
			'DATE_CREATE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_DATE_CREATE'),
			'CREATED_BY' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_CREATED_BY'),
			'CREATED_BY.EMAIL' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_CREATED_BY_EMAIL'),
			'CREATED_USER_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_CREATED_USER_NAME'),
			'TIMESTAMP_X' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_TIMESTAMP_X'),
			'MODIFIED_BY' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_MODIFIED_BY'),
			'MODIFIED_BY.EMAIL' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_MODIFIED_BY_EMAIL'),
			'USER_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_USER_NAME'),
			'LIST_PAGE_URL' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_LIST_PAGE_URL'),
			'DETAIL_PAGE_URL' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_DETAIL_PAGE_URL'),
			'SHOW_COUNTER' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_SHOW_COUNTER'),
			'SHOW_COUNTER_START' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_SHOW_COUNTER_START'),
			'WF_COMMENTS' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_WF_COMMENTS'),
			'WF_STATUS_ID' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_WF_STATUS_ID'),
			'LOCK_STATUS' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_LOCK_STATUS'),
			'TAGS' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_TAGS')
		);
	}

	public function getElementProperties($iblock_id, $block) {
		if ((int)$iblock_id <= 0) {
			return array();
		}

		IncludeModuleLangFile(__FILE__);
		Loader::includeModule('iblock');

		$res = \CIBlockProperty::GetList(array('name'=>'asc'), array('ACTIVE'=>'Y', 'IBLOCK_ID'=>$iblock_id));
		$arElementPropertiesMacros = array();
		while ($row = $res->Fetch()) {
			//echo '<pre>'; print_r($row); echo '</pre>';
			if ($row['MULTIPLE'] == 'N' && in_array($row['PROPERTY_TYPE'], array('S', 'N', 'L')) && in_array($row['USER_TYPE'], array('', 'DateTime'))) {
				$arElementPropertiesMacros['PROPERTY_'.$row['CODE']] = $row['NAME'];
			} else if ($row['MULTIPLE'] == 'N' && $row['PROPERTY_TYPE'] == 'F') {
				$arElementPropertiesMacros['PROPERTY_'.$row['CODE']] = array(
					'TEXT' => $row['NAME'],
					'MENU' => array(
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_FILE_SIZE'),
							'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#PROPERTY_'.$row['CODE'].'.SIZE#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_FILE_NAME'),
							'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#PROPERTY_'.$row['CODE'].'.FILE_NAME#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_FILE_ORIGINAL_NAME'),
							'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#PROPERTY_'.$row['CODE'].'.ORIGINAL_NAME#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_FILE_LINK'),
							'ONCLICK' => 'setMacroTextarea(\''.$block.'\', \'#PROPERTY_'.$row['CODE'].'.LINK#\');'
						)
					)
				);
			} else if ($row['MULTIPLE'] == 'N' && in_array($row['PROPERTY_TYPE'], array('E', 'G'))) {
				$arElementPropertiesMacros['PROPERTY_' . $row['CODE']] = array(
					'TEXT' => $row['NAME'],
					'MENU' => array(
						array(
							'TEXT' => 'ID',
							'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.ID#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_CODE'),
							'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.CODE#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_NAME'),
							'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.NAME#\');'
						)
					)
				);

				if (in_array($row['PROPERTY_TYPE'], array('E'))) {
					$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
						'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_CREATED_BY'),
						'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.CREATED_BY#\');'
					);
					$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
						'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_CREATED_USER_NAME'),
						'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.CREATED_USER_NAME#\');'
					);
					$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
						'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_CREATED_BY_EMAIL'),
						'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.CREATED_BY.EMAIL#\');'
					);
					$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
						'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_MODIFIED_BY'),
						'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.MODIFIED_BY#\');'
					);
					$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
						'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_USER_NAME'),
						'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.USER_NAME#\');'
					);
					$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
						'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_MODIFIED_BY_EMAIL'),
						'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.MODIFIED_BY.EMAIL#\');'
					);

					$res_subproperty = \CIBlockProperty::GetList(array('name'=>'asc'), array('ACTIVE'=>'Y', 'IBLOCK_ID'=>$row['LINK_IBLOCK_ID']));
					$subproperties = array();
					while ($row_subproperty = $res_subproperty->Fetch()) {
						//echo '<pre>'; print_r($row_subproperty); echo '</pre>';

						$subproperties[] = $row_subproperty;
					}

					if (!empty($subproperties)) {
						$subprops = array();
						foreach ($subproperties as $row_subproperty) {
							if ($row_subproperty['MULTIPLE'] == 'N' && in_array($row_subproperty['PROPERTY_TYPE'], array('S', 'N', 'L')) && in_array($row_subproperty['USER_TYPE'], array('', 'DateTime'))) {
								$subprops[] = array(
									'TEXT' => $row_subproperty['NAME'],
									'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.PROPERTY_'.$row_subproperty['CODE'].'#\');'
								);
							}
						}

						$arElementPropertiesMacros['PROPERTY_' . $row['CODE']]['MENU'][] = array(
							'TEXT' => GetMessage('MACROS_ELEMENT_PROPERTIES_TEXT'),
							'MENU' => $subprops
						);
					}
				}
			} else if ($row['MULTIPLE'] == 'Y' && in_array($row['PROPERTY_TYPE'], array('E'))) {
				$arElementPropertiesMacros['PROPERTY_' . $row['CODE']] = array(
					'TEXT' => $row['NAME'],
					'MENU' => array(
						array(
							'TEXT' => 'ID',
							'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.ID(,)#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_CODE'),
							'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.CODE(,)#\');'
						),
						array(
							'TEXT' => GetMessage('LOGICASOFT_IBLOCKEVENT_MACROS_PROP_EG_NAME'),
							'ONCLICK' => 'setMacroTextarea(\'' . $block . '\', \'#PROPERTY_' . $row['CODE'] . '.NAME(,)#\');'
						)
					)
				);
			}
		}

		return $arElementPropertiesMacros;
	}

	public function getSectionFields() {
		return array(
			'IBLOCK_SECTION_ID' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_IBLOCK_SECTION_ID'),
			'IBLOCK_SECTION_CODE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_IBLOCK_SECTION_CODE'),
			'IBLOCK_SECTION_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_IBLOCK_SECTION_NAME')
		);
	}

	public function getIBlockFields() {
		return array(
			'IBLOCK_ID' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_IBLOCK_ID'),
			'IBLOCK_CODE' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_IBLOCK_CODE'),
			'IBLOCK_NAME' => GetMessage('LOGICASOFT_IBLOCKEVENT_ELEMENT_IBLOCK_NAME')
		);
	}
}