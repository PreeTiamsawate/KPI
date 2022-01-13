const btnHoverActive = function() {
    this.style.border = "2px solid #444444"
}
const btnHoverOff = function() {
    this.style.border = "1px solid #DEDEDE"
}
const controlHeaderDropdowns = function() {
    const filterBtn = document.querySelector("#filter-btn");
    const dropdownForm = document.querySelector(".filter-boxes").querySelector(".w3-dropdown-content");


    const gradedNumber = document.querySelector("span.GRADED_NUMBER")
    const notGradedNumber = document.querySelector("span.NOT_GRADED_NUMBER")

    gradedNumber.innerText = `(${gradedDataInit.length})` //From pagination script
    notGradedNumber.innerText = `(${notGradedDataInit.length})` //From pagination script


    filterBtn.addEventListener('click', function() {
        if (dropdownForm.className.indexOf("w3-show") == -1) {
            dropdownForm.className += " w3-show";
            this.style.border = "2px solid #444444"

        } else {
            dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
            // this.style.border = "1px solid #DEDEDE"
            this.addEventListener("mouseover", btnHoverActive)
            this.addEventListener("mouseleave", btnHoverOff)

        }
    })
}
controlHeaderDropdowns()