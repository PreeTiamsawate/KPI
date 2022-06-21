const buildTablePrint = function(data) {
    const myList = data;
    let table = document.querySelector(".grading-tbody")

    for (var i in myList) {
        var row = `<tr>
                        <td class="EMPLOYEE_LEVEL">${myList[i].APPRAISAL_LEVEL}</td>
                        <td class="EMPLOYEE_ID">${myList[i].EMPLOYEE_ID}</td>
                        <td class="FUNCTION">${myList[i].FUNCTION}</td>
                        <td class="EMPLOYEE_FULLNAME">${myList[i].EMPLOYEE_NAME}</td>
                        <td></td>
                        <td class="service_orientation_score score">${myList[i].COMPETENCY_CORE1 || 0}</td>
                        <td class=" result_orientation_score score">${myList[i].COMPETENCY_CORE2 || 0}</td>
                        <td class="flexibility_and_adaptability_score score">${myList[i].COMPETENCY_CORE3 || 0}</td>
                        <td class="core_competency_total total d-none">${myList[i].COMPETENCY_WT_CORE || 0}</td>
                        <td></td>
                        <td class="make_it_happen_score score">${myList[i].COMPETENCY_LEAD1 || 0}</td>
                        <td class="provide_solutions_score score">${myList[i].COMPETENCY_LEAD2 || 0}</td>
                        <td class="inspire_people_score score">${myList[i].COMPETENCY_LEAD3 || 0}</td>
                        <td class="leadership_competency_total total d-none">${myList[i].COMPETENCY_WT_LEAD || 0}</td>
                        <td class="raw_total grand_total d-none">${myList[i].COMPETENCY_WT_TOTAL || 0}</td>
                        <td></td>
                        <td class="total_competency_percent grand_total ">${myList[i].COMPETENCY_WT100 || 0}</td>
                    </tr>
    `

        table.innerHTML = table.innerHTML + row

    }
    const levelCells = document.querySelectorAll('tbody.grading-tbody > tr > td:nth-of-type(1)');
    for (const levelCell of levelCells) {
        const employeeLv = Number(levelCell.innerText)

        const parentRow = levelCell.parentElement;
        const serviceCell = parentRow.querySelector('td.service_orientation_score')
        const resultCell = parentRow.querySelector('td.result_orientation_score')
        const flexibilityCell = parentRow.querySelector('td.flexibility_and_adaptability_score')
        const coreTotalCell = parentRow.querySelector('td.core_competency_total')
        const makeItCell = parentRow.querySelector('td.make_it_happen_score')
        const provideCell = parentRow.querySelector('td.provide_solutions_score')
        const inspireCell = parentRow.querySelector('td.inspire_people_score')
        const leaderTotalCell = parentRow.querySelector('td.leadership_competency_total')
        const totalScoreCell = parentRow.querySelector('td.raw_total')
        const totalPercentCell = parentRow.querySelector('td.total_competency_percent')
        if (totalScoreCell.innerText == "0") {
            const badCells = [resultCell, flexibilityCell, coreTotalCell, makeItCell, provideCell, inspireCell, leaderTotalCell, totalScoreCell, totalPercentCell]
            for (let badCell of badCells) {
                parentRow.removeChild(badCell)
            }
            serviceCell.setAttribute("colspan", "10")
            serviceCell.classList.add("not-graded-watermark")
            serviceCell.innerText = "ยังไม่ได้รับการประเมินศักยภาพ"
        } else if (employeeLv >= 1 && employeeLv <= 7) {
            makeItCell.innerHTML = "-"
            provideCell.innerHTML = "-"
            inspireCell.innerHTML = "-"
            leaderTotalCell.innerHTML = "-"
        } else if (employeeLv >= 11 && employeeLv <= 14) {
            serviceCell.innerHTML = "-"
            resultCell.innerHTML = "-"
            flexibilityCell.innerHTML = "-"
            coreTotalCell.innerHTML = "-"
        }
    }

}