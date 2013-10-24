<?php

	
	error_reporting(E_ALL);
	ini_set('display_errors', True);

	$url = 'http://ec2-54-214-42-17.us-west-2.compute.amazonaws.com:5000/video/';

	$json = file_get_contents($url);
	//print $json;


?>


<script type="text/javascript">
var eveResponse = JSON.parse('<?php Print($json); ?>');
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

  for (var i=0;i<eveResponse.length;i++){
    video = eveResponse[i];  

    //Video Title Start
    console.log(eveResponse[i]);
    var h3 = document.createElement("h3");
    var title = "";   //Sets title
    if (video.content.length > 0){
      for (item in video.content){
        if (video.content[item].language == "English"){
          title = video.content[item]["title"]
        }
      }
    }
    var videoTitle = document.createTextNode(title  +" - "+ video._id);
    h3.appendChild(videoTitle);
    document.getElementById("accordion").appendChild(h3);
    //Video Title End

    var div = document.createElement("div");
    var videoData = document.createElement("form");
    videoData.setAttribute("action","update.php");
    videoData.setAttribute("method", "post");
    var table = document.createElement("table");

    table.appendChild(addElement("category", video.category));
    table.appendChild(addElement("brand", video.brand));
    table.appendChild(addElement("created", video.created));
    table.appendChild(addElement("etag", video.etag));
    table.appendChild(addElement("release_date", video.release_date));
    table.appendChild(addElement("views", "N/C"));
    table.appendChild(addElement("premium", "N/C"));
    table.appendChild(addElement("promoted", "N/C"));

    var submitButton = document.createElement("input");
    submitButton.setAttribute("type", "submit");
    submitButton.setAttribute("value", "Update");
    table.appendChild(submitButton);

    videoData.appendChild(table);
    div.appendChild(videoData);
    document.getElementById("accordion").appendChild(div);

  }  



  


</script>

