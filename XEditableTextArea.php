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

class XEditableTextArea extends XEditable
{

	public $type = 'textarea';
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
	 * @var string
	 * Placeholder attribute of input. Shown when input is empty.
	 */
	public  $placeholder = null;

	/**
	 * @see XEditable
	 * @var integer
	 * Number of rows in textarea
	 */
	public  $rows = 7;

	/**
	 * @see XEditable
	 * @var string
	 * HTML template of input. Normally you should not change it.
	 */
	public  $tpl = '<textarea></textarea>';

	

}
