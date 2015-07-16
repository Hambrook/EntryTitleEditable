<?php

/**
 *
 * @package    AssetLinks
 * @version    Version 1.0
 * @author     Rick Hambrook
 * @copyright  Copyright (c) 2015
 * @link       www.rickhambrook.com
 *
 */

namespace Craft;

class EntryTitleEditablePlugin extends BasePlugin {
	public function getName() {
		return Craft::t('Entry Title Editable');
	}

	public function getVersion() {
		return '1.0';
	}

	public function getDeveloper() {
		return 'Rick Hambrook';
	}

	public function getDeveloperUrl() {
		return 'http://www.rickhambrook.com';
	}

	public function hasCpSection() {
		return false;
	}

	function init() {
		if (
			craft()->request->isCpRequest() &&
			craft()->userSession->isLoggedIn() &&
			craft()->request->getSegment(1) == "entries"
		) {
			craft()->templates->includeJsResource("entrytitleeditable/js/entrytitle.js");
			craft()->templates->includeCssResource("entrytitleeditable/css/entrytitle.css");
		}
	}
}