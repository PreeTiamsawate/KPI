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
    <link rel="stylesheet" href="./KPI_print.css">
    <title>รายงานผลการปฏิบัติงานของพนักงาน</title>
</head>
<body>
    <div class="print-btn-container">
        <button onclick="window.print()"> <img src="./kpi_image/Icon metro-printer.svg"> <span>Print</span></button>
    </div>
    <!-- Header Section ================================================== -->
    <header>
        <div class="headline">
            <div>
                <img src="./kpi_image/thai logo.png">
                <span>
                    แบบประเมินศักยภาพของพนักงาน "Competency" ประจำไตรมาส <?php echo substr($_SESSION['period'], 1, 1); ?> ปี <?php echo $_SESSION['year']+543; ?>
                    (<span class="QUARTER_YEAR"><?php echo $_SESSION['period']; ?>/<?php echo $_SESSION['year']; ?></span>)
                </span>
            </div>
            <div>
                <span class="USER_ID"><?php echo $_SESSION['user']['eid']; ?></span>
                <span class="USER_FULL_NAME"><?php echo $_SESSION['user']['name']; ?></span>
            </div>
        </div>
        <div class="score-def">
            <img src="./kpi_image/Ref. score.svg">
        </div>
    </header>
    <main>
        <table id="GRADE_TABLE">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <!-- Table Header ========================================= -->
            <thead>
                <tr>
                    <th rowspan="1" colspan="3">
                        Personnel Information
                    </th>
                    <th></th>
                    <th colspan="4" height="30">
                        Core Competency
                    </th>
                    <th></th>
                    <th colspan="4">
                        Leadership Competency
                    </th>
                    <th rowspan="2">
                        Total
                    </th>
                    <th rowspan="2">
                        Weighted Competency (%)
                    </th>
                </tr>

                <tr>
                    <td>Lv</td>
                    <td>ID</td>
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
                    <td>
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
                    <td>
                        Total
                    </td>
                </tr>

            </thead>
            <!-- Table Body ================================================================ -->
            <tbody class="grading-tbody">

            </tbody>

        </table>
    </main>


    <div class="print-btn-container">
        <button onclick="window.print()"> <img src="./kpi_image/Icon metro-printer.svg"> <span>Print</span></button>
    </div>
    <!-- Delete KPI_dummy_json.js below when connected to database!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!--script src="./KPI_dummy_json.js"></script-->
    <script src="./KPI_PRINT_build_table.js"></script>
    <script>
        var req = new XMLHttpRequest();
        req.open("GET", "getappraisal.php", false);
        req.send(null);
        var unpackedData = JSON.parse(req.response);
        const dummyKPI = unpackedData.data;
        buildTablePrint(dummyKPI)
    </script>
</body>
</html>