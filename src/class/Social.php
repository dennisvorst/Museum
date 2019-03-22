<?php
class Social{
	/* constructor */
	function __construct(){
	}

	static function addShareButtons($fturl){
    	/* create a dashboard of social media buttons */
		$html = "<table>";
		$html .= "<td>";
		$html .= "<th>" . Social::addShareTwitterButton($fturl) . "</th>";
		$html .= "<th>" . Social::addShareFacebookButton($fturl) . "</th>";
		$html .= "<th>" . Social::addShareLinkedinButton($fturl) . "</th>";
		$html .= "</td>";
		$html .= "</table>";

		return $html;
    }
    static function addShareTwitterButton($fturl){
    	/* add a share on twitter button */

		$html = "<a href='https://twitter.com/share' ";
		$html .= "class='twitter-share-button' ";
		$html .= "data-url='www.honkbalmuseum.nl' ";
		$html .= "data-text='www.honkbalmuseum.nl/$fturl' ";
		$html .= "data-via='honkbalmuseum' ";
		$html .= "data-related='honkbalmuseum' ";
//		$html .= "data-hashtags='honkbalmuseum' ";
		$html .= ">Tweet</a>";
		$html .= "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
		return $html;

		return $html;

   	}

	static function addFacebookPrefix(){
		/* this code should be right after the <body> tag in order for the facebook share button to work.
		https://developers.facebook.com/docs/plugins/share-button
		*/
		$html = "<div id='fb-root'></div>";
		$html .= "<script>(function(d, s, id) {";
		$html .= "var js, fjs = d.getElementsByTagName(s)[0];";
		$html .= "  if (d.getElementById(id)) return;";
		$html .= "  js = d.createElement(s); js.id = id;";
		$html .= "  js.src = '//connect.facebook.net/nl_NL/sdk.js#xfbml=1&appId=1498132420447233&version=v2.0';";
		$html .= "  fjs.parentNode.insertBefore(js, fjs);";
		$html .= "}(document, 'script', 'facebook-jssdk'));</script>";
		return $html;
	}

	static function addShareFacebookButton($fturl){
		/* share the content using facebook
		https://developers.facebook.com/docs/plugins/share-button
		*/
		$html = "<div class='fb-share-button' ";
		$html .= "data-href='http://www.honkbalmuseum.nl/$fturl' ";
		$html .= "data-layout='button_count'></div>";

		return $html;
	}
    static function addShareLinkedinButton($fturl){
		/*
		add a share button for linked in
		https://developer.linkedin.com/plugins/share-plugin-generator?button-type-count-right=true
		*/
		$html = "<script src='//platform.linkedin.com/in.js' ";
		$html .= "type='text/javascript'>  lang: en_US</script> ";
		$html .= "<script type='IN/Share' data-url='www.honkbalmuseum.nl/$fturl' data-counter='right'></script>";
		return $html;
	}
}