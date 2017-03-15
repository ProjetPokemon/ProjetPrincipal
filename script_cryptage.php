<?php

$str = 'mot';
$newStr = "";

$str = sha1($str);

for($i = 0; $i < strlen($str); $i++){
	$codeAsciiChar = ord(substr(($str), $i, 1));
	$newStr = $newStr.chr($codeAsciiChar + 2);
}

echo sha1($newStr);

?>