<!DOCTYPE HTML>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!-- <script src="https://api2.sktelecom.com/tmap/js?version=1&format=javascript&appKey=7ac51e85-e61a-4326-b979-d66cbd0f85f8"></script>
        <script type="text/javascript">
			function initTmap(){
                var map = new Tmap.Map({
                    div:'map_div',
                    width : "934px",
                    height : "452px",
                });
                
                markerLayer = new Tmap.Layer.Markers();
                map.addLayer(markerLayer);
                
                var lonlat = new Tmap.LonLat( 126.984895 , 37.566369).transform("EPSG:4326", "EPSG:3857");
                var size = new Tmap.Size(24, 38);
                var offset = new Tmap.Pixel(-(size.w / 2), -(size.h));
                var icon = new Tmap.Icon('http://tmapapis.sktelecom.com/upload/tmap/marker/pin_b_m_a.png',size, offset);
                
                marker = new Tmap.Marker(lonlat, icon);
                markerLayer.addMarker(marker);
            }

		</script> -->


    </head>

    


    <body onload="initTmap()">
        <div id="map_div">
        </div>       

        <form action="insert.php" method="post" class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2">Serial Number</label>
                <input type="text" class="form-control" name="serialNum" placeholder="input Serial Number">
            </div>
            <div class="form-group">
                <label for="exampleInputName2">HP</label>
                <input type="text" class="form-control" name="hp" placeholder="input Hp">
            </div>
            <button type="submit" class="btn btn-default">register</button>
        </form>
        <button type="button" class="btn btn-default" onclick="location.href='view.php'"> 현재 등록된 사용자들 </button>
    </body>
</html>

