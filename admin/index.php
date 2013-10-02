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
<!--   <h3>Section 1</h3>
  <div>
    <p>
    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
    </p>
  </div>
  <h3>Section 2</h3>
  <div>
    <p>
    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
    suscipit faucibus urna.
    </p>
  </div> 
  <h3>Section 3</h3>
  <div>
    <p>
    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
    </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
  <h3>Section 4</h3>
  <div>
    <p>
    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
    mauris vel est.
    </p>
    <p>
    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
    inceptos himenaeos.
    </p>
  </div> -->
</div>
 
 
</body>
</html>

<script>

  for (var i=0;i<eveResponse._items.length;i++){
    console.log(eveResponse._items[i]);
    var h3 = document.createElement("h3");
    var h3Text = document.createTextNode(eveResponse._items[i].content[0].title  +" "+ eveResponse._items[i]._id);
    h3.appendChild(h3Text);
    document.getElementById("accordion").appendChild(h3);

    var div = document.createElement("div");
    
    //THIS CAN BE ITS OWN CLASS
    for (var key in eveResponse._items[i]){
      var pEle = document.createElement('p');

      if (typeof(eveResponse._items[i][key]) == "object"){
        var tempItem = document.createElement("p");
        for (var subKey in eveResponse._items[i][key]){
          console.log("Here" + subKey);
          var subpEle = document.createElement('p');
          var subresponseText = document.createTextNode(" "+subKey+': '+eveResponse._items[i][key][subKey]);
          subpEle.appendChild(subresponseText);
          tempItem.appendChild(subpEle);
        }
        pEle.appendChild(tempItem);
      
      }
      else{
        var responseText = document.createTextNode(key+': '+eveResponse._items[i][key]);
        pEle.appendChild(responseText);
        div.appendChild(pEle);
      }

    }

    document.getElementById("accordion").appendChild(div);

  }


  


</script>