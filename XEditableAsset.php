<?php

namespace mcms\xeditable;

use yii\web\AssetBundle;
use yii\web\View;


\Yii::setAlias('@xeditable', dirname(__FILE__));

/**
 * Asset bundle for XEditable Widget
 */
class XEditableAsset extends AssetBundle
{

    public $sourcePath = '@xeditable/assets/';

    public $js = [
        "x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"
    ];

    public $css = [
        "x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css"
    ];

    public $publishOptions = [
        'forceCopy' => true
    ];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}