const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")

const assignRowStatus = function() {
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
}
assignRowStatus()
const scoreSelects = document.querySelectorAll("td.score > div > select")
for (const scoreSelect of scoreSelects) {
    scoreSelect.addEventListener('change', assignRowStatus)
}