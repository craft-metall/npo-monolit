<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage sender
 * @copyright 2001-2012 Bitrix
 */

namespace Bitrix\Sender\Integration\Crm\Ads;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class TransportFb
 * @package Bitrix\Sender\Integration\Crm\Ads
 */
class TransportFb extends TransportBase
{
	const CODE = self::CODE_ADS_FB;
}