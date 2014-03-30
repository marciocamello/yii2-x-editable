MCMS X-Editable
===============
X-editable extensions for Yii 2, based in X-editable 1.5.1 with Bootstrap 3

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

$model = Model::find($id);

?>
```

Text
------------

```
<?php

echo XEditable::widget([
	'id' => 'text-editable',
	'pluginOptions' => [
		'type' => 'text',
		'name' => 'title',
		'value' => $model->title,
		'url' => 'editable',
		'pk' => $model->id,
	]
]); ?>

```

TextArea
------------

```
<?php

echo XEditable::widget([
	'id' => 'textarea-editable',
	'pluginOptions' => [
		'type' => 'textarea',
		'name' => 'content',
		'value' => $model->content,
		'row' => 10,
		'url' => 'editable',
		'pk' => $model->id,
	]
]); ?>

```

Select
------------

```
<?php

echo XEditable::widget([
	'id' => 'select-editable',
	'pluginOptions' => [
		'type' => 'select',
		'name' => 'status',
		'value' => $model->status,
		'source'=>[
			['value'=>1,
				'text'=>Yii::t('app','On')],
			['value'=>0,
				'text'=>Yii::t('app','Off')]
		],
		'url' => 'editable',
		'pk' => $model->id,
	]
]); ?>
```

CheckList
------------

```
<?php

echo XEditable::widget([
	'id' => 'checklist-editable',
	'pluginOptions' => [
		'type' => 'checklist',
		'name' => 'status',
		'value' => $model->status,
		'source'=>[
			['value'=>0,
				'text'=>Yii::t('app','option1')],
			['value'=>1,
				'text'=>Yii::t('app','option2')],
			['value'=>2,
				'text'=>Yii::t('app','option3')]
		],
	]
]); ?>

```

Date
------------

```
<?php

echo XEditable::widget([
	'id' => 'date-editable',
	'pluginOptions' => [
		'type' => 'date',
		'name' => 'create_at',
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

echo XEditable::widget([
	'id' => 'datetime-editable',
	'pluginOptions' => [
		'type' => 'datetime',
		'name' => 'create_at',
		'value' => date('Y-m-d h:i',$model->created_at),
		'format' => 'yyyy-mm-dd hh:ii',
		'viewformat' => 'dd/mm/yyyy hh:ii',
		'datetimepicker' => [
			[
				'weekStart' => 1
			]
		],
	]
]); ?>
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
	'id' => 'select2-editable',
	'pluginOptions' => [
		'type' => 'select2',
		'value' => 'ru',
		'source'=> $items,
		'select2' => [
			'multiple' => true
		]
	]
]); ?>
```

ComboDate
------------

```
<?php

echo XEditable::widget([
	'id' => 'combodate-editable',
	'pluginOptions' => [
		'type' => 'combodate',
		'name' => 'create_at',
		'value' => date('Y-M-D',$model->created_at),
		'format' => 'YYYY-MM-DD',
		'viewformat' => 'DD.MM.YYYY',
		'template' => 'D / MMMM / YYYY',
		'combodate' => [
			[
				'minYear' => '2000',
                'maxYear' => '2015',
                'minuteStep' => '1'
			]
		],
		'pk' => $model->id,
	]
]); ?>
```

ComboDateTime
------------

```
<?php

echo XEditable::widget([
	'id' => 'combodatetime-editable',
	'pluginOptions' => [
		'type' => 'combodate',
		'name' => 'create_at',
		'value' => date('Y-M-D  HH:mm',$model->created_at),
		'format' => 'YYYY-MM-DD HH:mm',
		'viewformat' => 'DD.MM.YYYY HH:mm',
		'template' => 'D / MMMM / YYYY / HH:mm',
		'combodate' => [
			[
				'firstItem' => 'name',
			]
		],
	]
]); ?>
```

HTML Editor - WysiHtml5
------------

```
<?php

echo XEditable::widget([
	'id' => 'wysihtml5-editable',
	'pluginOptions' => [
		'type' => 'wysihtml5',
		'value' => 'Enter comments',
		'title' => 'Enter comments',
	]
]); ?>

```

GridView Column Editable
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
			'value'=>function($model) {
					return $model->active;
				},
			'class' => XEditableColumn::className(),
			'url' => 'editable',
			'dataType'=>'select',
			'editable'=>[
				'source'=>[
					['value'=>1,
						'text'=>Yii::t('app','On')],
					['value'=>0,
						'text'=>Yii::t('app','Off')]
				],
			],
			'attribute' => 'status',
			'format' => 'raw',
		],
		'title',
	]
]);
?>

```
