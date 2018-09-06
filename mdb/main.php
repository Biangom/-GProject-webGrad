<!--Main layout-->
<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <?php /*
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Home Page</a>
                        <span>/</span>
                
                        <span>Dashboard</span>
                    </h4>

                    <form class="d-flex justify-content-center">
                        <!-- Default input -->
                        <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>

                    </form>

                </div>

            </div>
            */ ?>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-9 mb-4">

                   <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                
                            <!--Google map-->
                            <div id="map_div"> </div>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            Today's Weather
                        </div>

                        <!--Card content-->
                        <div class="card-body" style="font-family: gilbert; text-align: center;">
                            <?php
                            $url = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=66&gridy=109";
                            $result = simplexml_load_file($url);
                            $list = array();
                           
                            $location= iconv("UTF-8","euc-kr",$result->header->title);
                            $results = $result->body;
                            $bl_data='';
                            foreach($results->data as $item)
                            {
                                if(!$bl_data) {
                                $temp=$item->temp; //현재온도
                                $sky=$item->wfKor;
                                $icon=$item->wfEn;
                                $mintemp=$item->tmn;
                                $maxtemp=$item->tmx;
                                $pop=$item->pop;
                                $wd=$item->wdKor;
                                $ws=$item->ws;
                                $reh=$item->reh;
                                $bl_data=true;
                               }
                            }

                            if($icon == 'Partly Cloudy') {
                                echo "<img src='./img/weather/partly_cloudy.gif' style='width:50px; height:50px;'>";
                            }
                            
                            elseif ($icon == 'Clear') {
                                echo "<img src='./img/weather/clear.gif' style='width:50px; height:50px;'>";
                            }

                            elseif ($icon == 'Cloudy') {
                                echo "<img src='./img/weather/cloudy.gif' style='width:50px; height:50px;'>";
                            }

                            elseif ($icon == 'Mostly Coludy') {
                                echo "<img src='./img/weather/mostly_cloudy.gif' style='width:50px; height:50px;'>";
                            }

                            elseif ($icon == 'Rain') {
                                echo "<img src='./img/weather/rain.gif' style='width:50px; height:50px;'>";
                            }                            

                            elseif ($icon == 'Snow') {
                                echo "<img src='./img/weather/snow.gif' style='width:50px; height:50px;'>"; 
                            }

                            else{
                                
                            }
                            ?>
                            <span>
                            <?=$temp?>°C, <?=$sky?>
                            </span>              
                        </div>



                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- List group links -->
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action waves-effect">최저기온
                                    <span class="badge badge-primary badge-pill pull-right"><?=$mintemp?>°C
                                    </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">최고기온
                                    <span class="badge badge-danger badge-pill pull-right"><?=$maxtemp?>°C
                                    </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">풍향
                                    <span class="badge badge-success badge-pill pull-right"><?=$wd?>풍  <?=round($ws, 2)?>m/s
                                    </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">강수확률
                                    <span class="badge badge-success badge-pill pull-right"><?=$pop?>%
                                    </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">습도
                                    <span class="badge badge-success badge-pill pull-right"><?=$reh?>%
                                    </span>
                                </a>
                            </div>
                            <!-- List group links -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!-- Rent Grid row-->
            <div class="row wow fadeIn">

    

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                    <tr>
                                        <th>#</th>
                                        <th>SN</th>
                                        <th>대여인</th>
                                        <th>연락처</th>
                                        <th>착용자</th>
                                        <th>착용자 나이</th>
                                        <th>빌린시간</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                    <?php
                                         $conn = mysqli_connect('localhost', 'root', 'qqwweerr', 'yjacket');
                                        $query = "select * from rent" ;
                                        $result = mysqli_query($conn, $query); 
                                        $rowList = array();
                                        while($row = $result->fetch_assoc())
                                        {?>
                                        <tr>
                                            <th scope="row"><?=$row['RentNo']?></th>
                                            <td><?=$row['SN']?></td>
                                            <td><?=$row['user']?></td>
                                            <td><?=$row['hp']?></td>
                                            <td><?=$row['wearer']?></td>
                                            <td><?=$row['WearerAge']?></td>
                                            <td><?=$row['renttime']?></td>
                                        </tr>

                                        <?php
                                        }    
                                    ?>
                                    
                                    
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

                <!--Grid row-->
            <div class="row wow fadeIn">

    

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                    <tr>
                                        <th>SN</th>
                                        <th>EmergencyOn</th>
                                        <th>WarningOn</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                    <?php
                                         $conn = mysqli_connect('localhost', 'root', 'qqwweerr', 'yjacket');
                                        $query = "select * from lifejacket" ;
                                        $result = mysqli_query($conn, $query); 
                                        $rowList = array();
                                        while($row = $result->fetch_assoc())
                                        {?>
                                        <tr>
                                            <td><?=$row['SN']?></td>
                                            <td><?php 
                                                if($row['EmergencyOn'] == '0')
                                                {
                                                    echo "Off";
                                                }
                                                else
                                                {
                                                    echo "On";
                                                }
                                                ?>    
                                            </td>
                                            <td>
                                                <?php 
                                                if($row['warningOn'] == '0')
                                                {
                                                    echo "Off";
                                                }
                                                else
                                                {
                                                    echo "On";
                                                }
                                                ?> 
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalLoginAvatarDemo" style="float: right;">Signal</button>
                                            </td>

                                        </tr>

                                        <?php
                                        }    
                                    ?>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->