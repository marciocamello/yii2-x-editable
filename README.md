MCMS X-Editable
===============
X-editable extensions for Yii 2, based in X-editable with Bootstrap

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist marciocamello/yii2-x-editable "*"
```

or add

```
"marciocamello/yii2-x-editable": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by :


XEditable
------------

```php

<?php

use mcms\xeditable\XEditable;

echo Xeditable::widget(); 

?>

```

XEditableColumn with GridView
------------

```php

<?php

use mcms\xeditable\XEditableColumn;
use yii\grid\GridView;

$provider = new \yii\data\ActiveDataProvider([
	'query' => \app\models\Model::find(),
]);

echo GridView::widget([
		 'id' => Yii::$app->controller->id,
		 'dataProvider' => $provider,
		 'columns' => [
		 [
			 'value'=>function($data) {

					 if(empty($data->is_active))
					 {
						 return Yii::t('app','No');
					 }

					 return Yii::t('app','Yes');
				 },
			 'class' => XEditableColumn::className(),
			 'dataType'=>'select',
			 'editable'=>[
				 'source'=>[
					 ['value'=>1,
						 'text'=>Yii::t('app','Yes')],
					 ['value'=>0,
						 'text'=>Yii::t('app','No')]
				 ],
			 ],
			 'attribute' => 'status',
			 'format' => 'raw',
			 'filter' => ['1' => Yii::t('app', 'Yes'),'0' => Yii::t('app', 'No'),],
			],
	]
]);
?>

```
