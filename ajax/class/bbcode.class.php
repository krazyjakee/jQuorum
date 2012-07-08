<?php
function bbcodeParser($bbcode){
/*
*
*	bbCode Parser
*
*	Syntax: bbcodeParser(bbcode)
*/

/*
Commands include
* bold
* italics
* underline
* typewriter text
* strikethough
* images
* urls
* quotations
* code (pre)
* colour
* size
*/

/* Matching codes */
$urlmatch = "([a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+)";

/* Basically remove HTML tag's functionality */
$bbcode = htmlspecialchars($bbcode);

/* Replace "special character" with it's unicode equivilant */
$match["special"] = "/\?/s";
$replace["special"] = '&amp;#65533;';

/* Bold text */
$match["b"] = "/\[b\](.*?)\[\/b\]/is";
$replace["b"] = "<b>$1</b>";

/* Italics */
$match["i"] = "/\[i\](.*?)\[\/i\]/is";
$replace["i"] = "<i>$1</i>";

/* Underline */
$match["u"] = "/\[u\](.*?)\[\/u\]/is";
$replace["u"] = "<span style=\"text-decoration: underline\">$1</span>";

/* Typewriter text */
$match["tt"] = "/\[tt\](.*?)\[\/tt\]/is";
$replace["tt"] = "<span style=\"font-family:monospace;\">$1</span>";

$match["ttext"] = "/\[ttext\](.*?)\[\/ttext\]/is";
$replace["ttext"] = "<span style=\"font-family:monospace;\">$1</span>";

/* Strikethrough text */
$match["s"] = "/\[s\](.*?)\[\/s\]/is";
$replace["s"] = "<span style=\"text-decoration: line-through;\">$1</span>";

/* Color (or Colour) */
$match["color"] = "/\[color=([a-zA-Z]+|#[a-fA-F0-9]{3}[a-fA-F0-9]{0,3})\](.*?)\[\/color\]/is";
$replace["color"] = "<span style=\"color: $1\">$2</span>";

$match["colour"] = "/\[colour=([a-zA-Z]+|#[a-fA-F0-9]{3}[a-fA-F0-9]{0,3})\](.*?)\[\/colour\]/is";
$replace["colour"] = $replace["color"];

/* Size */
$match["size"] = "/\[size=([0-9]+(%|px|em)?)\](.*?)\[\/size\]/is";
$replace["size"] = "<span style=\"font-size: $1;\">$3</span>";

/* Images */
$match["img"] = "/\[img\]".$urlmatch."\[\/img\]/is";
$replace["img"] = "<img src=\"$1\" />";

/* Links */
$match["url"] = "/\[url=".$urlmatch."\](.*?)\[\/url\]/is";
$replace["url"] = "<a href=\"$1\">$2</a>";

$match["surl"] = "/\[url\]".$urlmatch."\[\/url\]/is";
$replace["surl"] = "<a href=\"$1\">$1</a>";

/* Quotes */
$match["quote"] = "/\[quote\](.*?)\[\/quote\]/ism";
$replace["quote"] = "<div class=\"bbcode-quote\">?$1?</div>";

$match["quote"] = "/\[quote=(.*?)\](.*?)\[\/quote\]/ism";
$replace["quote"] = "<div class=\"bbcode-quote\"><span class=\"bbcode-quote-user\" style=\"font-weight:bold;\">$1 said:</span><br />?$2?</div>";

/* Parse */
$bbcode = preg_replace($match, $replace, $bbcode);

/* New line to <br> tag */
$bbcode=nl2br($bbcode);

/* Code blocks - Need to specially remove breaks */
function pre_special($matches)
{
	$prep = preg_replace("/\<br \/\>/","",$matches[1]);
	return "?<pre>$prep</pre>?";
}
$bbcode = preg_replace_callback("/\[code\](.*?)\[\/code\]/ism","pre_special",$bbcode);


/* Remove <br> tags before quotes and code blocks */
$bbcode=str_replace("?<br />","",$bbcode);
$bbcode=str_replace("?","",$bbcode); //Clean up any special characters that got misplaced...

/* Return parsed contents */
return $bbcode;
}
?>