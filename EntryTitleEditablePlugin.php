<?php

/**
 *
 * @package    EntryTitleEditable
 * @version    Version 1.1.6
 * @author     Rick Hambrook
 * @copyright  Copyright (c) 2016
 * @link       www.rickhambrook.com
 *
 */

namespace Craft;

class EntryTitleEditablePlugin extends BasePlugin {
	public function getName() {
		return Craft::t('Entry Title Editable');
	}

	public function getVersion() {
		return '1.1.6';
	}

	public function getDeveloper() {
		return 'Rick Hambrook';
	}

	public function getDeveloperUrl() {
		return 'https://www.rickhambrook.com';
	}

	public function hasCpSection() {
		return false;
	}

	public function init() {
		// We use an array to first store the section slug
		// then we add the section ID so that both IDs and
		// slugs can be used in the only/ignore section lists
		$section = [];

		if (
			!craft()->request->isCpRequest() ||
			!craft()->userSession->isLoggedIn() ||
			craft()->request->getSegment(1) !== "entries" ||
			!($section[] = craft()->request->getSegment(2)) ||
			!craft()->request->getSegment(3)
		) {
			return;
		}

		// Get ignoresections and onlysections lists as arrays
		$ignoresections = craft()->config->get("ignoresections", "entrytitleeditable");
		$ignoresections = (is_array($ignoresections)) ? $ignoresections : [];
		$onlysections = craft()->config->get("onlysections", "entrytitleeditable");
		$onlysections = (is_array($onlysections)) ? $onlysections : [];

		if ($onlysections || $ignoresections) {
			$section[] = craft()->sections->getSectionByHandle($section[0])->id;

			// Entries must be in the onlysections list, if set. Or not on the ignoresections list
			if (
				($onlysections && !array_intersect($section, $onlysections)) ||
				($ignoresections && array_intersect($section, $ignoresections))
			) {
				return;
			}
		}

		// Do the thing
		craft()->templates->includeJsResource("entrytitleeditable/js/entrytitle.js");
		craft()->templates->includeCssResource("entrytitleeditable/css/entrytitle.css");
	}
}
