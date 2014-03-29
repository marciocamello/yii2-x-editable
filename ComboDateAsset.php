<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class ComboDateAsset extends AssetBundle
{

	public $sourcePath = '@xeditable/assets/';

	public $js = [
		"combodate/moment.min.js",
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}