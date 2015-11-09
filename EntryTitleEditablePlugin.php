<?php

/**
 *
 * @package    EntryTitleEditable
 * @version    Version 1.1
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
		return '1.1';
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
			!craft()->request->isCpRequest() ||
			!craft()->userSession->isLoggedIn() ||
			craft()->request->getSegment(1) !== "entries" ||
			!($section = craft()->request->getSegment(2))
		) {
			return;
		}

		// Get black and white lists as arrays
		$blacklist = craft()->config->get("blacklist", "entrytitleeditable");
		$blacklist = (is_array($blacklist)) ? $blacklist : [];
		$whitelist = craft()->config->get("whitelist", "entrytitleeditable");
		$whitelist = (is_array($whitelist)) ? $whitelist : [];

		// Entries must be in the whitelist, if set. Or not on the blacklist
		if (
			($whitelist && !in_array($section, $whitelist)) ||
			($blacklist && in_array($section, $blacklist))
		) {
			return;
		}

		// Do the thing
		craft()->templates->includeJsResource("entrytitleeditable/js/entrytitle.js");
		craft()->templates->includeCssResource("entrytitleeditable/css/entrytitle.css");
	}
}