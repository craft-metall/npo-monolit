<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage sender
 * @copyright 2001-2012 Bitrix
 */

namespace Bitrix\Sender\Integration\Crm\Ads;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Error;
use Bitrix\Main\Result;

use Bitrix\Sender\Message;
use Bitrix\Sender\Entity;

use Bitrix\Seo\Retargeting;

Loc::loadMessages(__FILE__);

/**
 * Class MessageBase
 * @package Bitrix\Sender\Integration\Crm\Ads
 */
abstract class MessageBase implements Message\iBase, Message\iAds
{
	const CODE = self::CODE_UNDEFINED;
	const CODE_ADS_VK = 'ads_vk';
	const CODE_ADS_FB = 'ads_fb';
	const CODE_ADS_YA = 'ads_ya';
	const CODE_ADS_GA = 'ads_ga';

	/** @var Message\Configuration $configuration Configuration. */
	protected $configuration;

	/**
	 * MessageBase constructor.
	 */
	public function __construct()
	{
		$this->configuration = new Message\Configuration();
	}

	/**
	 * Get name.
	 * @return string
	 */
	public function getName()
	{
		return Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_NAME_' . strtoupper($this->getCode()));
	}

	public function getCode()
	{
		return static::CODE;
	}

	public function getSupportedTransports()
	{
		return array(static::CODE);
	}

	protected function getAdsType()
	{
		$map = Service::getTypeMap();
		return $map[$this->getCode()];
	}

	protected function setConfigurationOptions()
	{
		$this->configuration->setArrayOptions(array(
			array(
				'type' => 'string',
				'code' => 'ACCOUNT_ID',
				'name' => Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_CONFIG_ACCOUNT_ID'),
				'required' => false,
			),
			array(
				'type' => 'string',
				'code' => 'AUDIENCE_ID',
				'name' => Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_CONFIG_AUDIENCE_ID'),
				'required' => false,
			),
			array(
				'type' => 'string',
				'code' => 'AUDIENCE_EMAIL_ID',
				'name' => Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_CONFIG_AUDIENCE_EMAIL_ID'),
				'required' => false,
			),
			array(
				'type' => 'string',
				'code' => 'AUDIENCE_PHONE_ID',
				'name' => Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_CONFIG_AUDIENCE_PHONE_ID'),
				'required' => false,
			),
			array(
				'type' => 'integer',
				'code' => 'AUTO_REMOVE_DAY_NUMBER',
				'name' => Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_CONFIG_AUTO_REMOVE_DAY_NUMBER'),
				'required' => false,
			),
		));
	}

	/**
	 * Load configuration.
	 *
	 * @param integer|null $id ID.
	 *
	 * @return Message\Configuration
	 */
	public function loadConfiguration($id = null)
	{
		if (!$this->configuration->hasOptions())
		{
			$this->setConfigurationOptions();
		}

		Entity\Message::create()
			->setCode($this->getCode())
			->loadConfiguration($id, $this->configuration);


		$self = $this;
		$configuration = $this->configuration;
		$this->configuration->setView(
			function () use ($self, $configuration)
			{
				if ($configuration->get('AUDIENCE_EMAIL_ID') || $configuration->get('AUDIENCE_PHONE_ID'))
				{
					$audienceId = array(
						Retargeting\Audience::ENUM_CONTACT_TYPE_EMAIL => $configuration->get('AUDIENCE_EMAIL_ID'),
						Retargeting\Audience::ENUM_CONTACT_TYPE_PHONE => $configuration->get('AUDIENCE_PHONE_ID'),
					);
				}
				else
				{
					$audienceId = $configuration->get('AUDIENCE_ID');
				}


				$containerNodeId = 'crm-ads-' . $configuration->getId();
				ob_start();
				$GLOBALS['APPLICATION']->IncludeComponent(
					'bitrix:crm.ads.retargeting',
					'',
					array(
						'INPUT_NAME_PREFIX' => 'CONFIGURATION_',
						'CONTAINER_NODE_ID' => $containerNodeId,
						'PROVIDER' => Service::getAdsProvider($self->getAdsType()),
						'ACCOUNT_ID' => $configuration->get('ACCOUNT_ID'),
						'AUDIENCE_ID' => $audienceId,
						'AUTO_REMOVE_DAY_NUMBER' => $configuration->get('AUTO_REMOVE_DAY_NUMBER'),
						'JS_DESTROY_EVENT_NAME' => '',
						'HAS_ACCESS' => true // TODO: check SENDER-module permissions
					)
				);

				return ob_get_clean() . "<div id=\"$containerNodeId\"></div><div style=\"padding: 12px 14px; background: #F8F4BC; color: #91711E;\">" . Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_SYNC_WARN') . "</div>";
			}
		);

		return $this->configuration;
	}

	/**
	 * Save configuration.
	 *
	 * @param Message\Configuration $configuration Configuration.
	 * @return Result
	 */
	public function saveConfiguration(Message\Configuration $configuration)
	{
		$config = $configuration;
		if (!$config->get('AUDIENCE_ID') && !$config->get('AUDIENCE_EMAIL_ID') && !$config->get('AUDIENCE_PHONE_ID'))
		{
			$result = new Result();
			$result->addError(new Error(Loc::getMessage('SENDER_INTEGRATION_CRM_MESSAGE_ERROR_NO_AUDIENCE')));

			return $result;
		}

		return Entity\Message::create()
			->setCode($this->getCode())
			->saveConfiguration($this->configuration);
	}

	/**
	 * Remove configuration.
	 *
	 * @param integer $id ID.
	 * @return bool
	 */
	public function removeConfiguration($id)
	{
		$result = Entity\Message::removeById($id);
		return $result->isSuccess();
	}

	/**
	 * Copy configuration.
	 *
	 * @param integer|string|null $id ID.
	 * @return Result|null
	 */
	public function copyConfiguration($id)
	{
		return Entity\Message::create()
			->setCode($this->getCode())
			->copyConfiguration($id);
	}
}