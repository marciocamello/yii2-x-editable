<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\View;

class XEditable extends \yii\base\Widget
{
	/**
	 * @var array defaults for editable configuration
	 */
	public $options = [];
	/**
	 * @var array defaults for editable configuration
	 */
	public $pluginOptions = [];
	/**
	 * @var array defaults for editable configuration
	 */
	public $htmlOptions = [];
	/**
	 * @var string type of editable widget. Can be `text`, `textarea`, `select`, `date`, `checklist`, etc.
	 * @see x-editable
	 */
	public $type = null;
	/**
	 * @var string url to submit value. Can be string or array containing Yii route, e.g. `array('site/updateUser')`
	 * @see x-editable
	 */
	public $url = null;
	/**
	 * @var mixed primary key
	 * @see x-editable
	 */
	public $pk = null;
	/**
	 * @var mixed initial value. If not set - will be taken from text
	 * @see x-editable
	 */
	public $value = null;
	/**
	 * @var string name of field
	 * @see x-editable
	 */
	public $name = 'x-editable';
	/**
	 * @var string title of field
	 * @see x-editable
	 */
	public $title = 'click to edit';
	/**
	 * @var string id of field
	 * @see x-editable
	 */
	public $id = 'x-editable';
	/**
	 * @var string class of field
	 * @see x-editable
	 */
	public $class = 'editable-click';
	/**
	 * @var string class of field
	 * @see x-editable
	 */
	public $paramsOptions = [];


	/**
	 * @inheritdoc
	 */
    public function init()
    {
        parent::init();
		$this->registerAssets();
    }

    public function run()
    {
		$config = new XEditableConfig();

		$this->paramsOptions = [
			'id' => $this->id,
		];

		return Html::a($this->value, '#', ($this->htmlOptions) ? ArrayHelper::merge($this->paramsOptions,$this->htmlOptions) : $this->paramsOptions);
	}

	/**
	 * @inheritdoc
	 */
    public function registerAssets()
    {

		$config = new XEditableConfig();

		if(isset($this->pluginOptions['mode']) && is_array($this->pluginOptions)){
			$config->mode = $this->pluginOptions['mode'];
		}

		if(isset($this->pluginOptions['form']) && is_array($this->pluginOptions)){
			$config->form = $this->pluginOptions['form'];
		}

		$config->registerDefaultAssets();

		if($this->pluginOptions['type'] == 'select2') {
			Select2Asset::register($this->view);
		}

		if($this->pluginOptions['type'] == 'datetime') {
			DateTimePickerAsset::register($this->view);
		}

		if($this->pluginOptions['type'] == 'date') {
			DatePickerAsset::register($this->view);
		}

		if($this->pluginOptions['type'] == 'typeaheadjs') {
			TypeaheadAsset::register($this->view);
		}

		if($this->pluginOptions['type'] == 'combodate') {
			ComboDateAsset::register($this->view);
		}

		if($this->pluginOptions['type'] == 'wysihtml5') {
			WysiHtml5Asset::register($this->view);
		}

		$this->view = \Yii::$app->getView();
		XEditableAsset::register($this->view);

		$this->options = Json::encode($this->pluginOptions);
		$this->view->registerJs("$('#$this->id').editable($this->options);");
	}
}
