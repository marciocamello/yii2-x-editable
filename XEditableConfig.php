<?php

namespace mcms\xeditable;

use yii\bootstrap\BootstrapAsset;
use yii\helpers\Json;
use yii\web\View;

class XEditableConfig extends \yii\base\widget
{
    const FORM_BOOTSTRAP2 = 'bootstrap';
	const FORM_BOOTSTRAP3 = 'bootstrap3';
    const FORM_JQUERYUI = 'jqueryui';
    const FORM_PLAIN = 'plain';

    const POPUP = 'popup';
    const INLINE = 'inline';

    /**
    * @var string editable form engine: bootstrap, jqueryui, plain
    */
    public $form = self::FORM_BOOTSTRAP3;

    /**
    * @var string editable container type: popup or inline
    */
    public $mode = self::POPUP;

    /**
    * @var array defaults for editable configuration
    */
    public $defaults = array();

    /**
    * initializes editable component and sets defaults
    *
    */

	public function registerDefaultAssets()
	{
		parent::init();

		if(empty($this->defaults))
			$this->defaults = array();
		if(empty($this->defaults['mode']))
			$this->defaults['mode'] = $this->mode;

		$defaults = Json::encode($this->defaults);
		XEditableAsset::register($this->view);

		$this->view->registerJs("
		if($.fn.editable)
		$.extend(
			$.fn.editable.defaults , $defaults);
		");
	}
}
