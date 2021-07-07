<?php
class PageView
{
    function __construct()
    {
    }

    protected function _getUrl(array $items)
	{
		/* create the url */
		$keys = array_keys($items);
		$url = "";

		foreach ($keys as $key)
		{
			if (empty($url)){
				$url = $key . "=" . $items[$key];
			} else {
				if (!empty($key) && !empty($items[$key]))
				{
					$url = $url . "&" . $key . "=" . $items[$key];
				}
			}
		}
		return "index.php?" . $url;
	}

	function getId() : int
	{
		return $this->_id;
	}
}
?>