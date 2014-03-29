<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class Select2Asset extends AssetBundle
{

	public $sourcePath = '@xeditable/assets/';

	public $js = [
		"select2/select2.js"
	];

	public $css = [
		"select2/select2.css",
		"select2/select2-bootstrap3.css"
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}