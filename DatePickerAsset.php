<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class DatePickerAsset extends AssetBundle
{

	public $sourcePath = '@xeditable/assets/';

	public $js = [
		"bootstrap-datepicker/js/bootstrap-datepicker.js"
	];

	public $css = [
		"bootstrap-datepicker/css/datepicker3.css",
		"bootstrap-datepicker/css/datepicker-kv.css",
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}