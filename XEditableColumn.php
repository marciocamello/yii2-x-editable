<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class XEditableColumn extends DataColumn
{
	public $mode = 'inline';
	public $dataType = 'text';
	public $pk='id';
	public $dataTitle = '';
	public $editable = '';
	private $view = null;
	public $url = null;


	public function init()
	{
		parent::init();
		$this->registerAssets();
	}

	/**
	 * @inheritdoc
	 */
	protected function getDataCellContent($model, $key, $index)
	{
		if (empty($this->url)) {
			$this->url = \Yii::$app->urlManager->createUrl($_SERVER['REQUEST_URI']);
		}

		if (empty($this->value)) {
			$value = ArrayHelper::getValue($model, $this->attribute);
		} else {
			$value = call_user_func($this->value, $model, $index, $this);
		}

		$value = '<a href="#" data-name="'.$this->attribute.'" data-value="' . $model->{$this->attribute} . '"  class="editable" data-type="' . $this->dataType . '" data-pk="' . $model->{$this->pk} . '" data-url="' . $this->url . '" data-title="' . $this->dataTitle . '">' . $value . '</a>';

		return $value;
	}

	/**
	 * @inheritdoc
	 */
	protected function renderDataCellContent($model, $key, $index)
	{
		return $this->grid->formatter->format($this->getDataCellContent($model, $key, $index), $this->format);
	}

	/**
	 * @inheritdoc
	 */
	public function registerAssets()
	{
		$this->view = \Yii::$app->getView();
		XEditableAsset::register($this->view);
		$this->view->registerJs("$.fn.editable.defaults.mode = '$this->mode';");
		$this->editable = Json::encode($this->editable);
		$this->view->registerJs('$(".editable").editable(' . $this->editable . ');');
	}

} 