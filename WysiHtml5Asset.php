<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class WysiHtml5Asset extends AssetBundle
{

	public $sourcePath = '@xeditable/assets/';

	public $js = [
		"wysihtml5-bootstrap3/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js",
		"wysihtml5-bootstrap3/wysihtml5.js"
	];

	public $css = [
		"wysihtml5-bootstrap3/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css",
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}