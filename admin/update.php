Working
<table>
<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', True);

/*    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }*/


?>
</table>


<?php

	


$url = 'http://ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000/video/';
$json = file_get_contents($url);
	//print $json;

?>