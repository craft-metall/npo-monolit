<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage sender
 * @copyright 2001-2012 Bitrix
 */

namespace Bitrix\Sender\Integration\Crm\Ads;

use Bitrix\Main\Localization\Loc;

/**
 * Class MessageYa
 * @package Bitrix\Sender\Integration\Crm\Ads
 */
class MessageYa extends MessageBase
{
	const CODE = self::CODE_ADS_YA;

	/**
	 * Get name.
	 * @return string
	 */
	public function getName()
	{
		return Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_NAME_ADS_YA');
	}
}