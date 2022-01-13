<?php
session_start();
if (isset($_POST['pid']) && ($_POST['pid'] != '')) {
    if ($_POST['pid'] == 'null') { // Not logged in ThaiSquare
        header('location: expired.html');
    } else {
        $_SESSION['user']['pid'] = $_POST['pid'];
        $_SESSION['user']['eid'] = $_POST['eid'];
        $_SESSION['user']['name'] = $_POST['name'];
    }
} else {
    // For testing only
    $_SESSION['user']['pid'] = 'tg26539'; //OS 26539; //QV 15929; //30666; //16443;
    $_SESSION['user']['eid'] = 26539;
    $_SESSION['user']['name'] = 'Alpha Tester';
}
// Year & Period
$_SESSION['period'] = 'Q4';
$_SESSION['year'] = 2021;

if (!(isset($_SESSION['user']))) {
    header('location: expired.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS for Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- W3 CSS Link" -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Google font - Promy -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                        แบบประเมินศักยภาพของพนักงาน "Competency" ประจำไตรมาส <?php echo substr($_SESSION['period'], 1, 1); ?> ปี <?php echo $_SESSION['year']+543; ?>
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
                    <div class="w3-dropdown-content score-definations">
                        <table>
                            <colgroup>
                                <col>
                                <col>
                            </colgroup>
                            <tr>
                                <th>ระดับการให้คะแนน</th>
                                <th>คำจำกัดความ</th>
                            </tr>
                            <tr>
                                <td>5 <br> (โดดเด่น)</td>
                                <td>แสดงพฤติกรรมตามที่บริษัทกำหนดได้ครบถ้วน และพฤติกรรมดังกล่าวแสดงออกมา อย่างเด่นชัดเป็นรูปธรรม สูงกว่าที่บริษัทคาดหวัง และมีความต่อเนื่อง</td>
                            </tr>
                            <tr>
                                <td>4 <br> (เป็นจุดแข็ง)</td>
                                <td>แสดงพฤติกรรมตามที่บริษัทกำหนดได้ครบถ้วน และพฤติกรรมดังกล่าวแสดงออกมา ในระดับสูงกว่าที่บริษัทคาดหวังบ่อยครั้ง</td>
                            </tr>
                            <tr>
                                <td>3 <br> (มีประสิทธิผล)</td>
                                <td>แสดงพฤติกรรมตามที่บริษัทกำหนดได้ครบถ้วน และพฤติกรรมดังกล่าวแสดงออกมา ในระดับที่บริษัทคาดหวังบ่อยครั้ง</td>
                            </tr>
                            <tr>
                                <td>2 <br> (ควรได้รับการพัฒนา)</td>
                                <td>แสดงพฤติกรรมตามที่บริษัทกำหนดไว้ได้ไม่ครบถ้วน และพฤติกรรมดังกล่าวแสดงออกมาในระดับต่ำกว่าที่บริษัทคาดหวังและบ่อยครั้ง แต่มีศักยภาพในการพัฒนาหากได้รับการแนะนำ ส่งเสริม หรือฝึกอบรม จึงควรได้รับการพัฒนา</td>
                            </tr>
                            <tr>
                                <td>1 <br> (ต้องเร่งปรับปรุง)</td>
                                <td>ไม่แสดงพฤติกรรมได้ตามที่บริษัทกำหนดไว้ หรือมีเพียงเล็กน้อย และพฤติกรรมดังกล่าวแสดงออกมาในระดับที่ต่ำกว่าที่บริษัทคาดหวังเป็นอย่างมากและเป็นประจำ ต้องได้รับการปรับปรุงอย่างรวดเร็ว</td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="filter-boxes">
                    <div id="filter-btn" class="w3-dropdown-click">
                        <img src="./kpi_image/Icon material-filter-list.svg">
                    </div>
                    <form action="" class="w3-dropdown-content">
                        <div>
                            <div>
                                <div>
                                    <input type="radio" id="graded" name="graded_number_filter">
                                    <label for="graded">ให้คะแนนแล้ว</label>
                                    <span class="GRADED_NUMBER" id="GRADED_NUMBER">(100)</span>
                                </div>
                                <div>
                                    <input type="radio" id="not-graded" name="graded_number_filter">
                                    <label for="not-graded">ยังไม่ให้คะแนน</label>
                                    <span class="NOT_GRADED_NUMBER" id="NOT_GRADED_NUMBER">(900)</span>
                                </div>
                            </div>
                            <div>
                                <div class="level-checkboxes">
                                    <div>
                                        <input type="checkbox" value="1" id="lv1">
                                        <label for="lv1">Lv.1</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="2" id="lv2">
                                        <label for="lv2">Lv.2</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="3" id="lv3">
                                        <label for="lv3">Lv.3</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="4" id="lv4">
                                        <label for="lv4">Lv.4</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="5" id="lv5">
                                        <label for="lv5">Lv.5</label>

                                    </div>
                                    <div>
                                        <input type="checkbox" value="6" id="lv6">
                                        <label for="lv6">Lv.6</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="7" id="lv7">
                                        <label for="lv7">Lv.7</label>
                                    </div>
                                </div>
                                <div class="level-checkboxes">
                                    <div>
                                        <input type="checkbox" value="8" id="lv8">
                                        <label for="lv8">Lv.8</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="9" id="lv9">
                                        <label for="lv9">Lv.9</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="10" id="lv10">
                                        <label for="lv10">Lv.10</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="11" id="lv11">
                                        <label for="lv11">Lv.11</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="13" id="lv13">
                                        <label for="lv13">Lv.13</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" value="14" id="lv14">
                                        <label for="lv14">Lv.14</label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="submit" id="use-filter-button">
                                    นำไปใช้
                                </button>
                                <button id="cancel-form-btn">
                                    ยกเลิก
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
        <main>
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
                    </colgroup>
                    <!-- Table Header ========================================= -->
                    <thead>
                        <tr>
                            <th rowspan="1" colspan="3">
                                รายละเอียดพนักงาน
                            </th>
                            <th></th>
                            <th colspan="4" height="50">
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
                                <div class="w3-dropdown-hover">
                                    Weighted Competency (%)
                                    <div class="w3-dropdown-content">
                                        <img src="./kpi_image/total_score_weights2x.png">
                                    </div>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <td>Lv</td>
                            <td>ID</td>
                            <td>Name-Surname</td>
                            <td></td>
                            <td height="70">
                                <div class="w3-dropdown-hover">
                                    Service Orientation
                                    <div class="w3-dropdown-content">
                                        <h6>Service Orientation</h6>
                                        <ul>
                                            <li>สามารถตอบสนองต่อความต้องการของลูกค้าทั้งภายในและให้เกิดความพึงพอใจ</li>
                                            <li>มีทัศนคติเชิงบวกต่อการให้บริการและการเป็นตัวอย่างที่ดี</li>
                                            <li>เสนอแนะวิธีการปรับปรุงการให้บริการ เพื่อให้เกิดประสิทธิภาพมากยิ่งขึ้น</li>
                                        </ul>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="w3-dropdown-hover">
                                    Result Orientation
                                    <div class="w3-dropdown-content">
                                        <h6>Result Orientation</h6>
                                        <ul>
                                            <li>กำหนดเป้าหมายการทำงานที่ชัดเจน</li>
                                            <li>ทำงานได้ถูกต้องตามเป้าหมายที่กำหนด</li>
                                            <li>สามารถพัฒนาวิธีการทำงาน เพื่อให้ได้ผลงานที่ดีกว่าเดิม</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="w3-dropdown-hover">
                                    Flexibility and Adaptability
                                    <div class="w3-dropdown-content">
                                        <h6>Flexibility and Adaptability</h6>
                                        <ul>
                                            <li>ยอมรับและสนับสนุนการเปลี่ยนแปลงในสิ่งใหม่ๆ ที่เป็นประโยชน์ต่อองค์กร</li>
                                            <li>ปรับตัวเข้ากับสถานการณ์ที่เปลี่ยนแปลงได้อย่างรวดเร็ว</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Total
                            </td>
                            <td></td>
                            <td>
                                <div class="w3-dropdown-hover">
                                    Make It Happen
                                    <div class="w3-dropdown-content">
                                        <h6>Make It Happen</h6>
                                        <ul>
                                            <li>วางแผนและจัดการงานอย่างเป็นระบบ และมีขั้นตอนชัดเจนรวมทั้งติดตามงานจนสำเร็จ อย่างมีประสิทธิภาพ</li>
                                            <li>มอบหมายและผลักดันให้ทีมงาน ทำงานให้สำเร็จตามแผน</li>
                                            <li>ตั้งใจ ทุ่มเท และแสดงความรับผิดชอบของตนอย่างเต็มความสามารถ</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="w3-dropdown-hover">
                                    Provide Solutions
                                    <div class="w3-dropdown-content">
                                        <h6>Provide Solutions</h6>
                                        <ul>
                                            <li>รวบรวมข้อมูล เพื่อเข้าใจปัญหาอย่างรอบด้าน</li>
                                            <li>ระบุแนวทางการแก้ไขปัญหาและผลกระทบ อย่างมีเหตุผลและเป็นไปได้</li>
                                            <li>ตัดสินใจอย่างรอบคอบ และทันต่อเหตุการณ์</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="w3-dropdown-hover">
                                    Inspire <br> People
                                    <div class="w3-dropdown-content">
                                        <h6>Inspire People</h6>
                                        <ul>
                                            <li>สร้างบรรยากาศการทำงานเชิงบวก เพื่อก่อให้เกิดแรงบันดาลใจ รวมทั้งกระตุ้นให้ทีมงานร่วมมือการทำงานให้สำเร็จลุล่วง</li>
                                            <li>แสดงความชื่นชมหรือให้รางวัล เพื่อเพิ่มพูลขวัญและกำลังใจให้ทีมงานเกิดความมุ่งมั่นในการทำงาน</li>
                                            <li>รับฟังความคิดเห็นและให้การสนับสนุน โดยให้คำปรึกษา แลกเปลี่ยน สอนงาน และข้อเสนอแนะแก่ทีมงาน</li>
                                        </ul>
                                    </div>
                                </div>
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
                <button type="submit" id="submitPage">Submit This Page</button>
                <input type="hidden" id="numGraded" name="numGraded">
                <input type="hidden" id="totalRows" name="totalRows">
            </form>
            <div id="pagination-wrapper"></div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- Delete KPI_dummy_json.js below when connected to database!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!--script src="./KPI_dummy_json2.js"></script-->
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
                        response.score.forEach((item, index) => {
                            console.log(`${index} : ID=${item.ID} Score=${item.score}`);
                            $(`#ORIGINAL_SCORE_${item.ID}`).val(item.score);
                            // *** เอา APPRAISAL_COMPETENCY_TOTAL ใส่กลับไปใน filteredData ***;
                            for(let data of filteredData ){
                                if(data.APPRAISAL_EMPLOYEE_ID == item.ID ){
                                    data.APPRAISAL_COMPETENCY_TOTAL = item.competency_total 
                                }
                            }
                            //console.log($(`#ORIGINAL_SCORE_${item.ID}`).val());
                        });
                        $('#GRADED_NUMBER').html(response.gradedRows);
                        $('#NOT_GRADED_NUMBER').html(response.notGradedRows);
                        $('#numGraded').val(response.gradedRows);
                        $('#totalRows').val(response.totalRows);
                        //updateGradedNumbers(filteredData);
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
                        alert(response.message);
                    },
                    error: function(request, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
        });
        var req = new XMLHttpRequest();
        req.open("GET", "getappraisal.php", false);
        req.send(null);
        var unpackedData = JSON.parse(req.response);
        const dummyKPI = unpackedData.data;
        //$('#GRADED_NUMBER').html(unpackedData.gradedRows);
        //$('#NOT_GRADED_NUMBER').html(unpackedData.notGradedRows);
        //$('#numGraded').val(unpackedData.gradedRows);
        //$('#totalRows').val(unpackedData.totalRows);
        const rawData = dummyKPI;
        const gradedDataInit = rawData.filter(data => data.APPRAISAL_COMPETENCY_TOTAL != 0)
        const notGradedDataInit = rawData.filter(data => data.APPRAISAL_COMPETENCY_TOTAL == 0)
        let filteredData = rawData;

        const updateGradedNumbers = function(data) {
            let gradedFilteredData = data.filter(data => data.APPRAISAL_COMPETENCY_TOTAL != 0)
            let notGradedFilteredData = data.filter(data => data.APPRAISAL_COMPETENCY_TOTAL == 0)
            const gradedNumber = document.querySelector("span.GRADED_NUMBER")
            const notGradedNumber = document.querySelector("span.NOT_GRADED_NUMBER")
            gradedNumber.innerText = `(${gradedFilteredData.length})`
            notGradedNumber.innerText = `(${notGradedFilteredData.length})`
            $("#numGraded").val(gradedFilteredData.length)
            $("#totalRows").val(data.length)
            console.log("GRADED: " + gradedFilteredData.length)
            console.log("DATA LENGTH: " + data.length)
        }

        var state = {
            // 'querySet': rawData, //data json
            'page': 1, //start page
            'rows': 20, //number of rows showed
            'window': 10, //number of pagination buttons
        }
        const dropdownForm = document.querySelector(".filter-boxes").querySelector(".w3-dropdown-content");
        const filterBtn = document.querySelector("#filter-btn");
        const filterRadios = document.querySelectorAll(".filter-boxes input[type='radio']")
        const levelCheckboxes = document.querySelectorAll(".filter-boxes input[type='checkbox']")
        const useFilterBtn = document.querySelector('#use-filter-button')
        const cancelFormBtn = document.querySelector("#cancel-form-btn")
        const searchInput = document.querySelector("#search-id");
        const callBasicFunctions = function() {
                commentBoxControl()
                dynamicInputControl()
                assignRowStatus()
                rowStatusBySelect()
                rowStatusByComment()
                calculateScores()
                calculateScoresByInput()
                updateGradedNumbers(filteredData)
            }
            // for (const levelCheckbox of levelCheckboxes) {
            //     console.log(levelCheckbox.checked)
            // }

        useFilterBtn.addEventListener('click', function(e) {
            e.preventDefault();
            let checkedLevelBoxes = Array.from(levelCheckboxes).filter(levelCheckbox => levelCheckbox.checked)
            let checkedLevelValues = checkedLevelBoxes.map(levelCheckbox => Number(levelCheckbox.value))
            console.log(checkedLevelValues)
            if (filterRadios[0].checked) {
                filteredData = gradedDataInit;

            } else if (filterRadios[1].checked) {
                filteredData = notGradedDataInit;
            } else {
                filteredData = rawData;
            }
            if (checkedLevelValues.length > 0) {
                filteredData = filteredData.filter(data => checkedLevelValues.includes(data.APPRAISAL_LEVEL))
            }
            searchInput.value = ""
            $('.grading-tbody').empty()
            buildTable(filteredData)
            callBasicFunctions()

            dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
            filterBtn.addEventListener("mouseover", btnHoverActive)
            filterBtn.addEventListener("mouseleave", btnHoverOff)
        })
        cancelFormBtn.addEventListener('click', function(e) {
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
        let dataBySearch = filteredData

        searchInput.addEventListener('input', function() {
            console.log(this.value)
            let filterValue = this.value;

            if (filterValue != "") {
                dataBySearch = filteredData.filter(data => data.APPRAISAL_EMPLOYEE_ID.includes(filterValue) || data.APPRAISAL_EMPLOYEE_NAME.toUpperCase().includes(filterValue.toUpperCase()))
            } else {
                dataBySearch = filteredData
            }

            $('.grading-tbody').empty()
            buildTable(dataBySearch)
            callBasicFunctions()

        })
        buildTable(rawData)

        function pagination(querySet, page, rows) {

            var trimStart = (page - 1) * rows
            var trimEnd = trimStart + rows

            var trimmedData = querySet.slice(trimStart, trimEnd)

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

            wrapper.innerHTML = ``
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

            if (state.page != 1) {
                wrapper.innerHTML = `<button value=${1} class="page btn">&#171; First</button>` + wrapper.innerHTML
            }

            if (state.page != pages) {
                wrapper.innerHTML += `<button value=${pages} class="page btn">Last &#187;</button>`
            }
            $(`button[value = ${state.page}]`).css({
                border: "1px solid #330066"
            })
            $('.page').on('click', function() {
                $('.grading-tbody').empty()
                state.page = Number($(this).val())
                $(`button[value = ${state.page}]`).css({
                    border: "1px solid #330066"
                })
                buildTable(data)
                callBasicFunctions()
            })

        }

        function buildTable(Data) {
            var table = $('.grading-tbody')
            console.log("state.page to build: ", state.page)
            console.log("screenedData :", Data.length)
            if (Data.length <= (state.page - 1) * state.rows + 1) {
                state.page = 1
            }
            var data = pagination(Data, state.page, state.rows)
            var myList = data.querySet

            for (var i in myList) {
                //Keep in mind we are using "Template Litterals to create rows"
                var row = `<tr row-status="">
                <td class="EMPLOYEE_LEVEL">${myList[i].APPRAISAL_LEVEL}</td>
                <td class="EMPLOYEE_ID">${myList[i].APPRAISAL_EMPLOYEE_ID}</td>
                <td class="EMPLOYEE_FULLNAME">${myList[i].APPRAISAL_EMPLOYEE_NAME}</td>
                <td></td>
                <td class="service_orientation_score score">
                    <div>
                        <select name="CSCORE1[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="CSCORE1_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]"" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_CSCORE1}</textarea>

                    </div>
                </td>
                <td class=" result_orientation_score score ">
                    <div>
                        <select name="CSCORE2[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="CSCORE2_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_CSCORE2}</textarea>
                    </div>
                </td>
                <td class="flexibility_and_adaptability_score score ">
                    <div>
                        <select name="CSCORE3[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="CSCORE3_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_CSCORE3}</textarea>

                    </div>
                </td>
                <td class="core_competency_total total ">
                    <input name="CSCORE_TOTAL[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_CTOTAL}" type="text" readonly>
                </td>
                <td></td>
                <td class="make_it_happen_score score ">
                    <div>
                        <select name="LSCORE1[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="LSCORE1_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_LSCORE1}</textarea>

                    </div>
                </td>
                <td class="provide_solutions_score score ">
                    <div>
                        <select name="LSCORE2[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="LSCORE2_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_LSCORE2}</textarea>

                    </div>
                </td>
                <td class="inspire_people_score score ">
                    <div>
                        <select name="LSCORE3[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="LSCORE3_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_LSCORE3}</textarea>

                    </div>
                </td>
                <td class="leadership_competency_total total">
                    <input name="LSCORE_TOTAL[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_LTOTAL}" type="text " readonly>
                </td>

                <td class="raw_total grand_total">
                    <input name="COMPETENCY_TOTAL[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_TOTAL}" type="text " readonly>
                </td>
                <td class="total_competency_percent grand_total">
                    <input name="COMPETENCY_TOTAL100[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_TOTAL100}" type="text " readonly>
                    <input name="APPRAISAL_EMPLOYEE_ID[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_EMPLOYEE_ID}" id="APPRAISAL_EMPLOYEE_ID[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_EMPLOYEE_ID}" type="hidden">
                    <input name="ORIGINAL_SCORE[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].ORIGINAL_SCORE}" id="ORIGINAL_SCORE_${myList[i].APPRAISAL_EMPLOYEE_ID}" value="${myList[i].ORIGINAL_SCORE}" type="hidden">
                </td>
            </tr>
        `
                table.append(row)
                let n = Number(i) + 1
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.service_orientation_score option[value=${myList[i].APPRAISAL_COMPETENCY_CSCORE1}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.result_orientation_score option[value=${myList[i].APPRAISAL_COMPETENCY_CSCORE2}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.flexibility_and_adaptability_score option[value=${myList[i].APPRAISAL_COMPETENCY_CSCORE3}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.make_it_happen_score option[value=${myList[i].APPRAISAL_COMPETENCY_LSCORE1}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.provide_solutions_score option[value=${myList[i].APPRAISAL_COMPETENCY_LSCORE2}]`).attr("selected", "selected")
                $(`.grading-tbody > tr:nth-of-type(${n}) > td.inspire_people_score option[value=${myList[i].APPRAISAL_COMPETENCY_LSCORE3}]`).attr("selected", "selected")
            }
            pageButtons(Data, data.pages)
        }
    </script>

    <script src="./KPI_dropdown_control.js "></script>
    <script src="./KPI_comment_box_control.js"></script>
    <script src="./KPI_dynamic_input.js"></script>
    <script src="./KPI_row_status_control.js"></script>
    <script src="./KPI_score_calculation.js"></script>
    <!-- <script src="./KPI_id_filter_control.js"></script> -->
</body>
</html>