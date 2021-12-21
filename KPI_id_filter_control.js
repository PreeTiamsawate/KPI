const searchInput = document.querySelector("#search-id");
searchInput.addEventListener('keyup', function() {
    console.log(this.value)
    let filterValue = this.value.toUpperCase();
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")

    for (const gradingRow of gradingRows) {
        const idCell = gradingRow.querySelectorAll("td")[1];
        if (idCell) {
            let idCellContent = idCell.textContent || idCell.innerText;
            if (idCellContent.toUpperCase().indexOf(filterValue) > -1) {
                gradingRow.style.display = "";
            } else {
                gradingRow.style.display = "none";
            }

        }

    }
})