<?php

// php wrapper for iif server file
// frontend: <img src="iifjpgdock.php?size=big&amp;ident=image2">

$sizes = array("thumbs94" => 94,"thumbs" => 128,"standard" => 512,"big" => 1024,"highres" => "full");
$ident =@$_GET['ident'];
// $ident = str_replace("%2B","+",$ident);
$ident = str_replace(" ","+",$ident);

$callPrefix = "http://localhost:8000/fcgi-bin/iipsrv.fcgi?IIIF=";

$identifier = "imageStorage/ecpo_new/".$ident.".tif";
// = physical path: c://data/images/imageStorage/ecpo_new/

$sizeHint = (@$_GET['size']?$_GET['size']:"thumbs");
$sizeString = "!" . $sizes[$sizeHint] . "," . $sizes[$sizeHint];

if (!is_numeric($sizes[$sizeHint])) $sizeString = $sizes[$sizeHint]; 

$iiifURL = $callPrefix . rawurlencode(rawurlencode($identifier) . "/full/" . $sizeString  . "/0/default.jpg");
 // echo $iiifURL;
 // exit();

$handle = @fopen($iiifURL, "rb");
if ($handle != false) {
	$metadata = stream_get_meta_data($handle);
	// set header: Content-Type
	header($metadata['wrapper_data'][1]);
	echo stream_get_contents($handle);
	fclose($handle);
} else {
	if ($sizeHint == "standard" || $sizeHint == "big") {
		$handle = @fopen("./_tpl/responsive/grafics/no_photo_mag_standard.png", "rb");
	} elseif ($sizeHint == "thumbs94"){
		$handle = @fopen("./_tpl/responsive/grafics/no_photo_mag_94.png", "rb");
	} else {
		$handle = @fopen("./_tpl/responsive/grafics/no_photo_mag.png", "rb");
	}
// $metadata = stream_get_meta_data($handle);
// header($metadata['wrapper_data'][1]);
header("Content-type: image/jpeg");
echo stream_get_contents($handle);
fclose($handle);
// echo "failed";
}
?>
