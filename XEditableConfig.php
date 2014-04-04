<?php

/**
 * Xeditable class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\xeditable;

use yii\bootstrap\BootstrapAsset;
use yii\helpers\Json;
use yii\web\View;

class XEditableConfig extends \yii\base\widget
{
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
    * @see register default assets for extension
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
			/*$.fn.editable.defaults.ajaxOptions = {
				type: 'post',
				success:function(data){
					alert(data);
				}
			}*/
		");
	}
}
