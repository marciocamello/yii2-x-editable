<?php

/**
 * XeditableText class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\xeditable;

class XEditableSelect extends XEditable
{

	/**
	 * @see Xeditable
	 * @var string
	 * Type of input. select
	 */
	public $type = 'select';

	/**
	 * @see XEditable
	 * @var boolean
	 * If true - html will be escaped in content of element via $.text() method.
	 * If false - html will not be escaped, $.html() used.
	 * When you use own display function, this option obviosly has no effect.
	 */
	public  $escape = true;

	/**
	 * @see XEditable
	 * @var string
	 * CSS class automatically applied to input
	 */
	public  $inputclass = null;

	/**
	 * @see XEditable
	 * @var string | array | object | function
	 * Data automatically prepended to the beginning of dropdown list.
	 */
	public  $prepend = false;

	/**
	 * @see XEditable
	 * @var string | array | object | function
	 * Source data for list.
	 * If array - it should be in format: [{value: 1, text: "text1"}, {value: 2, text: "text2"}, ...]
	 * For compability, object format is also supported: {"1": "text1", "2": "text2" ...} but it does not guarantee elements order.
	 *
	 * If string - considered ajax url to load items. In that case results will be cached for fields with the same source and name. See also sourceCache option.
	 *
	 * If function, it should return data in format above (since 1.4.0).
	 *
	 * Since 1.4.1 key children supported to render OPTGROUP (for select input only).
	 * [{text: "group1", children: [{value: 1, text: "text1"}, {value: 2, text: "text2"}]}, ...]
	 */
	public  $source = null;

	/**
	 * @see XEditable
	 * @var boolean
	 * if true and source is string url - results will be cached for fields with the same source.
	 * Usefull for editable column in grid to prevent extra requests.
	 */
	public  $sourceCache = true;

	/**
	 * @see XEditable
	 * @var string
	 * Error message when list cannot be loaded (e.g. ajax error)
	 */
	public  $sourceError = null;

	/**
	 * @see XEditable
	 * @var object|function
	 * Additional ajax options to be used in $.ajax() when loading list from server.
	 * Useful to send extra parameters (data key) or change request method (type key).
	 */
	public  $sourceOptions = null;

	/**
	 * @see XEditable
	 * @var string
	 * HTML template of input. Normally you should not change it.
	 */
	public  $tpl = '<select></select>';

    /**
     * ```
     * <?= $form->field($model, 'status')->widget(\mcms\xeditable\XEditableSelect::className(),[
     * 'model' => $model,
     * 'placement' => 'right',
     * 'pluginOptions' => [
     * 'name' => 'status',
     * 'source'=>[
     * ['value'=>1,'text'=>Yii::t('app','On')],
     * ['value'=>0,'text'=>Yii::t('app','Off')]],
     * ],]) ?>
     * ```
     * using for ActiveFormFields
     * @var string
     */
    public $attribute;

}
