<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

      <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>

      <script type="text/javascript">

         var map = null;         

         function GetMap()
         {
            // Initialize the map
            map = new Microsoft.Maps.Map(document.getElementById("myMap"),
                         {credentials:"AilWSj2UmMiUAy9AvYInXBRM5tjxt2Qb3xnCgxP7xzLBxby1zavruJ5LHDCgXV_j"}); 

            // Retrieve the location of the map center 
            var center = map.getCenter();
            
            // Add a pin to the center of the map
            var pin = new Microsoft.Maps.Pushpin(center, {draggable: true}); 

            // Add a handler to the pushpin drag
            Microsoft.Maps.Events.addHandler(pin, 'mouseup', DisplayLoc);

            map.entities.push(pin);
         }

         function DisplayLoc(e){
            if (e.targetType == 'pushpin'){

               var pinLoc = e.target.getLocation();
               //alert("The location of the pushpin is now " + pinLoc.latitude + ", " + pinLoc.longitude);

            }
}

      </script>
   </head>
   <body onload="GetMap();">
      <div id='myMap' style="position:relative; width:600px; height:400px;"></div>
      <b>Drag the pushpin to a new location.</b>       
   </body>
</html>
<?php
//onclick load specified content into a div with higher z-index placed at the offset().left and offset().top of the pushpin.
?>