<?php

$url = 'http://ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000/video/';
 	
	error_reporting(E_ALL);
	ini_set('display_errors', True);
/*	$url = 'http://ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000/video/';
	$json = file_get_contents($url);
	//print $json;
*/

?>
<table>
<?php 

/*foreach ($_POST as $key => $value) {
    echo "<tr>";
    echo "<td>";
    echo $key;
    echo "</td>";
    echo "<td>";
    echo $value;
    echo "</td>";
    echo "</tr>";
}

$jsonToSend = utf8_encode(json_encode($_POST));

print $jsonToSend;
print "<br><br>";
    
$ch = curl_init('http://ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000/video/'); 


curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonToSend);                                                                    
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //'Accept: application/json',                                                                       
    //'Content-Type: application/json',
    'Content-Type: application/x-www-form-urlencoded',
    'Accept-Encoding: gzip,deflate,sdch',                                                                               
    'Content-Length: ' . strlen($jsonToSend))                                                                       
);                 

$result = curl_exec($ch);

print $result;*/

?>
</table>


<?php //HOW TO MAKE REST CALLS IN PHP

//next example will insert new conversation
$service_url = $url;
$curl = curl_init($service_url);
$curl_post_data = array(
        "brand" => "Raymond"
        /*'message' => 'test message',
        'useridentifier' => 'agent@example.com',
        'department' => 'departmentId001',
        'subject' => 'My first conversation',
        'recipient' => 'recipient@example.com',
        'apikey' => 'key001'*/
);



$curl_post_data = 'item1={    "release_date": "2014-02-01-1541",   "brand": "Serena" }';

print ($curl_post_data);

print "<br><br>";
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                                                                                       
    'Content-Type: application/x-www-form-urlencoded'  
));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);

print $curl_response;

print "<br><br>";
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);




//END HOW TO MAKE REST CALLS IN PHP ?>




<script type="text/javascript">
//var eveResponse = JSON.parse('<?php Print($json); ?>');
//console.log(eveResponse);

</script>


<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Camfusion Video Meta Data API</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="videoMetaDataApi.css" />
  <!-- <link rel="stylesheet" href="/resources/demos/style.css" /> -->
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
</head>
<body>


<div id="accordion">
  <!-- Additions to element go here -->
</div>
 
 
</body>
</html>

<script>

function addElement(name, data){
  var tr = document.createElement("tr");
  var td1 = document.createElement("td");
  var tdTitle = document.createTextNode(name +":  ");
  td1.appendChild(tdTitle);
  var td2 = document.createElement("td");
  var tdData  = document.createElement("input");
  tdData.setAttribute("type", "text");
  tdData.setAttribute("value", data);
  tdData.setAttribute("name", name);
  td2.appendChild(tdData);
  tr.appendChild(td1);
  tr.appendChild(td2);
  return tr
}


var h3 = document.createElement("h3");
var addElementTitle = document.createTextNode("Video To Add");
h3.appendChild(addElementTitle);
document.getElementById("accordion").appendChild(h3);
var div = document.createElement("div");

var videoData = document.createElement("form");
videoData.setAttribute("action","index.php");
videoData.setAttribute("method", "post");
var table = document.createElement("table");

table.appendChild(addElement("brand", ''));
table.appendChild(addElement("release_date", ''));
table.appendChild(addElement("ovp", ''));
table.appendChild(addElement("views", ''));
table.appendChild(addElement("video_length", ''));
table.appendChild(addElement("premium", ''));
table.appendChild(addElement("promoted", ''));
table.appendChild(addElement("category", ''));

//table.appendChild(addElement("created", ''));
//table.appendChild(addElement("etag", ''));
table.appendChild(addElement("content", ''));



var submitButton = document.createElement("input");
submitButton.setAttribute("type", "submit");
submitButton.setAttribute("value", "Add");
table.appendChild(submitButton);



videoData.appendChild(table);
div.appendChild(videoData);
document.getElementById("accordion").appendChild(div);

</script>

