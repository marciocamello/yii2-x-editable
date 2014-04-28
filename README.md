MCMS X-Editable
===============
X-editable extensions for Yii 2, based in X-editable 1.5.1 with Bootstrap 3
Link from project - http://vitalets.github.io/x-editable/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require marciocamello/yii2-x-editable "dev-master"
```

or add

```
"marciocamello/yii2-x-editable": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by :

XEditable NameSpace and Model params
------------

```php

<?php

use mcms\xeditable\XEditable;

$model = Model::findOne($id);

?>

```

Actions
------------

```
	public function actions()
	{
		return [
			'editable' => [
				'class' => 'mcms\xeditable\XEditableAction',
				//'scenario'=>'editable',  //optional
				'modelclass' => Model::className(),
			],
		];
	}
```

Text whitout model
------------

```
<?php

echo XEditable::widget([
	'value' => 'With Xeditable'
]);

echo '<br>';

echo \mcms\xeditable\XEditableText::widget([
	'value' => 'With XEditableText'
]);

?>
```

Text
------------

```
<?php

echo \mcms\xeditable\XEditableText::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'title',
	],
	'callbacks' => [
		'validate' => new \yii\web\JsExpression('
			function(value) {
				if($.trim(value) == "") {
					return "This field is required";
				}
			}
		')
	]
]);

?>
```

Text Toggle Manual
------------

```
<?php

echo \mcms\xeditable\XEditableText::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'toggle' => 'manual',
		'name' => 'title',
	],
	'callbacks' => [
		'validate' => new \yii\web\JsExpression('
			function(value) {
				if($.trim(value) == "") {
					return "This field is required";
				}
			}
		')
	]
]);

?>
```

TextArea
------------

```
<?php

echo \mcms\xeditable\XEditableTextArea::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'content',
	],
]);

?>
```

Select
------------

```
<?php

echo \mcms\xeditable\XEditableSelect::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'status',
		'source'=>[
			['value'=>1,
				'text'=>Yii::t('app','On')],
			['value'=>0,
				'text'=>Yii::t('app','Off')]
		],
	],
]); ?>
```

Date
------------

```
<?php

echo \mcms\xeditable\XEditableDate::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'created_at',
		'value' => date('Y-m-d',$model->created_at),
		'format' => 'yyyy-mm-dd',
		'viewformat' => 'dd/mm/yyyy',
		'datepicker' => [
			[
				'weekStart' => 1
			]
		],
	]
]); ?>
```

DateTime
------------

```
<?php

echo \mcms\xeditable\XEditableDateTime::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'created_at',
		'value' => date('Y-m-d h:i',$model->created_at),
		'format' => 'yyyy-mm-dd hh:ii',
		'viewformat' => 'dd/mm/yyyy hh:ii',
		'datepicker' => [
			[
				'weekStart' => 1
			]
		],
	]
]); ?>
```

ComboDate
------------

```
<?php

echo \mcms\xeditable\XEditableComboDate::widget([
	'model' => $model,
	'placement' => 'right',
	'type' => 'combodate',
	'pluginOptions' => [
		'name' => 'created_at',
		'value' => date('Y-m-d h:i',$model->created_at),
		'format'      => 'YYYY-MM-DD HH:mm',
		'viewformat'  => 'MMM DD, YYYY HH:mm',
		'template'    => 'DD / MMM / YYYY HH:mm',
		'combodate' => [
			[
				'minYear' => '2000',
				'maxYear' => '2015',
				'minuteStep' => '1'
			]
		],
	]
]); ?>
```

Checklist
------------

```
<?php

echo \mcms\xeditable\XEditableCheckList::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'image',
		'source'=>[
			['value'=>'option1',
				'text'=>Yii::t('app','option1')],
			['value'=>'option2',
				'text'=>Yii::t('app','option2')],
			['value'=>'option3',
				'text'=>Yii::t('app','option3')]
		],
	],
]); ?>

```

HTML Editor - WysiHtml5
------------

```
<?php

echo \mcms\xeditable\XEditableWysiHtml5::widget([
	'type' => 'wysihtml5',
	'model' => $model,
	'pluginOptions' => [
		'toggle' => 'manual',
		'name' => 'content',
		'title' => 'Enter comments',
	],
]); ?>
```

DataGrid
------------

```
<?php
$provider = new \yii\data\ActiveDataProvider([
	'query' => \backend\modules\cms\models\Categories::find(),
	'pagination' => [
		'pageSize' => 4,
	],
]);

echo GridView::widget([
	'id' => Yii::$app->controller->id,
	'dataProvider' => $provider,
	'columns' => [
		[
			'value'=>function($model) {
				return $model->active;
			},
			'class' => \mcms\xeditable\XEditableColumn::className(),
			'url' => 'editable',
			'dataType'=>'select',
			'editable'=>[
				'source'=>[
					['value'=>1,
						'text'=>Yii::t('app','On')],
					['value'=>0,
						'text'=>Yii::t('app','Off')]
				],
				'placement' => 'right',
			],
			'attribute' => 'status',
			'format' => 'raw',
		],
		'title',
	]
]);
?>
```

Select2
------------

```
<?php

$items = [
	['value'=>'gb',
		'text'=>Yii::t('app','Great Britain')],
	['value'=>'us',
		'text'=>Yii::t('app','United States')],
	['value'=>'ru',
		'text'=>Yii::t('app','Russia')]
];

echo XEditable::widget([
	'placement' => 'right',
	'type' => 'select2',
	'pluginOptions' => [
		'value' => 'ru',
		'source'=> $items,
		'select2' => [
			'multiple' => true
		],
	]
]); ?>
```

TypeAheadJs
------------

```
<?php

$items = [
	['value'=>'gb',
		'text'=>Yii::t('app','Great Britain')],
	['value'=>'us',
		'text'=>Yii::t('app','United States')],
	['value'=>'ru',
		'text'=>Yii::t('app','Russia')]
];

echo XEditable::widget([
	'placement' => 'right',
	'type' => 'typeaheadjs',
	'pluginOptions' => [
		'value' => 'ru',
		'typeahead' => [
			'name' => 'country',
			'local' => $items,
		],
	]
]); ?>
```
