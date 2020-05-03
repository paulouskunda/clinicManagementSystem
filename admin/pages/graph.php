<?php

    // require '..      /config/config.php';
    require '../../includeFiles/Connection.php';

    // // Check whether the user name already exists
    // $con = getDbInstance();

    $monthsArray = array('January' => 1, 'Feburary' => 2, 'March' => 3, 'April' => 4, 'May' => 5, 'June' => 6,
                         'July' => 7, 'August' => 8, 'September' => 9, 'October' => 10, 'November' =>11, 'December' => 12);
    $monthOne = $monthsArray[$_SESSION['startMonth']];
    $monthTwo = $monthsArray[$_SESSION['endMonth']];

    $passOne = $_SESSION['startMonth'];
    $passTwo = $_SESSION['endMonth'];

    if ($monthOne < 10 || $monthTwo < 10) {
        # code...
         $startMonthEntered = '2020-0'.$monthsArray[$_SESSION['startMonth']];
         $endMonthEntered = '2020-0'.$monthsArray[$_SESSION['endMonth']];

    }else {
         $startMonthEntered = '2020-'.$monthsArray[$_SESSION['startMonth']];
         $endMonthEntered = '2020-'.$monthsArray[$_SESSION['endMonth']];

    }

   
   

    $sql =  "SELECT COUNT(*) as total FROM activelog WHERE cpDate LIKE '%$startMonthEntered%'";
    $startMonth = mysqli_query($con, $sql);
    $startMonth = mysqli_fetch_all($startMonth, MYSQLI_ASSOC);
    $startMonth = json_encode(array_column($startMonth, 'total'),JSON_NUMERIC_CHECK);

    $sql =  "SELECT COUNT(*) as total FROM activelog WHERE cpDate LIKE '%$endMonthEntered%'";
    $endMonth = mysqli_query($con, $sql);
    $endMonth = mysqli_fetch_all($endMonth, MYSQLI_ASSOC);
    $endMonth = json_encode(array_column($endMonth, 'total'),JSON_NUMERIC_CHECK);
    

?>


<!DOCTYPE html>
<html>
<head>
	<title>GRAPH</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>


<script type="text/javascript">


$(function () { 


    var startMonthViewer = <?php echo $startMonth; ?>;
    var endMonthViewer = <?php echo $endMonth; ?>;
    var monthOneJS = '<?php echo $_SESSION['startMonth']; ?>';

    var monthTwoJS = '<?php echo $_SESSION['endMonth']; ?>';


    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Patients'
        },
        xAxis: {
            categories: ['2020','2021','2022', '2023']
        },
        yAxis: {
            title: {
                text: 'Number'
            }
        },
        series: [{
            name: monthOneJS,
            data: startMonthViewer
        }, {
            name: monthTwoJS,
            data: endMonthViewer
        }]
    });
});


</script>


<div class="container">
	<br/>
     <button class='btn btn-default' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span> Print </button>
	<h2 class="text-center">Clinical Admits Between</h2>
	
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>