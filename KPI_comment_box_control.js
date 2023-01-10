const commentBoxControl = function() {
    const commentIcons = document.querySelectorAll("td.score > div > .w3-dropdown-click");
    const commentBoxes = document.querySelectorAll("td.score > div > .w3-dropdown-content");
    const boxParents = document.querySelectorAll("td.score > div");
    const scoreSelects = document.querySelectorAll("td.score > div > select");
    for (const scoreSelect of scoreSelects) {
        scoreSelect.addEventListener('click', function() {
            const commentBox = this.nextElementSibling.nextElementSibling;
            const boxParent = this.parentElement;
            commentBox.classList.remove("w3-show")
            boxParent.style.border = "none";
        })
        scoreSelect.addEventListener('change', function() {
            const commentBox = this.nextElementSibling.nextElementSibling;
            const commentIcon = this.nextElementSibling;
            if (this.value == "0") {
                commentIcon.setAttribute("src", "./kpi_image/Icon-empty-comment.svg")
                commentBox.innerText = ""
            }
        })
    }

    for (const commentIcon of commentIcons) {
        commentIcon.addEventListener('click', function() {
            const commentBox = this.nextElementSibling;
            const scoreSelect = this.previousElementSibling;
            const boxParent = this.parentElement;
            if (commentBox.className.indexOf("w3-show") == -1) {
                for (const otherBox of commentBoxes) {
                    if (otherBox.className.indexOf("w3-show") != -1) {
                        otherBox.className = otherBox.className.replace(" w3-show", "");
                        console.log("First")
                        for (const otherParent of boxParents) {
                            otherParent.style.border = "none";
                        }
                    }
                }

                if (scoreSelect.value == "0") {
                    commentBox.disabled = true
                    commentBox.innerText = ""
                    commentBox.setAttribute("placeholder", "กรุณาใส่คะแนนก่อนจึงจะสามารถกรอกคำอธิบายประกอบการประเมินได้")

                } else {
                    commentBox.disabled = false
                    commentBox.setAttribute("placeholder", "คำอธิบายประกอบการประเมิน(ความยาวไม่เกิน 800 ตัวอักษร)")
                }
                commentBox.className += " w3-show";
                boxParent.style.border = "1px solid #330066";
                boxParent.style.borderRadius = "5px"

            } else {
                commentBox.className = commentBox.className.replace(" w3-show", "");
                boxParent.style.border = "none";
                console.log("third")

            }

        })
    }

    for (const commentBox of commentBoxes) {
        const commentIcon = commentBox.previousElementSibling;
        if (commentBox.innerText !== "" || commentBox.value !== "") {
            commentIcon.setAttribute("src", "./kpi_image/Icon-filled-comment.svg")

        }
        commentBox.addEventListener('input', function() {
            if (this.value !== "" || commentBox.innerText !== "") {
                commentIcon.setAttribute("src", "./kpi_image/Icon-filled-comment.svg")
                if (commentBox.value.includes('|')) {
                    commentBox.value = commentBox.value.replace('|', '');
                    alert(" | is not allowed  ")
                }
            } else if (this.value === "" || commentBox.innerText === "") {
                commentIcon.setAttribute("src", "./kpi_image/Icon-empty-comment.svg")
            }
        })

    }
}

const masterCommentBoxControl = ()=>{
    const commentIcons = document.querySelectorAll("td.master_comment > div > .w3-dropdown-click");
    const commentBoxes = document.querySelectorAll("td.master_comment > div > .w3-dropdown-content");
    const boxParents = document.querySelectorAll("td.master_comment > div");

    for (const commentIcon of commentIcons) {
        commentIcon.addEventListener('click', function() {
            const commentBox = this.nextElementSibling;
            const boxParent = this.parentElement;
            if (commentBox.className.indexOf("w3-show") == -1) {
                commentBox.className += " w3-show";
                boxParent.style.border = "1px solid #330066";
                boxParent.style.borderRadius = "5px"
            } else {
                commentBox.className = commentBox.className.replace(" w3-show", "");
                boxParent.style.border = "none";
            

            }
        })
    }
    for (const commentBox of commentBoxes) {
        const commentIcon = commentBox.previousElementSibling;
        if (commentBox.innerText !== "" || commentBox.value !== "") {
            commentIcon.setAttribute("src", "./kpi_image/Icon-filled-comment.svg")

        }
        commentBox.addEventListener('input', function() {
            if (this.value !== "" || commentBox.innerText !== "") {
                commentIcon.setAttribute("src", "./kpi_image/Icon-filled-comment.svg")
                if (commentBox.value.includes('|')) {
                    commentBox.value = commentBox.value.replace('|', '');
                    alert(" | is not allowed  ")
                }
            } else if (this.value === "" || commentBox.innerText === "") {
                commentIcon.setAttribute("src", "./kpi_image/Icon-empty-comment.svg")
            }
        })

    }

}
commentBoxControl()
masterCommentBoxControl()