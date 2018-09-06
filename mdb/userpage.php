<!--Main layout-->
<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="#" target="_blank">Rent Table</a>
                    </h4>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLoginAvatarDemo">Register</button>
<!--
                    <form class="d-flex justify-content-center">
                        <!-- Default input 
                        <input type="search" placeholder="" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
-->
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
                                        $conn = mysqli_connect('localhost', 'root', 'root', 'test');
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


           

        </div>

        <!--Card-->
            <!-- <div class="card"> -->
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
                                            <input type="text" id="form1" class="form-control ml-0" name="SN">
                                            <label for="form1" class="ml-0"> Serial Number</label>
                                        </div>

                                        <div class="md-form ml-0 mr-0">
                                        <!-- <input type="password" type="text" id="form1" class="form-control ml-0"> -->
                                            <input type="text" id="form1" class="form-control ml-0" name="hp">
                                            <label for="form1" class="ml-0"> 연락처</label>
                                        </div>
                                        <div class="md-form ml-0 mr-0">
                                        <!-- <input type="password" type="text" id="form1" class="form-control ml-0"> -->
                                            <input type="text" id="form1" class="form-control ml-0" name="user">
                                            <label for="form1" class="ml-0"> 대여인</label>
                                        </div>
                                        <div class="md-form ml-0 mr-0">
                                        <!-- <input type="password" type="text" id="form1" class="form-control ml-0"> -->
                                            <input type="text" id="form1" class="form-control ml-0" name="wearer">
                                            <label for="form1" class="ml-0"> 착용자</label>
                                        </div>
                                        <div class="md-form ml-0 mr-0">
                                        <!-- <input type="password" type="text" id="form1" class="form-control ml-0"> -->
                                            <input type="text" id="form1" class="form-control ml-0" name="WearerAge">
                                            <label for="form1" class="ml-0"> 착용자 나이</label>
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
    </main>
    <!--Main layout-->