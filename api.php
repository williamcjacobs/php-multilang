<?php

require 'MultiLang.php';

$ml = new MultiLang($use_cookies=false, $untranslated_logging=true);

//Return Data - To be json encoded and echo'd.
$rd = [];


if(isset($_REQUEST['lang'])){

	if(strlen(''.$_REQUEST['lang'])==2){

		$ml->setLanguage($_REQUEST['lang']);
	}
}

if(isset($_REQUEST['tr'])){

	$tr_str = ''.$_REQUEST['tr'];

	$rd['text'] = $ml->tr($tr_str);
	$rd['translated'] = $ml->translated();
	$rd['language'] = $ml->language();
}


//Echo the Return Data
echo json_encode($rd);

exit();