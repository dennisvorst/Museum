<?php
class Date{
	// this function reconstructs the date
    var $Date;
    var $DateIn;
    var $DateOut;
    var $Month;
    var $Day;
    var $Year;
    var $Weekday;

	/* constructor */
	function __construct(){
		/* Set locale to Dutch */
		//setlocale(LC_ALL, 'nld_nld');
	}

    function translateDate($DateIn, $Type){
        /* $datein = the date that must be translated
        $type is the type of conversion that must be done
        D = day, daynumber monthname yearnumber 	- 17 april 2014
        W = weekday, daynumber monthname yearnumber - donderdag, 17 april 2014
        NY = no year, daynumber monthname			-
        */


        $this->Date         = "" . $DateIn . "";
        $this->Year         = substr($this->Date, 0, 4);
        $this->Month        = intval(substr($this->Date, 5, 2));
        $this->Day          = intval(substr($this->Date, 8, 2));

        if ($this->Date == "0000-00-00" or empty($this->Date)){
			$this->DateOut = "";
			return;
        }

        /* check if the date is valid otherwise donot return is */
        if (!checkdate($this->Month, $this->Day, $this->Year)){
           return;
        }

        /*if date is equal to zero than leave dateout empty and return */
        if ($this->Date == "0000-00-00"){
            $this->DateOut = "";
        } else {
			// Determine the English weekabreviation
			// The mktime aggregates de date.
			if ($this->Year < 1970 and $Type == "W"){
				/* There is a problem with timestamps in Mysql and PHP
				Therefore it is only possible to create dates that are after 1970.
				The mktime command throws an error when the date is before 1970
				*/
				$Type               = "D";
				$this->Weekday      = "";
			} else {
				$this->Weekday    = strftime ("%A", mktime (0, 0, 0, $this->Month, $this->Day, $this->Year));
			}
			// calculate the month
			$this->GetMonth();

			// calculate the weekday
			$this->GetWeekday();

			// en de datum weer aan elkaar plakken
			if ($Type == "W") {
				$this->DateOut = "$this->Weekday, $this->Day $this->Month $this->Year";
			} elseif ($Type == "D") {
				$this->DateOut = "$this->Day $this->Month $this->Year";
			} elseif ($Type == "NY") {
				$this->DateOut = "$this->Day $this->Month";
			}//endif
        }//endif

		return $this->DateOut;
	}// function TranslateDate

	function GetMonthList(){
		$months = [1=>"januari", 2=>"februari", 3=>"maart", 4=>"april", 5=>"mei", 6=>"juni", 7=>"juli", 8=>"augustus", 9=>"september", 10=>"oktober", 11=>"november", 12=>"december"];
		return $months;
	}

	function GetDayList(){
		$days = [];
		for ($x=1; $x<32;$x++){
			$days[$x]   = $x;
		}
		return $days;
	}

	function GetMonth(){
		$months = $this->GetMonthList();
		if ($this->Month > 12 or $this->Month <1){
			//echo "Dit is geen geldige maand";
			return;
		} else {
			$this->Month    = $months[$this->Month];
		}
	}// function GetMonth

    function GetWeekday(){
        if (!empty($this->Weekday)){
			$weekdays = ["Monday"=>"maandag", "Tuesday"=>"dinsdag", "Wednesday"=>"woensdag", "Thursday"=>"donderdag", "Friday"=>"vrijdag", "Saturday"=>"zaterdag", "Sunday"=>"zondag"];
            $this->Weekday      = $weekdays[$this->Weekday];
        } else {
			$this->Weekday  = "";
        }
        return $this->Weekday;
    } //function GetWeekday
}
?>