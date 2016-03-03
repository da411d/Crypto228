<?
function _crypt($string, $key){
	$str = bin2hex($string);
	$arr_str = str_split($str, 4);

	$key = md5($key);

	$encrypted =  '';

	for($i=0;$i<count($arr_str);$i++){
		$a = $arr_str[$i];
		$b = md5(md5($i).md5($key));
		$encrypted .=  bin2hex(pack('H*',$a) ^ pack('H*',$b));
	}
	return base64_encode(hex2bin($encrypted));
}


function _decrypt($string, $key){
	$str = bin2hex(base64_decode($string));
	$arr_str = str_split($str, 4);
	$key = md5($key);

	$decrypted =  '';

	for($i=0;$i<count($arr_str);$i++){
		$a = $arr_str[$i];
		$b = md5(md5($i).md5($key));
		$decrypted .=  bin2hex(pack('H*',$a) ^ pack('H*',$b));
	}
	$decrypted = hex2bin($decrypted);
	return $decrypted;
}
