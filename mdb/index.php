<!DOCTYPE html>
<html lang="ko">

<?php
session_start();
if(!isset($_SESSION['id']))
{
    header ('Location: ./login.html');
}

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">


    <script src="https://api2.sktelecom.com/tmap/js?version=1&format=javascript&appKey=38cd02ff-65d1-4cf0-a561-3253be7e50c6"></script>
    <script type="text/javascript">
            function initTmap(){
                var map = new Tmap.Map({
                    div:'map_div',
                    width : "100%",
                    height : "452px",
                });
                map.setCenter(new Tmap.LonLat("127.281636", "36.766570").transform("EPSG:4326", "EPSG:3857"), 17.5);
                
                var vector_layer = new Tmap.Layer.Vector('Tmap Vector Layer');//벡터레이어 생성
                map.addLayers([vector_layer]); //map에 벡터 레이어 추가

                //polyline 좌표 배열.
                var pointList = [];
                
                //다각형을 그리기 위한 PointList 배열에 저장될 point
                pointList.push(new Tmap.Geometry.Point(127.281482, 36.767209).transform("EPSG:4326", "EPSG:3857"));
                pointList.push(new Tmap.Geometry.Point(127.282360, 36.766486).transform("EPSG:4326", "EPSG:3857")); 
                pointList.push(new Tmap.Geometry.Point(127.281700, 36.765876).transform("EPSG:4326", "EPSG:3857")); 
                pointList.push(new Tmap.Geometry.Point(127.280923, 36.766516).transform("EPSG:4326", "EPSG:3857")); 
                pointList.push(new Tmap.Geometry.Point(127.280955, 36.766774).transform("EPSG:4326", "EPSG:3857"));
                /*                 
                pointList.push(new Tmap.Geometry.Point(127.281643, 36.766725).transform("EPSG:4326", "EPSG:3857")); 
                pointList.push(new Tmap.Geometry.Point(127.281171, 36.766374).transform("EPSG:4326", "EPSG:3857")); 
                pointList.push(new Tmap.Geometry.Point(127.280983, 36.766784).transform("EPSG:4326", "EPSG:3857"));
                */
                var linearRing = new Tmap.Geometry.LinearRing(pointList);//시작점과 끝점이 이어지는 폐쇄된 선 형태의 지리정보 객체(Geometry)를 생성
                
                var PolygonCollection = new Tmap.Geometry.Polygon(linearRing);//Geometry.LinearRing을 인자로 사용해, 다각형(Polygon) 지리정보 객체(Geometry)를 생성
                
                var style_red = {
                      fillColor:"#008000",  //fill에 적용 될 16진수 color
                      fillOpacity:0.2,  //fill의 투명도
                      strokeColor: "#008000",//stroke에 적용될 16진수 color
                      strokeWidth: 3,//stroke의 넓이(pixel 단위)
                      strokeDashstyle: "solid",//stroke dash 의 스타일입니다
                      pointRadius: 60,//point의 반경(pixel 단위)
                      title: "this is a safety line" //지리정보객체 위를 hover 했을 때 툴팁을 생성
                 };//다각형(Polygon) style 지정
                                  
                var mLineFeature = new Tmap.Feature.Vector(PolygonCollection,null,style_red);//지리정보 객체(Geometry)를 벡터 레이어(Vector Layer)에 표출(drawing) 할 수 있는 형태로 변환하거나 조합하는 객체 클래스
                
                vector_layer.addFeatures([mLineFeature]);//벡터 레이어에 다각형(Polygon) 추가
                 
                show = PolygonCollection.getArea();//면적을 표현
                

                //마커 생성

                markerLayer = new Tmap.Layer.Markers();//마커 레이어 생성
                map.addLayer(markerLayer);//map에 마커 레이어 추가
                   
                var lonlat = new Tmap.LonLat(127.281636, 36.766570).transform("EPSG:4326", "EPSG:3857");//좌표 설정
                var size = new Tmap.Size(24, 38);//아이콘 크기 설정
                var offset = new Tmap.Pixel(-(size.w / 2), -(size.h));//아이콘 중심점 설정
                var icon = new Tmap.Icon('http://tmapapis.sktelecom.com/upload/tmap/marker/pin_b_m_a.png',size, offset);//마커 아이콘 설정
                
                marker = new Tmap.Marker(lonlat, icon);//마커 생성
                markerLayer.addMarker(marker);//레이어에 마커 추가
                } 
                    
        // 계산 결과를 표시합니다.
        function Info() {
            var result ='외부 영역에서 내부 영역을 뺀 면적 : '+show+''; 
            var resultDiv = document.getElementById("result");
            resultDiv.innerHTML = result;
        }
        
        // 맵 초기화 함수 호출
        initTmap();
                    
    </script>
</head>

<body class="grey lighten-3" onload="initTmap()">

    <!--Main Navigation-->
    <?php include 'header.php'; ?>
    <!--Main Navigation-->

    <!--Main layout-->
    <?php 
        if($page=='userInfo') {
            include 'userpage.php';
        }
        else if($page=='jacketInfo') {
            include 'jacketpage.php';
        }
        else if($page=='index'){
            include 'main.php'; 
        };
    ?>
    <!--Main layout-->

    <!--Footer-->
    <?php include 'footer.php'; ?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

    <!-- Charts -->
    <script>

        // Line
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        //pie
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                datasets: [
                    {
                        data: [300, 50, 100, 40, 120],
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });


        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });


        //radar
        var ctxR = document.getElementById("radarChart").getContext('2d');
        var myRadarChart = new Chart(ctxR, {
            type: 'radar',
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });

        //doughnut
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {
                labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                datasets: [
                    {
                        data: [300, 50, 100, 40, 120],
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });

    </script>

    <!--Google Maps-->

</body>

</html>