<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\base\Action;
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
		if(\Yii::$app->request->getIsPost()){
			$pk=$_POST['pk'];
			$name=$_POST['name'];
			$value=trim($_POST['value']);
			$modelclass=$this->modelclass;
			$model= $modelclass::findOne($pk);
			if($this->scenario){
				$model->setScenario($this->scenario);
			}
			if($model===null)
				throw new NotFoundHttpException();
			$model->$name = $value;
			if ($model->validate()){
				$model->update();
			}else{
				VarDumper::dump($model->getErrors(),10);
			}
		}
	}
}
