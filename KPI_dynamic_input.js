const dynamicInputControl = function() {
    const levelCells = document.querySelectorAll('tbody.grading-tbody > tr > td:nth-of-type(1)');
    for (const levelCell of levelCells) {
        const employeeLv = Number(levelCell.innerText)

        const parentRow = levelCell.parentElement;
        const employeeId = parentRow.querySelector('td.EMPLOYEE_ID').innerText
        const serviceCell = parentRow.querySelector('td.service_orientation_score')
        const resultCell = parentRow.querySelector('td.result_orientation_score')
        const flexibilityCell = parentRow.querySelector('td.flexibility_and_adaptability_score')
        const coreTotalCell = parentRow.querySelector('td.core_competency_total')
        const makeItCell = parentRow.querySelector('td.make_it_happen_score')
        const provideCell = parentRow.querySelector('td.provide_solutions_score')
        const inspireCell = parentRow.querySelector('td.inspire_people_score')
        const leaderTotalCell = parentRow.querySelector('td.leadership_competency_total')
        if (employeeLv >= 1 && employeeLv <= 7) {
            makeItCell.innerHTML = "-" + `<input type="hidden" name="LSCORE1[${employeeId}]" value="0">`;
            provideCell.innerHTML = "-" + `<input type="hidden" name="LSCORE2[${employeeId}]" value="0">`;
            inspireCell.innerHTML = "-" + `<input type="hidden" name="LSCORE3[${employeeId}]" value="0">`;
            leaderTotalCell.innerHTML = "-" + `<input type="hidden" name="LSCORE_TOTAL[${employeeId}]" value="0">`;
        } else if (employeeLv >= 11 && employeeLv <= 14) {
            serviceCell.innerHTML = "-" + `<input type="hidden" name="CSCORE1[${employeeId}]" value="0">`;
            resultCell.innerHTML = "-" + `<input type="hidden" name="CSCORE2[${employeeId}]" value="0">`;
            flexibilityCell.innerHTML = "-" + `<input type="hidden" name="CSCORE3[${employeeId}]" value="0">`;
            coreTotalCell.innerHTML = "-" + `<input type="hidden" name="CSCORE_TOTAL[${employeeId}]" value="0">`;
        }
    }
}
dynamicInputControl()