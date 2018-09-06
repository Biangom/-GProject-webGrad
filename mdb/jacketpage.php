<?
    $table = "lifejacket";
    include './condb.php';
    $scale=10;			// 한 화면에 표시되는 글 수


	//$mode에 따른 분기실행
    // if ($mode=="search")
	// {
	// 	if(!$search)
	// 	{
	// 		echo("
	// 			<script>
	// 			 window.alert('검색할 단어를 입력해 주세요!');
	// 		     history.go(-1);
	// 			</script>
	// 		");
	// 		exit;
	// 	}

	// 	$sql = "select * from $table where $find like '%$search%'";
	// }
	// else
	// {
	// 	$sql = "select * from $table";
    // }
    $sql = "select * from $table";

	$result = mysqli_query($link, $sql );


	$total_record = mysqli_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;

?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="#" target="_blank">Jacket Infomation</a>
                        <span>/</span>
                        <span>Dashboard</span>
                    </h4>


                    <!-- <div class="text-right"> -->
                    <div>

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLoginAvatarDemo">Register </button>
                        <!-- <br> -->
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalDelete">Delete</button>

                        <!-- Indicates caution should be taken with this action -->
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalWarn">Warn</button>

                        <!-- Indicates a dangerous or potentially negative action -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDanger">Danger</button>

                    </div>
                    

                    <form class="d-flex justify-content-center">
                        <!-- Default input -->
                        <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>

                    </form>

                </div>

            </div>
            <!-- Heading -->




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
                                        <th>#</th>
                                        <th>SN</th>
                                        <th>EmergencyOn</th>
                                        <th>WarningOn</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>

                                <?		
                                    // for ( $i = $start; $i < $total_record; $i++)   
                                    // for ( $i = $start; $i < $start+$scale && $i < $total_record; $i++)                    
                                    // {
                                    //     mysql_data_seek($result, $i);       
                                    //     // 가져올 레코드로 위치(포인터) 이동  

                                    //     $row = mysql_fetch_array($result);       
                                    //     // 하나의 레코드 가져오기
                                        
                                    //     $item_sn   = $row[SN];
                                    //     $item_emer = $row[EmergencyOn];
                                    //     $item_warn = $row[WarningOn];

                                        // $item_hit     = $row[hit];
                                        // $item_date    = $row[regist_day];
                                        // $item_date = substr($item_date, 0, 10);  
                                        // $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

                                    for( $i = 0; $i < $total_record ; $i++) {
                                        //mysqli_data_seek($result, $i);
                                        $row = mysqli_fetch_array($result);

                                        $item_sn   = $row['SN'];
                                        $item_emer = $row['EmergencyOn'];
                                        $item_warn = $row['warningOn'];

                                ?>

                                 
                                    <tr>

                                    <td><?=$i+1?> </td>
                                    <td><?= $item_sn ?> </td>					
                                    <td><?= $item_emer ?> </td>
                                    <td><?= $item_warn ?> </td>

                                    </tr> 
                                <?
                                        $number--;
                                    }
                                ?>

                                
                                <!-- <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Cell 4</td>
                                        <td>Cell 5</td>
                                        <td>Cell 6</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Cell 7</td>
                                        <td>Cell 8</td>
                                        <td>Cell 9</td>
                                    </tr>
                                </tbody> -->

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

            <!--Card-->
            <!-- <div class="card"> -->

                <!--Register-->
                <!--Section: Modals-->
                <section>
                    <!--Modal Form Login with Avatar Demo-->
                    <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                            <!--Content-->
                            <div class="modal-content">

                                <!--Header-->
                                <div class="modal-header">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
                                </div>

                                <!--Body-->
                                <div class="modal-body text-center mb-1">

                                    <h5 class="mt-1 mb-2">Jacket Register</h5>

                                    <form action="./insert/jacket.php" method="post" id="formRegister">
                                        <div class="md-form ml-0 mr-0">
                                        <!-- <input type="password" type="text" id="form1" class="form-control ml-0"> -->
                                            <input type="text" id="form1" name="serial" class="form-control ml-0">
                                            <label for="form1" class="ml-0"> Serial Number</label>

                                        </div>
                                    </form>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-cyan" type="submit" form="formRegister"> Register
                                            <i class="fa fa-sign-in ml-1"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                    <!--Modal Form Login with Avatar Demo-->

                    <!--Modal: Login / Register Form Demo-->
                    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   123123
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal: Login / Register Form Demo-->

                </section>
                <!--Section: Modals-->




                <!--WARN-->
                <!--Section: Modals-->
                <section>
                    <!--Modal Form Login with Avatar Demo-->
                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                            <!--Content-->
                            <div class="modal-content">

                                <!--Header-->
                                <div class="modal-header">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
                                </div>

                                <!--Body-->
                                <div class="modal-body text-center mb-1">

                                    <h5 class="mt-1 mb-2">Jacket Deleter</h5>

                                    <form action="./insert/jacket.php" method="post" id="formRegister">
                                        <div class="md-form ml-0 mr-0">
                                        <!-- <input type="password" type="text" id="form1" class="form-control ml-0"> -->
                                            <input type="text" id="form1" name="serial" class="form-control ml-0">
                                            <label for="form1" class="ml-0"> Serial Number</label>

                                        </div>
                                    </form>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-cyan" type="submit" form="formRegister"> Delete
                                            <i class="fa fa-sign-in ml-1"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                    <!--Modal Form Login with Avatar Demo-->

                    <!--Modal: Login / Register Form Demo-->
                    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   123123
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal: Login / Register Form Demo-->

                </section>
                <!--Section: Modals-->

              

                

            <!-- </div> -->
            <!--/.Card-->



           

        </div>
    </main>
    <!--Main layout-->