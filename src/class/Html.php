<?php
class Html
{
	protected $_allowedAttr = [];
	protected $_attributes = [];
	protected $_tag;
	protected $_content;
	protected $_isEmptyElement = false;

	/* global HTML: attributes */
	protected $_globalAttr = ["accesskey", "class", "contenteditable", "contextmenu", "dir", "draggable", "hidden", "id", "lang", "spellcheck", "style", "tabindex", "title"];
	
	/* event attributes */
	protected $_eventAttr = ["onabort", "onblur", "oncanplay", "oncanplaythrough", "onchange", "onclick", "oncontextmenu", "ondblclick", "ondrag", "ondragend", "ondragenter", "ondragleave", "ondragover", "ondragstart", "ondrop", "ondurationchange", "onemptied", "onended", "onerror", "onfocus", "onformchange", "onforminput", "oninput", "oninvalid", "onkeydown", "onkeypress", "onkeyup", "onload", "onloadeddata", "onloadedmetadata", "onloadstart", "onmousedown", "onmousemove", "onmouseout", "onmouseover", "onmouseup", "onmousewheel", "onpause", "onplay", "onplaying", "onprogress", "onratechange", "onreadystatechange", "onscroll", "onseeked", "onseeking", "onselect", "onshow", "onstalled", "onsubmit", "onsuspend", "ontimeupdate", "onvolumechange", "onwaiting"];

	/* constructor */
	function __construct(string $tag){
		$this->_tag = $tag;
	}

	protected function _getTag() : string 
	{
		return $this->_tag;
	}

	protected function _openTag() : string 
	{
		return "<" . $this->_getTag() . $this->_getAttributes() . ">";
	}

	protected function _closeTag() : string 
	{
		return "</" . $this->_getTag() . ">";
	}

	protected function _encloseTags(string $content) : string 
	{
		if ($this->_isEmptyElement)
		{
			return $this->_openTag();
		} else {
			return $this->_openTag() . $content . $this->_closeTag();
		}
	}

	protected function _getContent() : string
	{
		return (empty($this->_content) ? "" : $this->_content);
	}

	function getElement() : string 
	{
		return $this->_encloseTags((empty($this->_getContent()) ? "" : $this->_getContent()));
	}

	protected function _getAllowedAllAttr() : array
	{
		$this->_allowedAttr  = array_merge($this->_allowedAttr, $this->_globalAttr, $this->_eventAttr);
		return $this->_allowedAttr;
	}

	/* set the attrivbutes that are allowed in the html */
	protected function _setAttributes(array $attr = null) : array
	{
		if (empty($this->_attributes))
		{
			if (!empty($attr)) 
			{
				$keys = array_intersect(array_keys($attr), $this->_allowedAttr);
				foreach ($keys as $key)
				{
					$this->_attributes[$key] = $attr[$key];
				}
			}
		}
		return (empty($this->_attributes) ? [] : $this->_attributes);
	}

	/* turn the attributes into an HTML string */
	protected function _getAttributes() : string
	{
		$html = "";
		if (!empty($this->_attributes))
		{
			$keys = array_keys($this->_attributes);
			foreach ($keys as $key)
			{
				$html .= " " . $key . "='" . $this->_attributes[$key] . "'";
			}
		} 
		return $html;
	}
}