// const searchInput = document.querySelector("#search-id");
// searchInput.addEventListener('keyup', function() {
//     console.log(this.value)
//     let filterValue = this.value.toUpperCase();
//     const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")

//     for (const gradingRow of gradingRows) {
//         const idCell = gradingRow.querySelectorAll("td")[1];
//         if (idCell) {
//             let idCellContent = idCell.textContent || idCell.innerText;
//             if (idCellContent.toUpperCase().indexOf(filterValue) > -1) {
//                 gradingRow.style.display = "";
//             } else {
//                 gradingRow.style.display = "none";
//             }

//         }

//     }
// })
// searchInput.addEventListener('keyup', function() {
//     console.log(this.value)
//     let filterValue = this.value.toUpperCase();
//     const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")

//     for (const gradingRow of gradingRows) {
//         const idCell = gradingRow.querySelectorAll("td")[1];
//         if (idCell) {
//             let idCellContent = idCell.textContent || idCell.innerText;
//             if (idCellContent.toUpperCase().indexOf(filterValue) > -1) {
//                 gradingRow.style.display = "";
//             } else {
//                 gradingRow.style.display = "none";
//             }

//         }

//     }
// })

submitPageBtn.style.backgroundColor = "#FCAC50";
submitPageBtn.style.cursor = "not-allowed"
submitPageBtn.disabled = true
paginationWrapper.style.backgroundColor = "#FFF0DC";
paginationWrapper.style.cursor = "not-allowed"
for (const paginationBtn of paginationBtns) {
    paginationBtn.disabled = true
}

submitPageBtn.style.backgroundColor = "#330066";
submitPageBtn.style.cursor = "pointer"
submitPageBtn.disabled = false
paginationWrapper.style.backgroundColor = "transparent";
paginationWrapper.style.cursor = "pointer"
for (const paginationBtn of paginationBtns) {
    paginationBtn.disabled = false
}

submitPageBtn.style.backgroundColor = "#58CC51";
submitPageBtn.style.cursor = "pointer"
submitPageBtn.disabled = false
paginationWrapper.style.backgroundColor = "transparent";
paginationWrapper.style.cursor = "not-allowed"
for (const paginationBtn of paginationBtns) {
    paginationBtn.disabled = true
}