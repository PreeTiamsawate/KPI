const assignRowStatus = function() {
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")
    const submitPageBtn = document.querySelector("#submitPage")
    const paginationWrapper = document.querySelector("#pagination-wrapper")
    const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
    for (const gradingRow of gradingRows) {
        const rowSelects = gradingRow.querySelectorAll("td.score > div > select");
        const rowComments = gradingRow.querySelectorAll("td.score > div > textarea");
        let valueCount = 0
        let commentCount = 0
        for (const rowSelect of rowSelects) {
            if (rowSelect.value != "0")
                valueCount++
        }
        for (const rowComment of rowComments) {
            if (rowComment.value != "")
                commentCount++
        }
        // console.log("comments in row", commentCount)

        if (valueCount === rowSelects.length) {
            gradingRow.setAttribute("row-status", "fully-filled")
            gradingRow.style.backgroundColor = "#FFFFFF";

        } else if (valueCount !== rowSelects.length && valueCount !== 0) {
            gradingRow.setAttribute("row-status", "being-filled")
            gradingRow.style.backgroundColor = "#FFF0DC";
        }
        // else if (valueCount === 0 && commentCount > 0) {
        //     gradingRow.setAttribute("row-status", "being-filled")
        //     gradingRow.style.backgroundColor = "#FFF0DC";} 
        else if (valueCount === 0) {
            gradingRow.setAttribute("row-status", "")
            gradingRow.style.backgroundColor = "#F3F3F3";
        }
    }
    const orangeRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")

    if (orangeRows.length > 0) {
        submitPageBtn.style.backgroundColor = "#FCAC50";
        submitPageBtn.style.cursor = "not-allowed"
        submitPageBtn.disabled = true
        paginationWrapper.style.backgroundColor = "#FFF0DC";
        paginationWrapper.style.cursor = "not-allowed"
        for (const paginationBtn of paginationBtns) {
            paginationBtn.disabled = true
        }

    } else {
        submitPageBtn.style.backgroundColor = "#330066";
        submitPageBtn.style.cursor = "pointer"
        submitPageBtn.disabled = false
        paginationWrapper.style.backgroundColor = "transparent";
        paginationWrapper.style.cursor = "pointer"
        for (const paginationBtn of paginationBtns) {
            paginationBtn.disabled = false
        }
    }
}
assignRowStatus()
const rowStatusBySelect = function() {
    const scoreSelects = document.querySelectorAll("td.score > div > select")
    for (const scoreSelect of scoreSelects) {
        scoreSelect.addEventListener('change', function() {

            const submitPageBtn = document.querySelector("#submitPage")
            const paginationWrapper = document.querySelector("#pagination-wrapper")
            const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
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


            const orangeRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")
            const greenRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'newly-filled']")
            if (orangeRows.length > 0) {
                submitPageBtn.style.backgroundColor = "#FCAC50";
                submitPageBtn.style.cursor = "not-allowed"
                submitPageBtn.disabled = true
                paginationWrapper.style.backgroundColor = "#FFF0DC";
                paginationWrapper.style.cursor = "not-allowed"
                for (const paginationBtn of paginationBtns) {
                    paginationBtn.disabled = true
                }

            } else if (greenRows.length > 0) {
                submitPageBtn.style.backgroundColor = "#58CC51";
                submitPageBtn.style.cursor = "pointer"
                submitPageBtn.disabled = false
                paginationWrapper.style.backgroundColor = "transparent";
                paginationWrapper.style.cursor = "not-allowed"
                for (const paginationBtn of paginationBtns) {
                    paginationBtn.disabled = true
                }

            } else {
                submitPageBtn.style.backgroundColor = "#330066";
                submitPageBtn.style.cursor = "pointer"
                submitPageBtn.disabled = false
                paginationWrapper.style.backgroundColor = "transparent";
                paginationWrapper.style.cursor = "pointer"
                for (const paginationBtn of paginationBtns) {
                    paginationBtn.disabled = false
                }
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
            const submitPageBtn = document.querySelector("#submitPage")
            const paginationWrapper = document.querySelector("#pagination-wrapper")
            const paginationBtns = document.querySelectorAll("#pagination-wrapper > .btn")
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

            const orangeRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'being-filled']")
            const greenRows = document.querySelectorAll("tbody.grading-tbody > tr[row-status = 'newly-filled']")
            if (orangeRows.length > 0) {
                submitPageBtn.style.backgroundColor = "#FFF0DC";
                submitPageBtn.style.cursor = "not-allowed"
                submitPageBtn.disabled = true
                paginationWrapper.style.backgroundColor = "#FFF0DC";
                paginationWrapper.style.cursor = "not-allowed"
                for (const paginationBtn of paginationBtns) {
                    paginationBtn.disabled = true
                }

            } else if (greenRows.length > 0) {
                submitPageBtn.style.backgroundColor = "#58CC51";
                submitPageBtn.style.cursor = "pointer"
                submitPageBtn.disabled = false
                paginationWrapper.style.backgroundColor = "transparent";
                paginationWrapper.style.cursor = "not-allowed"
                for (const paginationBtn of paginationBtns) {
                    paginationBtn.disabled = true
                }

            } else {
                submitPageBtn.style.backgroundColor = "#330066";
                submitPageBtn.style.cursor = "pointer"
                submitPageBtn.disabled = false
                paginationWrapper.style.backgroundColor = "transparent";
                paginationWrapper.style.cursor = "pointer"
                for (const paginationBtn of paginationBtns) {
                    paginationBtn.disabled = false
                }
            }

        })
    }
}
rowStatusByComment()