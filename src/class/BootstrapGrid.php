<?php
class BootstrapGrid
{
    protected $_collection = [];
    protected $_numberColumns;
    protected $_numberRows;

    function __construct(array $collection, int $numberColumns)
    {
        if (empty($collection) || empty($numberColumns))
        {
            throw new exception(__METHOD__ . ": Parameters are empty");
        }
        $this->_collection = $collection;
        $this->_numberColumns = $numberColumns;

        $this->_numberRows = ceil(count($collection) / $numberColumns);
    }

    function show() : string
    {
        /** print the collection */
        $html = "<div class='container'>\n";
        for ($j = 0; $j < $this->_numberRows; $j++){

            /** print the rows  */
            $html .="<div class='row'>\n";

            /** print the columns */
            for ($i = ($j * $this->_numberColumns) ; $i < ($j+1) * $this->_numberColumns; $i++)
            {
                $html .="<div class='col'>\n";
                $html .= (isset($this->_collection[$i]) ? $this->_collection[$i]: "");
                $html .="</div>\n";				  
            }
            $html .="</div>\n";

        }
        $html	.= "</div>\n";

		return $html;

    }
}