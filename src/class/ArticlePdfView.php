<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once('3rd/fpdf/fpdf.php');

class ArticlePdfView extends FPDF
{
	/** fpdf properties */
	protected $col = 0; // Current column
	protected $y0;      // Ordinate of column start

	/** properties */
	protected $_source;
	protected string $_sourceName = "Source name";

	protected string $_mainTitle = "Main Title";
	protected string $_subTitle = "Sub Title";
	protected string $_subSubTitle = "Sub Sub Title";
	protected string $_publishDate = "Publish date";
	protected string $_authorName = "Author"; 
	protected string $_text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
	protected $_outputFolder = "../output/articles/";


	function __construct(string $json)
	{
		parent::__construct();

		$data = json_decode($json);
	//	$article = $data['stdClass'];

		$this->_mainTitle 	= (isset($data->article->mainTitle) ? $data->article->mainTitle : "");
		$this->_subTitle 	= (isset($data->article->subTitle) ? $data->article->subTitle : "");
		$this->_subSubTitle = (isset($data->article->subSubTitle) ? $data->article->subSubTitle : "");
		$this->_publishDate = (isset($data->article->publishDate) ? $data->article->publishDate : "");
		$this->_authorName 	= (isset($data->article->authorName) ? $data->article->authorName : "");
		$this->_text 		= (isset($data->article->text) ? $data->article->text : "");

		$this->_write();
	}


	protected function _write()
	{
//		$this->_pdf = new FPDF();
		$this->AddPage();
		$this->_writeSource();
		$this->_writeMainTitle();
		$this->_writeSubTitle();
		$this->_writeSubSubTitle();
		$this->_writePublishDateAndAuthor();
		$this->_writeText();
		
		// write to file 
		$this->Output($this->_createFileName(), "F");
		// write to browser 
//		$this->Output();
	}


	/** creators */
	protected function _createFileName() : string
	{
		$publishDateYmd = "20220415";
		$notAllowed = array("#", "\%", "&", "{", "}", "<", ">", "*", "?", "$", "!", "'", "\"", ":", "@", "+", "`", "|", "=", "/", "\\");

		/** filename must not exceed 255 chars */
		$fileName =  $publishDateYmd . " - " . $this->_sourceName . " - " . $this->_mainTitle;
		$fileName = str_replace($notAllowed, "_", $fileName);
		$fileName = $this->_outputFolder . $fileName;
	
		if (strlen($fileName) > 251)
		{
			$fileName = substr($fileName, 0, 250) ;
		}
		$fileName .= ".pdf";

		$i = 1;
		while (file_exists($fileName)) 
		{
			/** add a number */
			$fileName =  $publishDateYmd . " - " . $this->_sourceName . " - " . $this->_mainTitle . "_" . $i;
			$fileName = str_replace($notAllowed, "_", $fileName);
			$fileName = $this->_outputFolder . $fileName;

			if (strlen($fileName) > 249)
			{
				// cut is short enough so we can add the _1
				$fileName = substr($fileName, 0, 248) . "_" . $i;
			}

	
			$fileName .= ".pdf";
			$i++;
		}

		/** replace the not allowed characters */
//		$notAllowed = array("#", "\%", "&", "{", "}", "<", ">", "*", "?", "/", "$", "!", "'", "\"", ":", "@", "+", "`", "|", "=", "\\");


		return $fileName;
	}

	/** write the individual sections  */
	protected function _writeSource()
	{
		$this->SetFont('Arial','B',20);
		$this->Cell(0, 20, $this->_source, 0, 1, "C", false);
	}

	protected function _writeMainTitle()
	{
		if (!empty($this->_mainTitle)) 
		{
			$this->SetFont('Arial','B',16);
			$this->Cell(0, 10, $this->_mainTitle, 0, 1, "C", false);
		}
	}

	protected function _writeSubTitle()
	{
		if (!empty($this->_subTitle)) 
		{
			$this->SetFont('Arial','B',14);
			$this->Cell(0, 10, $this->_subTitle, 0, 1, "C", false);
		}
	}

	protected function _writeSubSubTitle()
	{
		if (!empty($this->_subSubTitle)) 
		{
			$this->SetFont('Arial','B',12);
			$this->Cell(0, 10, $this->_subSubTitle, 0, 1, "C", false);
		}
	}

	protected function _writePublishDateAndAuthor()
	{
		/** print the publish dayte and authorname on the same line */
		if (!empty($this->_publishDate) || !empty($this->_authorName)) 
		{
			$this->SetFont('Arial','B',12);
			/**
			 * if both are empty we print nothing
			 * when we get here either both or one is filled. 
			 * if the authorname is filled then we write the nextline there 
			 */
			if (empty($this->_authorName))
			{
				/** then the publishDate has a value */
				$this->Cell(0, 10, $this->_publishDate, 0, 1, "L", false);
			}
			else
			{
				if (!empty($this->_publishDate))
				{
					$this->Cell(0, 10, $this->_publishDate, 0, 0, "L", false);
				}
				$this->Cell(0, 10, $this->_authorName, 0, 1, "R", false);		
			}
		}
	}

	protected function _writeText()
	{	
		/** Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]) */
/**
 		$this->_pdf->SetFont('Arial', null, 12);
		$this->_pdf->Cell(60, 200, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 1, 0, "L", false);
		$this->_pdf->Cell(60, 200, "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?", 1, 0, "L", false);
		$this->_pdf->Cell(60, 200, "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat", 1, 1, "L", false);

 */
	
		if (!empty($this->_text)) 
		{
			// on the first page we start the columns at 50 down 
			$this->y0 = 50;

			// Font
			$this->SetFont('Times', '', 12);
			// Output text in a 6 cm width column
			$this->MultiCell(60, 5, $this->_text);
			$this->Ln();
			// Mention
			$this->SetFont('', 'I');
			$this->Cell(0, 5, '(einde)');
			// Go back to first column
			$this->SetCol(0);			
		}
	}

	/** overriden */
	function Footer()
	{
		// Page footer
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->SetTextColor(128);
		$this->Cell(0,10,'Page ' . $this->PageNo(),0,0,'C');
	}

	function SetCol($col)
	{	
		// Set position at a given column
		$this->col = $col;
		$x = 10 + $col * 65;
		$this->SetLeftMargin($x);
		$this->SetX($x);
	}

	function AcceptPageBreak()
	{
		// Method accepting or not automatic page break
		//	print_r("AcceptPageBreak $this->col " . $this->col) ;
		if($this->col < 2)
		{
			// Go to next column
			$this->SetCol($this->col+1);
			// Set ordinate to top
			$this->SetY($this->y0);
			// Keep on page
			return false;
		}
		else
		{
			// Go back to first column
			$this->SetCol(0);
			// Page break
			return true;
		}
	}

}
?>