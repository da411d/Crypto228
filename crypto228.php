<?
function _crypt($unencoded, $key){
	$string=base64_encode($unencoded);
	$arr=array();
	$x=0;
	while ($x++< strlen($string)) {
		$arr[$x-1] = md5(md5($key.$string[$x-1]).$key);
		$newstr = $newstr.substr($arr[$x-1], 5, 6);
	}
	$newstr=base64_encode(hex2bin($newstr));
	return $newstr;
}

function _decrypt($encoded, $key){
	$encoded = bin2hex(base64_decode($encoded));
	$strofsym="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM=";
	$x=0;
	while ($x++<= strlen($strofsym)) {
		$tmp = md5(md5($key.$strofsym[$x-1]).$key);
		$encoded = str_replace(substr($tmp, 5, 6), $strofsym[$x-1], $encoded);
	}
	return base64_decode($encoded) ;
}
