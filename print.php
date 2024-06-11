<?php
session_start();
if (isset($_GET['cmd']) && ($_GET['cmd'] == 'logout')) {
    session_destroy();
}
if (!isset($_SESSION['user'])) {
    //header('location: demo.html'); //NOT WORKING ON THIS SERVER???
    echo "<script type='text/javascript'>window.location.href = 'expired.html';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Local css -->
     <!-- CSS for Bootstrap5 -->
     <link href="./assets/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="./public/css/KPI_print.css">
 
    <title>รายงานผลการปฏิบัติงานของพนักงาน</title>
</head>

<body>
    <div class="print-btn-container">
        <button onclick="window.print()"> <img src="./public/kpi_image/Icon metro-printer.svg"> <span>Print</span></button>
    </div>
    <!-- Header Section ================================================== -->
    <header>
        <div class="headline">
            <div>
                <img src="./public/kpi_image/thai logo.png">
                <span>
                    แบบประเมินความสามารถพนักงาน (Competency) ครั้งที่ <?php echo substr($_SESSION['period'], 1, 1); ?>/<?php echo $_SESSION['year']+543; ?>
                    (<span class="QUARTER_YEAR"><?php echo $_SESSION['period']; ?>/<?php echo $_SESSION['year']; ?></span>)
                </span>
            </div>
            <div>
            <span class="USER_ID"><?php echo $_SESSION['user']['eid']; ?></span>
            <span class="USER_FULL_NAME"><?php echo $_SESSION['user']['name']; ?></span>
            </div>
        </div>
        <div class="score-def">
            <img src="./public/kpi_image/Ref. score.svg">
        </div>
    </header>
    <main>
        <table id="GRADE_TABLE">
            <colgroup>
                <col class="lv">
                <col class="id">
                <col class="function">
                <col class="nameSurname">
                <col class="spacer">
                <col class="score">
                <col class="score">
                <col class="score">
                <col class="spacer">
                <col class="score">
                <col class="score">
                <col class="score">
                <col class="spacer">
                <col class="coreValue">
                <col class="spacer">
                <col class="moral">
                <col class="totalPercent">
            </colgroup>
            <!-- Table Header ========================================= -->
            <thead>
                <tr>
                    <th rowspan="1" colspan="4">
                        Personnel Information
                    </th>
                    <th></th>
                    <th colspan="3" height="30">
                        Core Competency
                    </th>
                    <th></th>
                    <th colspan="3">
                        Leadership Competency
                    </th>
                    <th rowspan="2" class="d-none">
                        Total
                    </th>
                    <th rowspan="2"> </th>

                    <th colspan="1">
                        Core Value
                    </th>
                    <th rowspan="2"> </th>
                    <th colspan="1">
                        Moral & Integrity
                    </th>
                    
                    <th rowspan="2">
                        Weighted Competency (%)
                    </th>
                </tr>

                <tr>
                    <td>Lv</td>
                    <td>ID</td>
                    <td>Function</td>
                    <td>Name-Surname</td>
                    <td></td>
                    <td height="50">
                        Service Orientation
                    </td>
                    <td>
                        Result Orientation
                    </td>
                    <td>
                        Flexibility and Adaptability
                    </td>
                    <td class="d-none">
                        Total
                    </td>
                    <td></td>
                    <td>
                        Make It Happen
                    </td>
                    <td>
                        Provide Solutions
                    </td>
                    <td>
                        Inspire <br> People
                    </td>
                    <td class="d-none">
                        Total
                    </td>
                    <td>
                        AIM <br> ที่โดดเด่น
                    </td>
                    <td>
                        yes / no
                    </td>
                </tr>
            </thead>
            <!-- Table Body ================================================================ -->
            <tbody class="grading-tbody">
            </tbody>
        </table>
    </main>
    <div class="print-btn-container">
        <button onclick="window.print()"> <img src="./public/kpi_image/Icon metro-printer.svg"> <span>Print</span></button>
    </div>
    <!-- Delete KPI_dummy_json.js below when connected to database!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!-- <script src="./KPI_dummy_json.js"></script> -->
    <!--script src="./KPI_dummy_json_v2.js"></script-->
    <script src="./public/js/KPI_PRINT_build_table.js"></script>
    <script>
        var req = new XMLHttpRequest();
        req.open("GET", "getappraisal.php", false);
        req.send(null);
        var unpackedData = JSON.parse(req.response);
        const dummyKPI_new = unpackedData.data;
        buildTablePrint(dummyKPI_new)
    </script>
</body>
</html>