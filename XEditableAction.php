<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\base\Action;
use yii\console\Response;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

class XEditableAction extends Action
{
	public $modelclass;
	public $scenario='';

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if (\Yii::$app->request->isAjax) {
			$pk=$_POST['pk'];
			$name=$_POST['name'];
			$value=$_POST['value'];

			$modelclass=$this->modelclass;
			$model= $modelclass::findOne($pk);
			if($this->scenario){
				$model->setScenario($this->scenario);
			}

			XEditable::saveAction([
				'name' => $name,
				'value' => $value,
				'model' => $model,
			]);
		}
	}
}
