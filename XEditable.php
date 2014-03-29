<?php

namespace mcms\xeditable;

use yii\bootstrap\BootstrapAsset;
use yii\web\View;

class XEditable extends \yii\base\widget
{
    /**
     * Initializes the widget
     * @throw InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->registerAssets();
    }

    public function run()
    {
        return '<a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select gender" class="editable-click" style="color: gray;" data-original-title="" title="">not selected</a>';
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
		$this->view = \Yii::$app->getView();
		XEditableAsset::register($this->view);

        $js = '
			$.fn.editableform.engine = "bs3";
			$.fn.editable.defaults.mode = "popup";
			$.fn.editable.defaults.ajaxOptions = {type: "PUT"};

			$("#username").editable();

			$("#sex").editable({
			prepend: "not selected",
			source: [
				{value: 1, text: "Male"},
				{value: 2, text: "Female"}
			],
			display: function(value, sourceData) {
			var colors = {"": "gray", 1: "green", 2: "blue"},
					 elem = $.grep(sourceData, function(o){return o.value == value;});

				 if(elem.length) {
					 $(this).text(elem[0].text).css("color", colors[value]);
				 } else {
					 $(this).empty();
				 }
			}
		});';


		$this->view->registerJs($js);
	}
}
