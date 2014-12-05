<?php 
function remove_utf8_bom($text)
{
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}

$asdf = file_get_contents("json.txt");
$asdf1 = remove_utf8_bom($asdf);
var_dump  (json_decode($asdf1,true));

?>