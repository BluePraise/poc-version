<?php
$ip_addr = $_SERVER['REMOTE_ADDR'];
//$ip_addr =   '122.176.115.21';
$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );
if($geoplugin == "")
{
	$ch = curl_init();
	$timeout = 10;
	curl_setopt($ch,CURLOPT_URL,'http://www.geoplugin.net/php.gp?ip='.$ip_addr);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$geoplugin = unserialize(curl_exec($ch));
	curl_close($ch);
}
$lat = $geoplugin['geoplugin_latitude'];
$long = $geoplugin['geoplugin_longitude'];


$day=$_GET['day'];
$month=$_GET['month'];
$h=$_GET['h'];
$m=$_GET['m'];
$s=$_GET['s'];
$time=$h.":".$m.":".$s;


$geotime='';
$geotime = ( file_get_contents('http://www.earthtools.org/sun/'.$lat.'/'.$long.'/'.$day.'/'.$month.'/99/0') );
if($geotime == "")
{
	$ch = curl_init();
	$timeout = 10;
	curl_setopt($ch,CURLOPT_URL,'http://www.earthtools.org/sun/'.$lat.'/'.$long.'/'.$day.'/'.$month.'/99/0');
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$geotime = (curl_exec($ch));
	curl_close($ch);
}

$xml = simplexml_load_string($geotime);


 $sunrise =  ($xml->morning->sunrise);
 $sunset =($xml->evening->sunset);

 
if((strtotime($time) >= strtotime($sunrise)) && (strtotime($time) <= strtotime($sunset))){
echo "day";
}else{
 echo "night";

}



?>