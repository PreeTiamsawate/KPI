const assignRowStatus = function() {
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")
    const submitPageBtn = document.querySelector("#submitPage")
    const paginationWrapper = document.querySelector("#pagination-wrapper")
    const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
    for (const gradingRow of gradingRows) {
        const rowSelects = gradingRow.querySelectorAll("td.score > div > select");
        let valueCount = 0
        for (const rowSelect of rowSelects) {
            if (rowSelect.value != "0")
                valueCount++
        }

        if (valueCount === rowSelects.length) {
            gradingRow.setAttribute("row-status", "fully-filled")
            gradingRow.style.backgroundColor = "#FFFFFF";

        } else if (valueCount !== rowSelects.length && valueCount !== 0) {
            gradingRow.setAttribute("row-status", "being-filled")
            gradingRow.style.backgroundColor = "#F9E8FF";
        } else if (valueCount === 0) {
            gradingRow.setAttribute("row-status", "")
            gradingRow.style.backgroundColor = "#F3F3F3";
        }
    }
    const purpleRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")

    if (purpleRows.length > 0) {
        submitPageBtn.style.backgroundColor = "#F9E8FF";
        submitPageBtn.style.cursor = "not-allowed"
        submitPageBtn.disabled = true
        paginationWrapper.style.backgroundColor = "#F9E8FF";
        paginationWrapper.style.cursor = "not-allowed"
        for (const paginationBtn of paginationBtns) {
            paginationBtn.disabled = true
        }

    } else {
        submitPageBtn.style.backgroundColor = "#FFFFFF";
        submitPageBtn.style.cursor = "pointer"
        submitPageBtn.disabled = false
        paginationWrapper.style.backgroundColor = "#FFFFFF";
        paginationWrapper.style.cursor = "pointer"
        for (const paginationBtn of paginationBtns) {
            paginationBtn.disabled = false
        }
    }
}
assignRowStatus()
const rowStatusByInput = function() {
    const scoreSelects = document.querySelectorAll("td.score > div > select")
    for (const scoreSelect of scoreSelects) {
        scoreSelect.addEventListener('change', assignRowStatus)
    }
}
rowStatusByInput()


// const purpleRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")
// const getRowAlert = function(e) {
//     e.preventDefault();
//     alert("จงเติมคะแนนในแถวสีม่วงอ่อนให้ครบทุกช่อง")
// }
// submitPageBtn.addEventListener('click', function(e) {
//     if (purpleRows.length > 0) {
//         e.preventDefault();
//         alert("จงเติมคะแนนในแถวสีม่วงอ่อนให้ครบทุกช่อง")
//     }
// })

// if (purpleRows.length > 0) {
//     submitPageBtn.addEventListener('click', getRowAlert)
// } else {
//     submitPageBtn.removeEventListener('click', getRowAlert)
// }