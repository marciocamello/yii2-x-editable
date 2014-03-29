<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class DateTimePickerAsset extends AssetBundle
{

	public $sourcePath = '@xeditable/assets/';

	public $js = [
		"bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"
	];

	public $css = [
		"bootstrap-datetimepicker/css/bootstrap-datetimepicker.css",
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}