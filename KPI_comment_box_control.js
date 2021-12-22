const commentBoxControl = function() {
    const commentIcons = document.querySelectorAll("td.score > div > .w3-dropdown-click");
    const commentBoxes = document.querySelectorAll("td.score > div > .w3-dropdown-content");
    const boxParents = document.querySelectorAll("td.score > div");

    for (const commentIcon of commentIcons) {
        commentIcon.addEventListener('click', function() {
            const commentBox = this.nextElementSibling;
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
            } else if (this.value === "" || commentBox.innerText === "") {
                commentIcon.setAttribute("src", "./kpi_image/Icon-empty-comment.svg")
            }
        })

    }
}
commentBoxControl()