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

class XEditableDateTime extends XEditable
{

	/**
	 * @see Xeditable
	 * @var string
	 * Type of input. select
	 */
	public $type = 'datetime';

	/**
	 * @see XEditable
	 * @var boolean|string
	 * Whether to show clear button
	 */
	public  $clear = 'x clear';

	/**
	 * @see XEditable
	 * @var object
	 * Configuration of datepicker. Full list of options: http://bootstrap-datepicker.readthedocs.org/en/latest/options.html
	 */
	public  $datepicker = '{ }';

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
	 * Format used for sending value to server. Also applied when converting date from data-value attribute.
	 * Possible tokens are: d, dd, m, mm, yy, yyyy
	 */
	public  $format = 'yyyy-mm-dd hh:ii';

	/**
	 * @see XEditable
	 * @var string
	 * Format used for displaying date. Also applied when converting date from element's text on init.
	 * If not specified equals to format
	 */
	public  $viewformat = null;

	/**
	 * @see XEditable
	 * @var string
	 * HTML template of input. Normally you should not change it.
	 */
	public  $tpl = '<div></div>';

	/**
	 * @see Xeditable
	 * @see Init extension default
	 */
	public function init()
	{
		parent::init();
		$this->registerAssets();
	}

	/**
	 * @see Xeditable
	 * @see Load extension with all settings
	 */
	public function settings()
	{

	}

	/**
	 * @see Xeditable
	 * @see Init extension default
	 */
	public function registerAssets()
	{
		DateTimePickerAsset::register($this->view);
	}

}
