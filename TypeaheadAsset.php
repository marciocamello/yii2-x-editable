<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class TypeaheadAsset extends AssetBundle
{

	public $sourcePath = '@xeditable/assets/';

	public $js = [
		"typeahead/typeahead.js",
		"typeahead/typeaheadjs.js"
	];

	public $css = [
		"typeahead/typeahead.js-bootstrap.css",
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}