

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>simpleMap</title>
		<!-- 필수 앱키 설정 파트!! -->
		
		<!-- <meta http-equiv="refresh" content="5"> 일정 시간마다 refresh--> 

        <script src="https://api2.sktelecom.com/tmap/js?version=1&format=javascript&appKey=7ac51e85-e61a-4326-b979-d66cbd0f85f8"></script>


		<!-- multimarker 실행 파트-->
		<script>									
			var map,marker,markerLayer;
			var i = 0.0001;
			// 페이지가 로딩이 된 후 호출하는 함수입니다.
			function initTmap(){
				// map 생성
				// Tmap.map을 이용하여, 지도가 들어갈 div, 넓이, 높이를 설정합니다.
				map = new Tmap.Map({div:'map_div', // map을 표시해줄 div
									width:'100%',  // map의 width 설정
									height:'400px' // map의 height 설정
									}); 
				markerLayer = new Tmap.Layer.Markers();//마커 레이어 생성
				map.addLayer(markerLayer);//map에 마커 레이어 추가
				
				var size = new Tmap.Size(24, 38);//아이콘 크기
				var offset = new Tmap.Pixel(-(size.w / 2), -(size.h));//아이콘 중심점
				var positions = [//다중 마커 저장 배열
					{
						title: 'SKT타워', 
						lonlat: new Tmap.LonLat(126.984895 + i, 37.566369).transform("EPSG:4326", "EPSG:3857")//좌표 지정
					},
					{
						title: '호텔', 
						lonlat: new Tmap.LonLat(126.979979, 37.564432).transform("EPSG:4326", "EPSG:3857")
					},
					{
						title: '명동성당', 
						lonlat: new Tmap.LonLat(126.987210, 37.5632423).transform("EPSG:4326", "EPSG:3857")
					},
					{
						title: '을지로3가역',
						lonlat: new Tmap.LonLat(126.992703, 37.566337).transform("EPSG:4326", "EPSG:3857")
					},
					{
						title: '덕수궁',
						lonlat: new Tmap.LonLat(126.975194, 37.565861).transform("EPSG:4326", "EPSG:3857")
					}
				];
				
				for (var i = 0; i< positions.length; i++){//for문을 통하여 배열 안에 있는 값을 마커 생성
					var icon = new Tmap.Icon('http://tmapapis.sktelecom.com/upload/tmap/marker/pin_b_m_a.png',size, offset);//아이콘 설정
					var lonlat = positions[i].lonlat;//좌표값
					marker = new Tmap.Marker(lonlat, icon);//마커 생성
					markerLayer.addMarker(marker); //마커 레이어에 마커 추가
				}
				i = i + 0.0001;
			}  
			// 맵 생성 실행
			//initTmap();
		</script>

	</head>
    <body onload="initTmap()">
        <div id="map_div">
        </div>        
    </body>
</html>	
<!-- multimarker -->