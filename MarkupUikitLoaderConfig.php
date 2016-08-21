<?php

/**
 * Configure 'YOOtheme uikit Load Module'
 * http://processwire.com/blog/posts/new-module-configuration-options/
 *
 * Injects framework markup.
 * Just place <!--uikit-here-CSS--> and <!--uikit-here-JS--> to have it replaced with the corresponding markup.
 *
 *
 * for ProcessWire 2.x
 * Copyright (C) 2015 by Ryan Cramer
 * This file licensed under Mozilla Public License v2.0 http://mozilla.org/MPL/2.0/
 *
 *  \   /\
 *  )  ( ')
 * (  /  )
 * \(__)|
 * https://processwire.com
 * uikit Framework by YOOtheme, Licensed under MIT license.
 * http://getuikit.com
 *
 */
class MarkupUikitLoaderConfig extends ModuleConfig {

	public function __construct() {

		// howto information
		$information = "QUICK CDN Install:\n";
		$information .= "1.) Activate uikit CDN, check for current version (https://cdnjs.com/libraries/uikit) and update version number field.\n---\n";
		$information .= "LOCAL uikit HOSTING:\n";
		$information .= "1.) Get the YOOtheme uikit framework http://www.getuikit.com\n";
		$information .= "2.) Extract and place it in your PW templates folder (e.g.: styles/uikit-2.26.4/...)\n";
		$information .= "3.) Remember the uikit base folder name (e.g.: uikit-2.26.4) and update it in the module settings as the default will very likely not be current. You can maintain / test different versions.\n---\n";
		$information .= "FINAL STEPS:\n";
		$information .= "4.) Place <!--uikit-here-CSS--> and <!--uikit-here-JS--> in the HTML head section\n";
		$information .= "5.) Setup loading conditions.\n---\n";
		$information .= "uikit CDN only works with default styles (yet).\n";
		$information .= "If you are using PW site profiles, styles/main.css might override uikit. Merge or place <!--uikit-here-CSS--> below the main.css link.\n";
		$information .= "The module will not minimize files for you, only load them if the .min. version is available!";

		// uikit data array. this will get updated when neccessary. smarter access to this array coming soon. name / css / js
		$uikit_source = array(
			"accordion" => array(1, 1),
			"autocomplete" => array(1, 1),
			"datepicker" => array(1, 1),
			"dotnav" => array(1, 0),
			"form-advanced" => array(1, 0),
			"form-file" => array(1, 0),
			"form-password" => array(1, 1),
			"form-select" => array(1, 1),
			"grid-parallax" => array(0, 1),
			"htmleditor" => array(1, 1),
			"lightbox" => array(0, 1),
			"nestable" => array(1, 1),
			"notify" => array(1, 1),
			"pagination" => array(0, 1),
			"parallax" => array(0, 1),
			"placeholder" => array(1, 0),
			"progress" => array(1, 1),
			"search" => array(1, 1),
			"slidenav" => array(1, 1),
			"slider" => array(1, 1),
			"slideset" => array(0, 1),
			"slideshow" => array(1, 1),
			"slideshow-fx" => array(0, 1),
			"sortable" => array(1, 1),
			"sticky" => array(1, 1),
			"timepicker" => array(0, 1),
			"tooltip" => array(1, 1),
			"upload" => array(1, 1),
		);

		// build template select array
		$pw_tmpl = [];
		foreach (wire('templates') as $template) {
			$pw_tmpl[$template->name] = ($template->name);
		}

		// build select component array
		$pw_select = [];
		foreach ($uikit_source as $key => $value) {
			$pw_select[$key] = $key;
		}

		// dumping the uikit data array into the pw $config
		wire('config')->uikit_source = new WireData();
		wire('config')->uikit_source = $uikit_source;

		// conditions set #1
		$conditions1 = [];
		$conditions1 = array(
			array(
				// fieldset
				'name' => 'uikit_component_1',
				'type' => 'AsmSelect',
				'description' => $this->_('Which Components? http://www.getuikit.com/docs/components'),
				'label' => $this->_('Components #1'),
				'options' => $pw_select,
				'columnWidth' => 40,
			),
			// full site
			array(
				'name' => 'uikit_all_1',
				'type' => 'checkbox',
				'label' => $this->_('for all pages?'),
				'columnWidth' => 20,
				'value' => '0',
			),
			// which templates
			array(
				'name' => 'uikit_templateselect_1',
				'type' => 'AsmSelect',
				'label' => $this->_('for templates:'),
				'options' => $pw_tmpl,
				'columnWidth' => 20,
				'value' => [],
			),
			// which pages
			array(
				'name' => 'uikit_pageselect_1',
				'type' => 'PageListSelectMultiple',
				'label' => $this->_('for pages:'),
				'options' => $pw_tmpl,
				'columnWidth' => 20,
				'value' => [],
			),
		);

		// conditions set #2
		$conditions2 = [];
		$conditions2 = array(
			array(
				// fieldset
				'name' => 'uikit_component_2',
				'type' => 'AsmSelect',
				'description' => $this->_('Which Components? http://www.getuikit.com/docs/components'),
				'label' => $this->_('Components #2'),
				'options' => $pw_select,
				'columnWidth' => 40,
			),
			// full site
			array(
				'name' => 'uikit_all_2',
				'type' => 'checkbox',
				'label' => $this->_('for all pages?'),
				'columnWidth' => 20,
				'value' => '0',
			),
			// which templates
			array(
				'name' => 'uikit_templateselect_2',
				'type' => 'AsmSelect',
				'label' => $this->_('for templates:'),
				'options' => $pw_tmpl,
				'columnWidth' => 20,
				'value' => [],
			),
			// which pages
			array(
				'name' => 'uikit_pageselect_2',
				'type' => 'PageListSelectMultiple',
				'label' => $this->_('for pages:'),
				'options' => $pw_tmpl,
				'columnWidth' => 20,
				'value' => [],
			),
		);

		// conditions set #3
		$conditions3 = [];
		$conditions3 = array(
			array(
				// fieldset
				'name' => 'uikit_component_3',
				'type' => 'AsmSelect',
				'description' => $this->_('Which Components? http://www.getuikit.com/docs/components'),
				'label' => $this->_('Components #3'),
				'options' => $pw_select,
				'columnWidth' => 40,
			),
			// full site
			array(
				'name' => 'uikit_all_3',
				'type' => 'checkbox',
				'label' => $this->_('for all pages?'),
				'columnWidth' => 20,
				'value' => '0',
			),
			// which templates
			array(
				'name' => 'uikit_templateselect_3',
				'type' => 'AsmSelect',
				'label' => $this->_('for templates:'),
				'options' => $pw_tmpl,
				'columnWidth' => 20,
				'value' => [],
			),
			// which pages
			array(
				'name' => 'uikit_pageselect_3',
				'type' => 'PageListSelectMultiple',
				'label' => $this->_('for pages:'),
				'options' => $pw_tmpl,
				'columnWidth' => 20,
				'value' => [],
			),
		);

		// information
		$this->add(array(
			array(
				'name' => 'information',
				'type' => 'InputfieldFieldset',
				'label' => $this->_('How to use'),
				'description' => $information,
				'collapsed' => '1',
			),
		));

		// condition fieldsets
		$this->add(array(
			array(
				'name' => 'conditions_1',
				'type' => 'InputfieldFieldset',
				'label' => $this->_('Conditions #1'),
				'children' => $conditions1,
				'collapsed' => '1',
			),
			array(
				'name' => 'conditions_2',
				'type' => 'InputfieldFieldset',
				'label' => $this->_('Conditions #2'),
				'children' => $conditions2,
				'collapsed' => '1',
			),
			array(
				'name' => 'conditions_3',
				'type' => 'InputfieldFieldset',
				'label' => $this->_('Conditions #3'),
				'children' => $conditions3,
				'collapsed' => '1',
			),
		));

		// further general configuration
		$this->add(array(
			// checkbox: loader active?
			array(
				'name' => 'uikit_active',
				'type' => 'checkbox',
				'description' => $this->_('De-/activate uikit Markup Loader'),
				'label' => $this->_('Active?'),
				'value' => '1',
				'columnWidth' => 25,
			),
			// URL field: basepath uikit framework
			array(
				'name' => 'uikit_path',
				'type' => 'URL',
				'label' => $this->_('Path to uikit base directory'),
				'description' => $this->_('Set the Uikit base folder within the template folder. E.g.: styles/uikit-2.26.4/'),
				'required' => true,
				'value' => $this->_('styles/uikit-2.26.4/'),
				'columnWidth' => 25,
			),
			// Selector: uikit CDN?
			array(
				'name' => 'uikit_cdn',
				'type' => 'checkbox',
				'label' => $this->_('Load uikit CDN?'),
				'description' => 'Check for current version: https://cdnjs.com/libraries/uikit',
				'value' => '1',
				'columnWidth' => 25,
			),
			// Selector: uikit CDN?
			array(
				'name' => 'uikit_cdn_version',
				'type' => 'text',
				'label' => $this->_('Version?'),
				'description' => 'e.g.: 2.26.4',
				'value' => '2.26.4',
				'columnWidth' => 10,
			),
			// checkbox: minimized version (add .min)?
			array(
				'name' => 'uikit_min',
				'type' => 'checkbox',
				'label' => $this->_('Minimized?'),
				'description' => $this->_('Load the minimized (.min) files?'),
				'value' => '1',
				'columnWidth' => 15,
			),

			// Selector: Base style version
			array(
				'name' => 'uikit_style',
				'type' => 'select',
				'description' => $this->_('Base = uikit.css. Custom = use custom field.'),
				'label' => $this->_('Base Style'),
				'options' => array(
					'' => $this->_('Base'),
					'.gradient' => $this->_('Gradient'),
					'.almost-flat' => $this->_('Almost flat'),
					'custom' => $this->_('Custom'),
				),
				'columnWidth' => 25,
			),
			// URL field: Custom style
			array(
				'name' => 'uikit_path_style',
				'type' => 'URL',
				'label' => $this->_('Path to custom style in directory'),
				'description' => $this->_('Your custom style CSS file within the template folder. E.g.: styles/uikit-2.26.4/css/my-uikit.css'),
				'value' => 'styles/uikit-2.26.4/css/mystyle-main.css',
				'columnWidth' => 25,
			),
			// Selector: Jquery?
			array(
				'name' => 'uikit_jquery',
				'type' => 'checkbox',
				'description' => $this->_('Needs: templates/scripts/jquery.js first!'),
				'label' => $this->_('Load jQuery local?'),
				'value' => '0',
				'columnWidth' => 25,
			),
			// Selector: Jquery CDN?
			array(
				'name' => 'uikit_jquery_cdn',
				'type' => 'checkbox',
				'label' => $this->_('Load jQuery CDN?'),
				'description' => 'https://code.jquery.com/',
				'value' => '1',
				'columnWidth' => 15,
			),
			// Selector: jQuery Version?
			array(
				'name' => 'uikit_jquery_version',
				'type' => 'text',
				'label' => $this->_('Version?'),
				'description' => 'e.g.: 2.2.4',
				'value' => '2.2.4',
				'columnWidth' => 10,
			),

		));
	}
}