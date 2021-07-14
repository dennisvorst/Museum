<?php

class ContactView
{

	function __construct()
	{
	}

	function show() : string
	{
		return "
			<div class='kolom kolom_content'>
				<div class='content'>
					<h2>Een sport met een rijke historie</h2>
					<p>Een sport is niets zonder zijn historie en helden. Veel van wat er zich in de afgelopen honderd jaar (de KNBSB vierde in 2012 het honderdjarig bestaan) op de honkbal- en softbalvelden heeft voltrokken, vindt u terug in het Honkbal- en Softbal Museum, dat is gevestigd in het Pim Mulier Stadion in Haarlem. Voor de honkbal- en softballiefhebber is dit museum absoluut een bezoek waard.</p><br>
					<h3>Adres</h3>
					<p>Het honkbal en softbalmuseum is gehuisvest in het Pim Mulier Honkbalstadion te Haarlem. De museumruimte bevindt zich onder de hoofdtribune naast de 2e tribuneopgang.</p><br>
					<h3>Openingstijden</h3>
					<p>Het museum is geopend tijdens grote evenementen die plaatsvinden in het Pim Mulierstadion. Het museum is ook op afspraak te bezoeken.<br>Bezoekers die het museum buiten de evenementen willen bezoeken kunnen een telefonische afspraak maken voor bezichtiging.<br><br>Elly Nijhuis        tel 023 526 80 04</p><br>

					<h3>Bestuur</h3>
					<p>Het museumbestuur bestaat uit de volgende personen:</p>

					<ul>
						<li>Karel van Veen - voorzitter</li>
						<li>Willem Broertjes - secretaris</li>
						<li>Jose Snoeks - penningmeester</li>
						<li>Elly Nijhuis - lid</li>
						<li>Samuel de Leeuw - lid</li>
						<li>Kwaliteitszetel KNBSB - lid</li>
					</ul>
					<br>

					<h3>Contact</h3>
					<p>Het correspondentieadres van het museum is:<br><br>Stichting Nederlands Honkbal en Softbal Museum<br>Houtwijkerveld 130<br>2131 MN Hoofddorp<br><br>E-mailadres: <a href=\"javascript:void(location.href='mailto:'+String.fromCharCode(104,111,110,107,101,110,115,111,102,116,98,97,108,109,117,115,101,117,109,104,97,97,114,108,101,109,64,103,109,97,105,108,46,99,111,109))\">honkensoftbalmuseumhaarlem@gmail.com</a></p>
					<br>
					<h3>Wilt u het museum financieel steunen?</h3>
					<p>Voor slechts €12,50 bent u een jaar lang vriend of vriendin van het honkbal en softbalmuseum.</p>
					<p>Donaties kunt u overmaken op onze ING-bankrekening met nummer:<br>NL86 INGB 0005 5071 02 tnv honkbal en softbalmuseum.</p>
					<br>
				</div>
			</div>
			  
		";

	}

	function showThumbnail() : String
	{
		throw new exception("Not implemented.");
	}

}
?>