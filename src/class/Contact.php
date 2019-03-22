<?php

class Contact{
	/* constructor */
	function __construct(){}
	
	function getMain(){

		$html = "<div class='kolom kolom_content'>\n";
		$html .= "  <div class='content'>\n";
		$html .= "    <h2>Een sport met een rijke historie</h2>\n";
		$html .= "    <p>Een sport is niets zonder zijn historie en helden. Veel van wat er zich in de afgelopen honderd jaar (de KNBSB vierde in 2012 het honderdjarig bestaan) op de honkbal- en softbalvelden heeft voltrokken, vindt u terug in het Honkbal- en Softbal Museum, dat is gevestigd in het Pim Mulier Stadion in Haarlem. Voor de honkbal- en softballiefhebber is dit museum absoluut een bezoek waard.</p><br>\n";
		$html .= "    <h3>Adres</h3>\n";
		$html .= "    <p>Het honkbal en softbalmuseum is gehuisvest in het Pim Mulier Honkbalstadion te Haarlem. De museumruimte bevindt zich onder de hoofdtribune naast de 2e tribuneopgang.</p><br>\n";
		$html .= "    <h3>Openingstijden</h3>\n";
		$html .= "    <p>Het museum is geopend tijdens grote evenementen die plaatsvinden in het Pim Mulierstadion. Het museum is ook op afspraak te bezoeken.<br>Bezoekers die het museum buiten de evenementen willen bezoeken kunnen een telefonische afspraak maken voor bezichtiging.<br><br>Elly Nijhuis        tel 023 526 80 04</p><br>\n";

		$html .= "    <h3>Bestuur</h3>\n";
		$html .= "    <p>Het museumbestuur bestaat uit de volgende personen:</p>\n";

		$html .= "    <ul>\n";
		$html .= "      <li>Karel van Veen - voorzitter</li>\n";
		$html .= "      <li>Willem Broertjes - secretaris</li>\n";
		$html .= "      <li>Jose Snoeks - penningmeester</li>\n";
		$html .= "      <li>Elly Nijhuis - lid</li>\n";
		$html .= "      <li>Samuel de Leeuw - lid</li>\n";
		$html .= "      <li>Kwaliteitszetel KNBSB - lid</li>\n";
		$html .= "    </ul>\n";
		$html .= "    </br>\n";

		$html .= "    <h3>Contact</h3>\n";
		$html .= "    <p>Het correspondentieadres van het museum is:<br><br>Stichting Nederlands Honkbal en Softbal Museum<br>Houtwijkerveld 130<br>2131 MN Hoofddorp<br><br>E-mailadres: <a href=\"javascript:void(location.href='mailto:'+String.fromCharCode(104,111,110,107,101,110,115,111,102,116,98,97,108,109,117,115,101,117,109,104,97,97,114,108,101,109,64,103,109,97,105,108,46,99,111,109))\">honkensoftbalmuseumhaarlem@gmail.com</a></p>\n";
		$html .= "    </br>\n";
		$html .= "    <h3>Wilt u het museum financieel steunen?</h3>\n";
		$html .= "    <p>Voor slechts €12,50 bent u een jaar lang vriend of vriendin van het honkbal en softbalmuseum.</p>\n";
		$html .= "    <p>Donaties kunt u overmaken op onze ING-bankrekening met nummer:<br>NL86 INGB 0005 5071 02 tnv honkbal en softbalmuseum.</p>\n";
		$html .= "    </br>\n";
		$html .= "  </div>\n";
		$html .= "</div>\n";

		return $html;	
	}
	
}
?>