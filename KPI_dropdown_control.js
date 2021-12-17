const filterBtn = document.querySelector("#filter-btn");
const dropdownForm = document.querySelector(".filter-boxes").querySelector(".w3-dropdown-content");
const cancelFormBtn = document.querySelector("#cancel-form-btn")
const btnHoverActive = function() {
    this.style.border = "2px solid #444444"
}
const btnHoverOff = function() {
    this.style.border = "1px solid #DEDEDE"
}

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
cancelFormBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if (dropdownForm.className.indexOf("w3-show") == -1) {
        dropdownForm.className += " w3-show";
        filterBtn.style.border = "2px solid #444444"

    } else {
        dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
        // filterBtn.style.border = "1px solid #DEDEDE"
        filterBtn.addEventListener("mouseover", btnHoverActive)
        filterBtn.addEventListener("mouseleave", btnHoverOff)

    }

})