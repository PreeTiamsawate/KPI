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
    if (employeeLv >= 1 && employeeLv <= 7) {
        makeItCell.innerHTML = "-";
        provideCell.innerHTML = "-";
        inspireCell.innerHTML = "-";
        leaderTotalCell.innerHTML = "-";
    } else if (employeeLv >= 11 && employeeLv <= 14) {
        serviceCell.innerHTML = "-";
        resultCell.innerHTML = "-";
        flexibilityCell.innerHTML = "-";
        coreTotalCell.innerHTML = "-";
    }
}