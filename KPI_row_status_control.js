const allStatus = function() {
    const orangeRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")
    const greenRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'newly-filled']")
    const redCells = document.querySelectorAll("td.score > div > select[select-status = 'edge-score']")
    let isOrangeThere = false
    let isGreenThere = false
    let isRedThere = false
    if (orangeRows.length > 0) {
        isOrangeThere = true
    }
    if (greenRows.length > 0) {
        isGreenThere = true
    }
    if (redCells.length > 0) {
        isRedThere = true
    }
    return { isOrangeThere, isGreenThere, isRedThere }
}
const setRedBtns = function() {
    const submitPageBtn = document.querySelector("#submitPage")
    const paginationWrapper = document.querySelector("#pagination-wrapper")
    const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
    submitPageBtn.style.backgroundColor = "#ff6961"
    submitPageBtn.style.cursor = "not-allowed"
    submitPageBtn.disabled = true
    paginationWrapper.style.backgroundColor = "rgba(255,105,97,0.2)"
    paginationWrapper.style.cursor = "not-allowed"
    for (const paginationBtn of paginationBtns) {
        paginationBtn.disabled = true
    }
}
const setOrangeBtns = function() {
    const submitPageBtn = document.querySelector("#submitPage")
    const paginationWrapper = document.querySelector("#pagination-wrapper")
    const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
    submitPageBtn.style.backgroundColor = "#FCAC50";
    submitPageBtn.style.cursor = "not-allowed"
    submitPageBtn.disabled = true
    paginationWrapper.style.backgroundColor = "#FFF0DC";
    paginationWrapper.style.cursor = "not-allowed"
    for (const paginationBtn of paginationBtns) {
        paginationBtn.disabled = true
    }
}

const setGreenBtns = function() {
    const submitPageBtn = document.querySelector("#submitPage")
    const paginationWrapper = document.querySelector("#pagination-wrapper")
    const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
    submitPageBtn.style.backgroundColor = "#58CC51";
    submitPageBtn.style.cursor = "pointer"
    submitPageBtn.disabled = false
    paginationWrapper.style.backgroundColor = "transparent";
    paginationWrapper.style.cursor = "not-allowed"
    for (const paginationBtn of paginationBtns) {
        paginationBtn.disabled = true
    }
}



const setDefaultBtns = function() {
    const submitPageBtn = document.querySelector("#submitPage")
    const paginationWrapper = document.querySelector("#pagination-wrapper")
    const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
    submitPageBtn.style.backgroundColor = "#330066";
    submitPageBtn.style.cursor = "pointer"
    submitPageBtn.disabled = false
    paginationWrapper.style.backgroundColor = "transparent";
    paginationWrapper.style.cursor = "pointer"
    for (const paginationBtn of paginationBtns) {
        paginationBtn.disabled = false
    }
}
const assignRowStatus = function() {
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")
    for (const gradingRow of gradingRows) {
        const rowSelects = gradingRow.querySelectorAll("td.score > div > select");
        const rowComments = gradingRow.querySelectorAll("td.score > div > textarea");
        let valueCount = 0
        for (const rowSelect of rowSelects) {
            if (rowSelect.value != "0")
                valueCount++
        }
        for (const rowComment of rowComments) {
            if (rowComment.value != "")
                commentCount++
        }


        if (valueCount === rowSelects.length) {
            gradingRow.setAttribute("row-status", "fully-filled")
            gradingRow.style.backgroundColor = "#FFFFFF";

        } else if (valueCount !== rowSelects.length && valueCount !== 0) {
            gradingRow.setAttribute("row-status", "being-filled")
            gradingRow.style.backgroundColor = "#FFF0DC";
        } else if (valueCount === 0) {
            gradingRow.setAttribute("row-status", "")
            gradingRow.style.backgroundColor = "#F3F3F3";
        }
    }
    const orangeRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")

    if (allStatus().isOrangeThere) {
        setOrangeBtns()
    } else {
        setDefaultBtns()
    }
}
assignRowStatus()
const rowStatusBySelect = function() {
    const scoreSelects = document.querySelectorAll("td.score > div > select")
    for (const scoreSelect of scoreSelects) {
        scoreSelect.addEventListener('change', function() {
            const currentGradingRow = this.parentElement.parentElement.parentElement;
            const rowCommentBoxs = currentGradingRow.querySelectorAll("td.score > div > textarea")
            const rowSelects = currentGradingRow.querySelectorAll("td.score > div > select");
            let valueCount = 0
            for (const rowSelect of rowSelects) {
                if (rowSelect.value != "0")
                    valueCount++
            }

            if (valueCount === rowSelects.length) {
                currentGradingRow.setAttribute("row-status", "newly-filled")
                currentGradingRow.style.backgroundColor = "#E3FFE1";

            } else if (valueCount !== rowSelects.length && valueCount !== 0) {
                currentGradingRow.setAttribute("row-status", "being-filled")
                currentGradingRow.style.backgroundColor = "#FFF0DC";
            } else if (valueCount === 0) {
                currentGradingRow.setAttribute("row-status", "")
                currentGradingRow.style.backgroundColor = "#F3F3F3";
                for (const rowCommentBox of rowCommentBoxs) {

                    if (rowCommentBox.value != "") {
                        rowCommentBox.value = ""
                        rowCommentBox.previousElementSibling.setAttribute("src", "./kpi_image/Icon-empty-comment.svg")
                    }
                }
            }

            if (allStatus().isRedThere) {
                setRedBtns()
            } else if (allStatus().isOrangeThere) {
                setOrangeBtns()
            } else if (allStatus().isGreenThere) {
                setGreenBtns()
            } else {
                setDefaultBtns()
            }
        })
    }
}
rowStatusBySelect()
const rowStatusByComment = function() {
    const commentBoxes = document.querySelectorAll("td.score > div > textarea")
    for (const commentBox of commentBoxes) {
        const gradingRow = commentBox.parentElement.parentElement.parentElement;
        const originalScoreSelects = gradingRow.querySelectorAll("td.score > div > select")
        const rowOriginalAttribute = gradingRow.getAttribute("row-status")
        let originalScores = []
        for (const originalScoreSelect of originalScoreSelects) {
            originalScores.push(originalScoreSelect.value)
        }
        const equals = (a, b) => JSON.stringify(a) === JSON.stringify(b);
        commentBox.addEventListener('input', function() {
            const currentGradingRow = this.parentElement.parentElement.parentElement;
            const currentGradingRowAtt = currentGradingRow.getAttribute("row-status")
            const currentScoreSelects = currentGradingRow.querySelectorAll("td.score > div > select")
            let currentScores = []

            for (const currentScoreSelect of currentScoreSelects) {
                currentScores.push(currentScoreSelect.value)
            }
            if (this.value != "" && (rowOriginalAttribute == "fully-filled" || currentGradingRowAtt == "newly-filled")) {
                currentGradingRow.style.backgroundColor = "#E3FFE1";
                currentGradingRow.setAttribute("row-status", "newly-filled")
            } else if (this.value == "" && (rowOriginalAttribute == "fully-filled" || currentGradingRowAtt == "newly-filled")) {
                if (equals(originalScores, currentScores)) {
                    console.log(true)
                    currentGradingRow.style.backgroundColor = "#FFFFFF";
                    currentGradingRow.setAttribute("row-status", "fully-filled")


                } else {
                    console.log(false)
                    currentGradingRow.setAttribute("row-status", "newly-filled")
                    currentGradingRow.style.backgroundColor = "#E3FFE1";
                }

            }
            if (allStatus().isRedThere) {
                setRedBtns()
            } else if (allStatus().isOrangeThere) {
                setOrangeBtns()
            } else if (allStatus().isGreenThere) {
                setGreenBtns()
            } else {
                setDefaultBtns()
            }

        })
    }
}
rowStatusByComment()
const commentRequired = function() {
    const scoreSelects = document.querySelectorAll("td.score > div > select");
    for (const scoreSelect of scoreSelects) {
        const containerCell = scoreSelect.parentElement;
        const commentBox = containerCell.querySelector("textarea");
        const commentBoxIcon = containerCell.querySelector("img");
        const blockProperties = function() {
            alert("สำหรับคะแนน 1 และ 5 ผู้ประเมินต้องใส่ความคิดเห็น")
            scoreSelect.setAttribute("select-status", "edge-score")
            commentBoxIcon.style.border = "3px solid #ff6961"
            commentBoxIcon.style.borderRadius = "5px"
        }
        const unblockProperties = function() {
            scoreSelect.setAttribute("select-status", "")
            commentBoxIcon.style.border = "none"
        }

        scoreSelect.addEventListener("change", function() {
            if ((scoreSelect.value == "1" || scoreSelect.value == "5") && commentBox.value == "") {
                blockProperties()
            } else {
                unblockProperties()
            }
            if (allStatus().isRedThere) {
                setRedBtns()
            } else if (allStatus().isOrangeThere) {
                setOrangeBtns()
            } else if (allStatus().isGreenThere) {
                setGreenBtns()
            } else {
                setDefaultBtns()
            }
        })
        commentBox.addEventListener("input", function() {
            if ((scoreSelect.value == "1" || scoreSelect.value == "5") && commentBox.value == "") {
                blockProperties()
            } else {
                unblockProperties()
            }
            if (allStatus().isRedThere) {
                setRedBtns()
            } else if (allStatus().isOrangeThere) {
                setOrangeBtns()
            } else if (allStatus().isGreenThere) {
                setGreenBtns()
            } else {
                setDefaultBtns()
            }
        })
    }
}
commentRequired()