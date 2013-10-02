<!doctype html>
 
<?php
error_reporting(E_ALL);
ini_set('display_errors', True);

$url = 'http://192.168.1.131:5000/video/';

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
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
  
  function addObject(object){
    console.log("in add object");
    console.log(object);
  }

  for (var i=0;i<eveResponse._items.length;i++){

    var h3 = document.createElement("h3");
    var h3Text = document.createTextNode(eveResponse._items[i].content[0].title  +" "+ eveResponse._items[i]._id);
    h3.appendChild(h3Text);
    document.getElementById("accordion").appendChild(h3);

    var div = document.createElement("div");
    
    //THIS CAN BE ITS OWN CLASS
    for (var key in eveResponse._items[i]){
      var pElemInDiv = document.createElement('p');

      if (typeof(eveResponse._items[i][key]) == "object"){
        //div.appendChild(addObject(eveResponse._items[i][key]));
        addObject(eveResponse._items[i][key])
        
      }
      else{
        var responseText = document.createTextNode(key+': '+eveResponse._items[i][key]);
        pElemInDiv.appendChild(responseText);
        div.appendChild(pElemInDiv);
      }
      

    }

    document.getElementById("accordion").appendChild(div);

  }


  


</script>