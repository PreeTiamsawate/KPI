const dynamicInputControl = function() {
    const levelCells = document.querySelectorAll('tbody.grading-tbody > tr > td:nth-of-type(1)');
    for (const levelCell of levelCells) {
        const employeeLv = Number(levelCell.innerText)

        const parentRow = levelCell.parentElement;
        const employeeIdCell = parentRow.querySelector('td.EMPLOYEE_ID')
        const employeeId = employeeIdCell.innerText
        const reasonCode = employeeIdCell.getAttribute("reason-code").toLocaleLowerCase()
        const serviceCell = parentRow.querySelector('td.service_orientation_score')
        const resultCell = parentRow.querySelector('td.result_orientation_score')
        const flexibilityCell = parentRow.querySelector('td.flexibility_and_adaptability_score')
        const coreTotalCell = parentRow.querySelector('td.core_competency_total')
        const makeItCell = parentRow.querySelector('td.make_it_happen_score')
        const provideCell = parentRow.querySelector('td.provide_solutions_score')
        const inspireCell = parentRow.querySelector('td.inspire_people_score')
        const leaderTotalCell = parentRow.querySelector('td.leadership_competency_total')
        const rawTotalCell = parentRow.querySelector('td.raw_total')
        const total100Cell = parentRow.querySelector('td.total_competency_percent')
        const competencyNote= parentRow.querySelector('td.competency-note')
        if(reasonCode == "n"){
            makeItCell.innerHTML = "-" ;
            provideCell.innerHTML = "-" ;
            inspireCell.innerHTML = "-";
            serviceCell.innerHTML = "-" ;
            resultCell.innerHTML = "-";
            flexibilityCell.innerHTML = "-" ;
            coreTotalCell.innerHTML = "-" ;
            leaderTotalCell.innerHTML = "-";
            rawTotalCell.innerHTML = "-";
            total100Cell.innerHTML = "-";
        }else if (employeeLv >= 1 && employeeLv <= 7) {
            makeItCell.innerHTML = "-" + `<input type="hidden" name="LSCORE1[${employeeId}]">`;
            provideCell.innerHTML = "-" + `<input type="hidden" name="LSCORE2[${employeeId}]">`;
            inspireCell.innerHTML = "-" + `<input type="hidden" name="LSCORE3[${employeeId}]">`;
            leaderTotalCell.innerHTML = "-" + `<input type="hidden" name="LSCORE_TOTAL[${employeeId}]">`;
        } else if (employeeLv >= 11 && employeeLv <= 14) {
            serviceCell.innerHTML = "-" + `<input type="hidden" name="CSCORE1[${employeeId}]">`;
            resultCell.innerHTML = "-" + `<input type="hidden" name="CSCORE2[${employeeId}]">`;
            flexibilityCell.innerHTML = "-" + `<input type="hidden" name="CSCORE3[${employeeId}]">`;
            coreTotalCell.innerHTML = "-" + `<input type="hidden" name="CSCORE_TOTAL[${employeeId}]">`;
        }

        if(competencyNote.getAttribute('note-data') != "null"){
            const noteMark = competencyNote.querySelector('img');
            const noteContainer = competencyNote.querySelector('div');
            noteMark.classList.remove('d-none');
            noteMark.addEventListener('mouseenter' ,()=>{
                noteContainer.classList.remove('d-none');
                noteContainer.innerText = competencyNote.getAttribute('note-data')
                noteContainer.style.position = "absolute"
            });
            noteMark.addEventListener('mouseleave' ,()=>{
                noteContainer.classList.add('d-none');
                
            });
        }
    }
}
dynamicInputControl()