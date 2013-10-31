<?php

$datatopost = array(
	"brand" => "Ray"

	);

print "Start";
$ch = curl_init("http://ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000/video/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datatopost);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //'Accept: application/json',                                                                       
    //'Content-Type: application/json',
    'Content-Type: application/x-www-form-urlencoded')                                                            
);           

print curl_exec($ch);


print "End";	


?>