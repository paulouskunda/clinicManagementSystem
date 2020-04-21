<?php

        require '../../includeFiles/Connection.php';

?>
<!DOCTYPE html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap-select.min.css">


    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../">SUNBI</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                 
                       
                     
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                    
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="../" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                               
                            </li>
                     
                         
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="addAdmin.php">Add Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="addPatients.php">Add Patients</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="addStaff.php">Add Stuff</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Reports</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Reports Page</a>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </li>
                        
                          
                                    </ul>
                                </div>
                            </li>
                           
                    
                         











                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Reports </h2>
                        
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Reports</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Reports Page</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    <div class="row">
                        
                    </div>
                    <div class="row">
                       
             		 <?php

                            $whoCalledMe = null;

                            //Search for patients                      
                            $sqlAccount = "SELECT fullname, uniqueID FROM patients";
                            $QueryAccount = mysqli_query($con,$sqlAccount);
                            $numAccount = mysqli_num_rows($QueryAccount);

                            //Search for diseases


                        ?>



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Reports </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Reports Generation</h3>
                                        </div>
                                        <hr>
                                        <form action="GenerateReports.php" method="post" novalidate="novalidate">
                                          
                                                
                                            </select>

                                            
                                            </div>
                                              <div class="form-group">
                                                <input type="text" name="type_format" value="pdf" hidden="">
                                            </div>
                                            <div class="form-group">
                                            <select class="form-control" name="reportType"  onchange="accountSelect(this)">
                                                <option value="allPatients">Patients</option>
                                                <option value="allStaff">Staff List</option>
                                                <option value="diseaseBased">Disease Based</option>
                                                <option value="singlePatient">Single Patient Report</option>
                                                <option value="ageGroup">Age Group</option>
                                                <option value="genderReport">Gender Based</option>
                                            </select>
                                            </div>

                                            <div class="form-group" id="hidden_div" style="display: none;">
                                             <!--    <select class="form-control">
                                                    <option>Emails Here</option>
                                                </select> -->
                                            
                                            <?php 
                                              if ($numAccount > 0) {
                                                    # code...
                                                    ?>
                                                    <!-- <div class="form-group"> -->
                                                    <label for="cc-email" class="control-label mb-1">Patient Number and Patient Name</label><br>
                                                    <select  class="form-control" name="pUniqueID" data-live-search="true">
                                                 
                                                    <?php

                                                        # code...
                                                         while($rowAccount = mysqli_fetch_assoc($QueryAccount)) {
                                                            echo "<option value=".$rowAccount['uniqueID'].",".$rowAccount['fullname'].">".$rowAccount['uniqueID']." ".$rowAccount['fullname']."</option>";
                                                        }
                                                    } 
                                                ?> 
                                            		</select>



                                        </div>         
                                    <div class="form-group" id="hidden_div_diseaseBased" style="display: none;">
                                             <!--    <select class="form-control">
                                                    <option>Emails Here</option>
                                                </select> -->
                                                
                                              <label class="control-label mb-1">Disease Record</label><br>
                                            <select class="form-control" name="selectedGender">
                                                <?php

                                                    $sqlDiseases = "SELECT diseaseName FROM diseaserecord";
                                                    $queryDisease = mysqli_query($con, $sqlDiseases);
                                                    $numDiseases = mysqli_num_rows($queryDisease);
                                                 
                                                    
                                                if($numDiseases > 0 ){
                                                 while($innerRow = mysqli_fetch_assoc($queryDisease)){
                                                    echo '<option value="'.$innerRow['diseaseName'].'">'.$innerRow['diseaseName'].'</option>';
                                                    }
                                                }else {
                                                    echo '<option value="Nothing">Nothing</option>';
                                                }
                                                
                                                ?>
                                            </select>



                                        </div>
                                       
                                        <div class="form-group" id="hidden_date" style="display: none;">
                                            <label class="control-label mb-1">Enter Lowest Age</label><br>
                                            <label class="control-label mb-1">From </label>
                                            <input type="text" name="startAge" id="date" class="form-control" required="true">
                                            <label class="control-label mb-1">To</label>
                                            <input type="text" name="endAge" class="form-control" required>
                                        </div>
                                        <div class="form-group" id="hidden_gender" style="display: none;">
                                            <label class="control-label mb-1">Select Gender</label><br>
                                            <select class="form-control" name="selectedGender">
                                                <option value="select">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>


                                            <div>
                                                <button id="payment-button" type="submit" name="ReportSubmit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Get Report</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
           
           			</div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Sunbi. All rights reserved
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="../assets/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script type="text/javascript">



    function accountSelect(select) {
            // document.getElementById('hidden_div');
            if (select.value == 'singlePatient') {
                    document.getElementById('hidden_div').style.display = "block";
                    document.getElementById('hidden_gender').style.display = "none";
                document.getElementById('hidden_date').style.display = "none";

                    <?php
                        $whoCalledMe = "singlePatient";
                    ?>
            } else if (select.value == 'diseaseBased') {
                    document.getElementById('hidden_div_diseaseBased').style.display = "block";
                    document.getElementById('hidden_div').style.display = "none";
                    document.getElementById('hidden_gender').style.display = "none";
                document.getElementById('hidden_date').style.display = "none";


                    <?php
                        $whoCalledMe = "diseaseBased";
                    ?>
            }else if (select.value == 'single_date'){
                    document.getElementById('hidden_date').style.display = "block";
                    document.getElementById('hidden_div').style.display = "block";
            } else if(select.value == 'ageGroup'){
                document.getElementById('hidden_date').style.display = "block";
                    document.getElementById('hidden_div').style.display = "none";
                     document.getElementById('hidden_gender').style.display = "none";
                document.getElementById('hidden_div_diseaseBased').style.display = "none";
            } else if(select.value == 'genderReport'){
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('hidden_date').style.display = "none";
                document.getElementById('hidden_div_diseaseBased').style.display = "none";
                document.getElementById('hidden_gender').style.display = "block";

            }else {
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('hidden_date').style.display = "none";
                document.getElementById('hidden_gender').style.display = "none";
                document.getElementById('hidden_div_diseaseBased').style.display = "none";


            }
        }

    function validDate(){
        var today = new Date().toISOString().split('T')[0];
        var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
      document.getElementsByName("date")[0].setAttribute('min', today);
      document.getElementsByName("date")[0].setAttribute('max', nextWeekDate)
    }
</script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>
 
</html>