const controlHeaderDropdowns = function() {
    const filterBtn = document.querySelector("#filter-btn");
    const dropdownForm = document.querySelector(".filter-boxes").querySelector(".w3-dropdown-content");
    const cancelFormBtn = document.querySelector("#cancel-form-btn")
    const filterRadios = document.querySelectorAll(".filter-boxes input[type='radio']")
    const gradedNumber = document.querySelector("span.GRADED_NUMBER")
    const notGradedNumber = document.querySelector("span.NOT_GRADED_NUMBER")
    const useFilterBtn = document.querySelector('#use-filter-button')
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")


    gradedNumber.innerText = `(${gradedData.length})` //From pagination script
    notGradedNumber.innerText = `(${notGradedData.length})` //From pagination script
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
        // Do it in the morning!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
        // const filterRows = function() {
        //     if (filterRadios[0].checked) {
        //         filteredData = gradedData;
        //         console.log(filteredData)
        //     } else if (filterRadios[1].checked) {
        //         filteredData = notGradedData;
        //         console.log(filteredData)
        //     } else {

    // }
    // useFilterBtn.addEventListener('click', function(e) {
    //     e.preventDefault();
    //     if (filterRadios[0].checked) {
    //         filteredData = gradedData;
    //         console.log(filteredData)
    //     } else if (filterRadios[1].checked) {
    //         filteredData = notGradedData;
    //         console.log(filteredData)
    //     } else {
    //         filteredData = rawData;

    //     }

    //     dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
    //     filterBtn.addEventListener("mouseover", btnHoverActive)
    //     filterBtn.addEventListener("mouseleave", btnHoverOff)
    // })
    cancelFormBtn.addEventListener('click', function(e) {
        e.preventDefault();

        dropdownForm.className = dropdownForm.className.replace(" w3-show", "");
        filterBtn.addEventListener("mouseover", btnHoverActive)
        filterBtn.addEventListener("mouseleave", btnHoverOff)

        for (const filterRadio of filterRadios)
            filterRadio.checked = false

    })
}
controlHeaderDropdowns()