<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

\Yii::setAlias('@xeditable', dirname(__FILE__));

/**
 * @inheritdoc
 */
class XEditableAsset extends AssetBundle
{

    public $sourcePath = '@xeditable/assets/';

    public $js = [
        "x-editable/bootstrap3-editable/js/bootstrap-editable.min.js"
    ];

    public $css = [
        "x-editable/bootstrap3-editable/css/bootstrap-editable.css"
    ];

    public $publishOptions = [
        'forceCopy' => true
    ];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}