<?php
class Html
{
	protected $_attributes = [];
	protected $_tag;
	protected $_content;

	/* constructor */
	function __construct(){
	}

	protected function _getTag() : string 
	{
		return $this->_tag;
	}

	protected function _openTag() : string 
	{
		return "<" . $this->_getTag() . ">";
	}

	protected function _closeTag() : string 
	{
		return "</" . $this->_getTag() . ">";
	}

	protected function _encloseTags(string $content) : string 
	{
		if (empty($content))
		{
			return "<" . $this->_getTag() . "/>";
		} else {
			return $this->_openTag() . $content . $this->_closeTag();
		}
	}

	protected function _getContent() : string 
	{
		return $this->_content;
	}

	function getElement() : string 
	{
		return $this->_encloseTags((empty($this->_getContent()) ? "" : $this->_getContent()));
	}
}