<?php
//header('location: finished.html');
//$currentDate = date('Ymd');
//if (intval($currentDate) > 20220907) {
//    header('location: finished.html');
//}
session_start();

$_SESSION['year'] = 2022;
$_SESSION['period'] = 'H1';

if (isset($_GET['cmd']) && ($_GET['cmd'] == 'logout')) {
    session_destroy();
}
if (isset($_POST['pid']) && ($_POST['pid'] != '')) {
    if ($_POST['pid'] == 'null') { // Not logged in ThaiSquare
        header('location: expired.html');
    } else {
        $_SESSION['user']['pid'] = $_POST['pid'];
        $_SESSION['user']['eid'] = $_POST['eid'];
        $_SESSION['user']['name'] = $_POST['name'];
        $_SESSION['mode'] = 'Dev'; //'Prod';
    }
} else {
    //Dummy Data -- DELETE FOR PRODUCTION USE
    $_SESSION['user']['pid'] = 'tg17713'; //17713;
    $_SESSION['user']['eid'] = '17713';
    $_SESSION['user']['name'] = 'Demo User';
    $_SESSION['mode'] = 'Dev'; //'Prod';
}

// Lock only specific person & allowable period
/*$allowedList = array('37122','23242','28026','32195');
if (!in_array($_SESSION['user']['eid'], $allowedList) && (intval(date('Ymd')) > 20220907)) {
    header('location: finished.html');
}*/

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
    <!-- CSS for Bootstrap5 -->
    <link href="./assets/bootstrap.min.css" rel="stylesheet">
    <!-- W3 CSS Link" -->
    <link rel="stylesheet" href="./assets/w3.css">
    <!-- Local css -->
    <link rel="stylesheet" href="./KPI.css">
    <title>แบบประเมินผลการปฏิบัติงานของพนักงาน</title>
</head>
<body>
    <div class="container-xxl">
        <!-- Header Section ================================================== -->
        <header>
            <div class="headline">
                <div>
                    <img src="./kpi_image/thai logo.png">
                    <span>
                    แบบประเมินความสามารถพนักงาน (Competency) ครั้งที่ <?php echo substr($_SESSION['period'], 1, 1); ?>/<?php echo $_SESSION['year']+543; ?>
                        (<span class="QUARTER_YEAR"><?php echo $_SESSION['period']; ?>/<?php echo $_SESSION['year']; ?></span>)
                    </span>
                </div>
                <div>
                    <img src="./kpi_image/Icon awesome-user-circle.svg" class="USER_IMAGE">
                    <span class="USER_ID"><?php echo $_SESSION['user']['eid']; ?></span>
                    <span class="USER_FULL_NAME"><?php echo $_SESSION['user']['name']; ?></span>
                </div>
            </div>
            <!-- Filter Bar Section =========================================== -->
            <nav>
                <div class="w3-dropdown-hover">
                    <img src="./kpi_image/score definitions.svg" alt="">
                    <div id="item-7" class="w3-dropdown-content score-definations">
                        <!-- inserted from database -->
                    </div>
                </div>
                <div class="filter-boxes">
                    <div id="filter-btn" class="w3-dropdown-click w3-dropdown-hover">
                        <img src="./kpi_image/Icon material-filter-list.svg">
                        <div class="w3-dropdown-content " id="filter-defination"> Filter </div>
                    </div>
                    <form action="" id="filter-form" class="w3-dropdown-content">
                        <div>
                            <div>
                            <div>
                                    <input class="grade-checkbox" type="checkbox" id="graded" name="graded_number_filter">
                                    <label for="graded">ให้คะแนนแล้ว</label>
                                    <span class="GRADED_NUMBER" id="GRADED_NUMBER">(100)</span>
                                </div>
                                <div>
                                    <input class="grade-checkbox" type="checkbox" id="not-graded" name="graded_number_filter">
                                    <label for="not-graded">ยังไม่ให้คะแนน</label>
                                    <span class="NOT_GRADED_NUMBER" id="NOT_GRADED_NUMBER">(900)</span>
                                </div>
                            </div>
                            <div>
                                <div class="level-checkboxes">
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="1" id="lv1">
                                        <label for="lv1">Lv.1</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="2" id="lv2">
                                        <label for="lv2">Lv.2</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="3" id="lv3">
                                        <label for="lv3">Lv.3</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="4" id="lv4">
                                        <label for="lv4">Lv.4</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="5" id="lv5">
                                        <label for="lv5">Lv.5</label>

                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="6" id="lv6">
                                        <label for="lv6">Lv.6</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="7" id="lv7">
                                        <label for="lv7">Lv.7</label>
                                    </div>
                                </div>
                                <div class="level-checkboxes">
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="8" id="lv8">
                                        <label for="lv8">Lv.8</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="9" id="lv9">
                                        <label for="lv9">Lv.9</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="10" id="lv10">
                                        <label for="lv10">Lv.10</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="11" id="lv11">
                                        <label for="lv11">Lv.11</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="13" id="lv13">
                                        <label for="lv13">Lv.13</label>
                                    </div>
                                    <div>
                                        <input class="level-checkbox" type="checkbox" value="14" id="lv14">
                                        <label for="lv14">Lv.14</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" id="use-filter-button">
                                    เลือก
                                </button>
                                <button id="cancel-form-btn">
                                    ล้างตัวเลือก
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="search-box">
                        <label for="search-id">
                            <img src="./kpi_image/Icon ionic-ios-search.svg" alt="">
                        </label>
                        <input type="text" placeholder="search ID or Name" id="search-id">
                    </div>
                </div>
            </nav>
        </header>
        <nav class="d-none" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
            </ol>
        </nav>
        <main id="to-print">
            <form name="form1" id="form1">
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
                        <col>
                        <col>
                    </colgroup>
                    <!-- Table Header ========================================= -->
                    <thead>
                    <tr>
                            <th rowspan="1" colspan="4">
                                Personnel Information
                            </th>
                            <th></th>
                            <th colspan="3" height="50">
                                Core Competency
                            </th>
                            <th></th>
                            <th colspan="3" height="50">
                                Leadership Competency
                            </th>

                            <th rowspan="2" class="d-none">
                                Total
                            </th>
                            <th rowspan="2"></th>
                            <th rowspan="2">
                                Overall Comment
                            </th>
                            <th rowspan="2">
                                <div class="w3-dropdown-hover">
                                    Weighted Competency (%)
                                    <div class="w3-dropdown-content">
                                        <img src="./kpi_image/total_competency_description.png">
                                    </div>
                                </div>

                            </th>
                        </tr>
                        <tr>
                            <td>Lv</td>
                            <td>ID</td>
                            <td>Function</td>
                            <td>Name-Surname</td>
                            <td></td>
                            <td height="70">
                                <div id="item-1" class="w3-dropdown-hover">
                                    <!-- inserted from database -->
                                    <div class="w3-dropdown-content">
                                        <!-- inserted from database -->
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="item-2" class="w3-dropdown-hover">
                                    <!-- inserted from database -->
                                    <div class="w3-dropdown-content">
                                        <!-- inserted from database -->
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="item-3" class="w3-dropdown-hover">
                                    <!-- inserted from database -->
                                    <div class="w3-dropdown-content">
                                        <!-- inserted from database -->
                                    </div>
                                </div>
                            </td>
                            <td class="d-none">
                                Total
                            </td>
                            <td></td>
                            <td>
                                <div id="item-4" class="w3-dropdown-hover">
                                    <!-- inserted from database -->
                                    <div class="w3-dropdown-content">
                                        <!-- inserted from database -->
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="item-5" class="w3-dropdown-hover">
                                    <!-- inserted from database -->
                                    <div class="w3-dropdown-content">
                                        <!-- inserted from database -->
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="item-6" class="w3-dropdown-hover">
                                    <!-- inserted from database -->
                                    <div class="w3-dropdown-content">
                                        <!-- inserted from database -->
                                    </div>
                                </div>
                            </td>
                            <td class="d-none">
                                Total
                            </td>
                        </tr>
                    </thead>
                    <!-- Table Body ================================================================ -->
                    <tbody class="grading-tbody">
                    </tbody>
                </table>
                <div class="grid-container ">
                    <div class="grid-item-1">
                        <button type="submit" id="submitPage">Submit This Page</button>
                    </div>
                    <div class="grid-item-2">
                        <div id="pagination-wrapper"></div>
                    </div>
                    <div class="grid-item-3">
                        <div id="page-index-wraper"></div>
                    </div>
                   
                    <div class="grid-item-5">
                        <div id="preview-btn">
                            <a href="./print.php" target="_blank">Print Preview</a>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="numGraded" name="numGraded">
                <input type="hidden" id="totalRows" name="totalRows">
            </form>

            <!-- Success Alert After Save -->
            <!-- <button id="complete">Complete!</button>
            <script>
                const button = document.querySelector('#complete');
                button.addEventListener('click', () => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
            </script> -->
        </main>
    </div>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script-->
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script-->
    <script src="./assets/jquery-3.6.0.min.js"></script>
    <script src="./assets/bootstrap.min.js"></script>
    <script src="./sweetalert2.all.min.js"></script>
    <!-- Delete KPI_dummy_json.js below when connected to database!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!--script src="./dummy_data/KPI_dummy_data_15929.js"></script-->
    <!--script src="./dummy_data/KPI_score_weight_dummy.js"></script-->
    <!--script src="./dummy_data/KPI_items_json.js"></script-->

    <script>
        $(document).ready(function () {
            $("#form1").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "updatescore.php",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(response){
                        //console.log(JSON.stringify(response));
                        response.scores.forEach((item, index) => {
                            console.log(`${index} : ID=${item.ID} Score=${item.org_score}/${item.new_score} Comment=${item.org_comment}/${item.new_comment}`);
                            //$(`#ORIGINAL_SCORE_${item.ID}`).val(item.new_score);
                            //$(`#ORIGINAL_COMMENT_${item.ID}`).val(item.new_comment);
                            // *** เอา APPRAISAL_COMPETENCY_TOTAL ใส่กลับไปใน filteredData ***;

                            // Get new data
                            req.open("GET", "getappraisal.php", false);
                            req.send(null);
                            var unpackedData = JSON.parse(req.response);
                            dummyKPI_new = unpackedData.data;
                            rawData = dummyKPI_new;
                            for(let data of rawData ){
                                if(data.EMPLOYEE_ID == item.ID ){
                                    data.APPRAISAL_COMPETENCY_TOTAL = item.competency_total 
                                }
                            }
                            //console.log($(`#ORIGINAL_SCORE_${item.ID}`).val());
                        });
                        updateGradedNumbers(rawData);
                        //Reset rows color
                        const greenRows = document.querySelectorAll("tr[row-status='newly-filled']")
                        const submitBtn = document.querySelector('#submitPage');
                        const paginationWrapper = document.querySelector("#pagination-wrapper")
                        const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
                        for(const greenRow of greenRows){
                            greenRow.style.backgroundColor = "#FFFFFF";
                            greenRow.setAttribute("row-status", "fully-filled")
                        }
                        submitBtn.style.backgroundColor = "#FFFFFF";
                        paginationWrapper.style.backgroundColor = "transparent";
                        paginationWrapper.style.cursor = "pointer"
                        for (const paginationBtn of paginationBtns) {
                            paginationBtn.disabled = false
                        }
                        Swal.fire(response.message);
                    },
                    error: function(request, textStatus, errorThrown) {
                        Swal.fire(errorThrown);
                    }
                });
            });
        });
        var req = new XMLHttpRequest();

        // Get weighted scores data
        req.open("GET", "getweightedscore.php", false);
        req.send(null);
        var score_weight_dummy = JSON.parse(req.response);
        const score_weights = score_weight_dummy;
        
        // Get KPI items
        req.open("GET", "getkpiitems.php", false);
        req.send(null);
        var kpi_items_dummy = JSON.parse(req.response);
        const kpiItems = kpi_items_dummy;

        // Get appraisal scores data
        req.open("GET", "getappraisal.php", false);
        req.send(null);
        var unpackedData = JSON.parse(req.response);
        var dummyKPI_new = unpackedData.data;
        let rawData = dummyKPI_new;

        if(rawData.length == 0 ){
            Swal.fire('ไม่มีข้อมูลผู้ถูกประเมิน')
        }
        
        var gradedDataInit = rawData.filter(data => data.COMPETENCY_WT100 != null)
        var notGradedDataInit = rawData.filter(data => data.COMPETENCY_WT100 == null)
        let filteredData = rawData

        const updateGradedNumbers = function (data) {
            let gradedFilteredData = data.filter(data => data.COMPETENCY_WT100 != null)
            let notGradedFilteredData = data.filter(data => data.COMPETENCY_WT100 == null)
            const gradedNumber = document.querySelector("span.GRADED_NUMBER")
            const notGradedNumber = document.querySelector("span.NOT_GRADED_NUMBER")
            gradedNumber.innerText = `(${gradedFilteredData.length})`
            notGradedNumber.innerText = `(${notGradedFilteredData.length})`
            console.log("DATA LENGHT: " + data.length)
        }

        var state = {
            // 'querySet': rawData, //data json
            'page': 1, //start page
            'rows': 20, //number of rows showed
            'window': 10, //number of pagination buttons
        }
        const dropdownForm = document.querySelector(".filter-boxes").querySelector("#filter-form");
        const filterBtn = document.querySelector("#filter-btn");
        const filterRadios = document.querySelectorAll(".filter-boxes .grade-checkbox")
        const levelCheckboxes = document.querySelectorAll(".filter-boxes .level-checkbox")
        const useFilterBtn = document.querySelector('#use-filter-button')
        const cancelFormBtn = document.querySelector("#cancel-form-btn")
        const searchInput = document.querySelector("#search-id");
        const callBasicFunctions = function () {
            commentBoxControl()
            dynamicInputControl()
            assignRowStatus()
            rowStatusBySelect()
            rowStatusByComment()
            commentRequired()
            calculateScores()
            calculateScoresByInput()
        }


        useFilterBtn.addEventListener('click', function (e) {
            e.preventDefault();
            let checkedLevelBoxes = Array.from(levelCheckboxes).filter(levelCheckbox => levelCheckbox.checked)
            let checkedLevelValues = checkedLevelBoxes.map(levelCheckbox => Number(levelCheckbox.value))

            if (filterRadios[0].checked && !filterRadios[1].checked) {
                filteredData = gradedDataInit;


            } else if (!filterRadios[0].checked && filterRadios[1].checked) {
                filteredData = notGradedDataInit;

            } else {
                filteredData = rawData;
            }

            if (checkedLevelValues.length > 0) {
                filteredData = filteredData.filter(data => checkedLevelValues.includes(data.APPRAISAL_LEVEL))
            }

            // console.log(filteredData)
            searchInput.value = ""
            $('.grading-tbody').empty()
            buildTable(filteredData)
            callBasicFunctions()

            dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
            filterBtn.addEventListener("mouseover", btnHoverActive)
            filterBtn.addEventListener("mouseleave", btnHoverOff)
        })
        cancelFormBtn.addEventListener('click', function (e) {
            e.preventDefault();

            dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
            filterBtn.addEventListener("mouseover", btnHoverActive)
            filterBtn.addEventListener("mouseleave", btnHoverOff)

            for (const filterRadio of filterRadios) {
                filterRadio.checked = false
            }
            for (const levelCheckbox of levelCheckboxes) {
                levelCheckbox.checked = false
            }
            filteredData = rawData
            searchInput.value = ""
            $('.grading-tbody').empty()
            buildTable(filteredData)
            callBasicFunctions()
        })
        //let dataBySearch = filteredData

        searchInput.addEventListener('input', function () {
            console.log(this.value)
            let filterValue = this.value;

            if (filterValue != "") {
                filteredData = rawData.filter(data => data.EMPLOYEE_ID.includes(filterValue) || data.EMPLOYEE_NAME.toUpperCase().includes(filterValue.toUpperCase()))
            } else {
                filteredData = rawData
            }

            $('.grading-tbody').empty()
            buildTable(filteredData)
            callBasicFunctions()

        })
        buildTable(rawData)

        function pagination(querySet, page, rows) {

            var trimStart = (page - 1) * rows
            var trimEnd = trimStart + rows
            console.log("Trim start: " + trimStart);
            console.log("Trim end: " + trimEnd);

            var trimmedData = querySet.slice(trimStart, trimEnd)
            console.log("Trimmed data:", trimmedData);
            var pages = Math.ceil(querySet.length / rows);

            console.log("querySet.length: ", querySet.length)
            console.log("trimmedData.length: ", trimmedData.length)

            return {
                'querySet': trimmedData,
                'pages': pages,
            }
        }

        function pageButtons(data, pages) {
            var wrapper = document.getElementById('pagination-wrapper')
            var index = document.getElementById('page-index-wraper')

            wrapper.innerHTML = ``
            index.innerHTML = ``
            console.log('Pages: ', pages)
            console.log("state.page: ", state.page)
            var maxLeft = (state.page - Math.floor(state.window / 2))
            var maxRight = (state.page + Math.floor(state.window / 2))

            if (maxLeft < 1) {
                maxLeft = 1
                maxRight = state.window
            }

            if (maxRight > pages) {
                maxLeft = pages - (state.window - 1)

                if (maxLeft < 1) {
                    maxLeft = 1
                }
                maxRight = pages
            }

            for (var page = maxLeft; page <= maxRight; page++) {
                wrapper.innerHTML += `<button value=${page} class="page btn">${page}</button>`
            }

            if (state.page != 1 && maxLeft > 1) {
                wrapper.innerHTML = `<button value=${1} class="page btn">&#171; First</button>` + wrapper.innerHTML
            }

            if (state.page != pages && pages > maxRight) {
                wrapper.innerHTML += `<button value=${pages} class="page btn">Last &#187;</button>`
            }
            $(`button[value = ${state.page}]`).css({
                border: "1px solid #330066"
            })
            $('.page').on('click', function (e) {
                $('.grading-tbody').empty()
                state.page = Number($(this).val())
                console.log("click state page: ", state.page);
                $(`button[value = ${state.page}]`).css({
                    border: "1px solid #330066"
                })

                buildTable(data)
                callBasicFunctions()
            })
            index.innerHTML = `Page ${state.page} of ${pages}`

        }

        function b64DecodeUnicode(str) {
            // Going backwards: from bytestream, to percent-encoding, to original string.
            return decodeURIComponent(atob(str).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
        }

        function buildTable(Data) {

            var table = $('.grading-tbody')
            console.log("state.page to build: ", state.page)


            console.log("screenedData :", Data.length)
            // Here!
            if (Data.length < (state.page - 1) * state.rows + 1) {
                state.page = 1
            }
            var data = pagination(Data, state.page, state.rows)
            var myList = data.querySet
            for (var i in myList) {
                //Keep in mind we are using "Template Litterals to create rows"
                var row = `<tr row-status="">
                            <td class="EMPLOYEE_LEVEL">${myList[i].APPRAISAL_LEVEL}</td>
                            <td class="EMPLOYEE_ID" ><a class="employee-link" href="${myList[i].SUB_EMPLOYEE_KPI_URL || ""}">${myList[i].EMPLOYEE_ID}</a></td>
                            <td class="FUNCTION">${myList[i].FUNCTION}</td>
                            <td class="EMPLOYEE_FULLNAME">${myList[i].EMPLOYEE_NAME}</td>
                            <td class="competency-note" note-data="${myList[i].COMPETENCY_REASON_NOTE}">
                                <img class="d-none" src="./kpi_image/icon-info.png" alt="i">
                                <div class="d-none"></div>
                            </td>
                            <td class="service_orientation_score score">
                                <div>
                                    <select name="CSCORE1[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="CSCORE1_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="500" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 500 ตัวอักษร)">${myList[i].COMPETENCY_REASON_CORE1}</textarea>
                                </div>
                            </td>
                            <td class=" result_orientation_score score ">
                                <div>
                                    <select name="CSCORE2[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="CSCORE2_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="500" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 500 ตัวอักษร)">${myList[i].COMPETENCY_REASON_CORE2}</textarea>
                                </div>
                            </td>
                            <td class="flexibility_and_adaptability_score score ">
                                <div>
                                    <select name="CSCORE3[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="CSCORE3_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="500" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 500 ตัวอักษร)">${myList[i].COMPETENCY_REASON_CORE3}</textarea>

                                </div>
                            </td>
                            <td class= "core_competency_total total d-none">
                                <input name="CSCORE_TOTAL[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].COMPETENCY_WT_CORE}" type="text" readonly>
                            </td>
                            <td></td>
                            <td class="make_it_happen_score score ">
                                <div>
                                    <select name="LSCORE1[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="LSCORE1_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="500" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 500 ตัวอักษร)">${myList[i].COMPETENCY_REASON_LEAD1}</textarea>

                                </div>
                            </td>
                            <td class="provide_solutions_score score ">
                                <div>
                                    <select name="LSCORE2[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="LSCORE2_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="500" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 500 ตัวอักษร)">${myList[i].COMPETENCY_REASON_LEAD2}</textarea>

                                </div>
                            </td>
                            <td class="inspire_people_score score ">
                                <div>
                                    <select name="LSCORE3[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="LSCORE3_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="500" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 500 ตัวอักษร)">${myList[i].COMPETENCY_REASON_LEAD3}</textarea>

                                </div>
                            </td>
                            <td class="leadership_competency_total total d-none">
                                <input name="LSCORE_TOTAL[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].COMPETENCY_WT_LEAD}" type="text " readonly>
                            </td>

                            <td class="raw_total grand_total d-none">
                                <input name="COMPETENCY_TOTAL[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].COMPETENCY_WT_TOTAL}" type="text " readonly>
                            </td>
                            <td></td>
                            <td class="master_comment">
                                <div>
                                    <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                                    <textarea name="PERSONAL_COMMENT[${myList[i].EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" maxlength="800" placeholder="คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 800 ตัวอักษร)">${myList[i].PERSONAL_COMMENT}</textarea>
                                </div>        
                            </td>
                            <td class="total_competency_percent grand_total">
                                <input class="for-show-only"  value="${myList[i].COMPETENCY_WT100}" type="text" disabled>
                            </td>
                            <input class="real-input-total100" name="COMPETENCY_TOTAL100[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].COMPETENCY_WT100}" type="hidden" readonly>
                            <input name="ORIGINAL_SCORE[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].ORIGINAL_SCORE}" type="hidden">
                            <input name="ORIGINAL_COMMENT[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].ORIGINAL_COMMENT}" type="hidden">
                            <input name="ID[${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}]" value="${myList[i].EMPLOYEE_ID}_${myList[i].FUNCTION}_${myList[i].FUNCTION_LEVEL}" type="hidden">
                        </tr>
              `
                table.append(row)
                let n = Number(i) + 1
                let csScore1 = myList[i].COMPETENCY_CORE1 == null ? '""' : myList[i].COMPETENCY_CORE1;
                let csScore2 = myList[i].COMPETENCY_CORE2 == null ? '""' : myList[i].COMPETENCY_CORE2;
                let csScore3 = myList[i].COMPETENCY_CORE3 == null ? '""' : myList[i].COMPETENCY_CORE3;
                let lsScore1 = myList[i].COMPETENCY_LEAD1 == null ? '""' : myList[i].COMPETENCY_LEAD1;
                let lsScore2 = myList[i].COMPETENCY_LEAD2 == null ? '""' : myList[i].COMPETENCY_LEAD2;
                let lsScore3 = myList[i].COMPETENCY_LEAD3 == null ? '""' : myList[i].COMPETENCY_LEAD3;

                console.log("N: " + n)
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.service_orientation_score option[value=${csScore1}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.result_orientation_score option[value=${csScore2}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.flexibility_and_adaptability_score option[value=${csScore3}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.make_it_happen_score option[value=${lsScore1}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.provide_solutions_score option[value=${lsScore2}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.inspire_people_score option[value=${lsScore3}]`).attr("selected", "selected")

            }

            pageButtons(Data, data.pages)

        }
    </script>

    <script src="./KPI_dropdown_control.js "></script>
    <script src="./KPI_comment_box_control.js"></script>
    <script src="./KPI_dynamic_input.js"></script>
    <script src="./KPI_row_status_control.js"></script>
    <script src="./KPI_score_calculation.js"></script>
    <!--script src="./KPI_row_status_submit.js"></script-->
    <script src="./KPI_items.js"></script>
    <script src="./KPI_breadcrumb_control.js"></script>
</body>
</html>