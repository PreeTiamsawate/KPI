const calculateScores = function() {
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")
    const getValue = function(expectedComponet) {
            return (expectedComponet ? Number(expectedComponet.value) : 0)
        }
        // const getComponent = function(expectedComponet) {
        //     return (expectedComponet ? expectedComponet : 0)
        // }



    for (const gradingRow of gradingRows) {
        const employeeLv = Number(gradingRow.querySelectorAll("td")[0].innerText)
        let serviceScore = getValue(gradingRow.querySelector("td.service_orientation_score > div > select"))
        let resultScore = getValue(gradingRow.querySelector("td.result_orientation_score > div > select"))
        let flexibilityScore = getValue(gradingRow.querySelector("td.flexibility_and_adaptability_score > div > select"))
        let makeItScore = getValue(gradingRow.querySelector("td.make_it_happen_score > div > select"))
        let provideScore = getValue(gradingRow.querySelector("td.provide_solutions_score > div > select"))
        let inspireScore = getValue(gradingRow.querySelector("td.inspire_people_score > div > select"))
        let coreTotal = getValue(gradingRow.querySelector("td.core_competency_total > input"))
        let leaderTotal = getValue(gradingRow.querySelector("td.leadership_competency_total > input"))
        let rawTotal = getValue(gradingRow.querySelector("td.raw_total > input"))
        let competencyPercentTotal = getValue(gradingRow.querySelector("td.total_competency_percent > input"))
        const competencyPercentTotalInput = gradingRow.querySelector("td.total_competency_percent > input")

        coreTotal = serviceScore + resultScore + flexibilityScore;
        leaderTotal = makeItScore + provideScore + inspireScore;
        rawTotal = coreTotal + leaderTotal;
        if (gradingRow.querySelector("td.core_competency_total > input")) {
            gradingRow.querySelector("td.core_competency_total > input").setAttribute("value", String(coreTotal))
        }
        if (gradingRow.querySelector("td.leadership_competency_total > input")) {
            gradingRow.querySelector("td.leadership_competency_total > input").setAttribute("value", String(leaderTotal))
        }
        gradingRow.querySelector("td.raw_total > input").setAttribute("value", String(rawTotal))
        const getCompetencyPercentTotal = function(coreWeight, leaderWeight) {
            return ((coreTotal * coreWeight / 15) + (leaderTotal * leaderWeight / 15)).toFixed(2)
        }

        if (employeeLv >= 1 && employeeLv <= 7) {
            competencyPercentTotal = getCompetencyPercentTotal(50, 0)
        } else if (employeeLv >= 8 && employeeLv <= 9) {
            competencyPercentTotal = getCompetencyPercentTotal(20, 20)
        } else if (employeeLv == 10) {
            competencyPercentTotal = getCompetencyPercentTotal(10, 20)
        } else if (employeeLv == 11) {
            competencyPercentTotal = getCompetencyPercentTotal(0, 20)
        } else if (employeeLv >= 13 && employeeLv <= 14) {
            competencyPercentTotal = getCompetencyPercentTotal(0, 10)
        }
        competencyPercentTotalInput.setAttribute("value", String(competencyPercentTotal))

        // console.log(employeeLv, serviceScore, resultScore, flexibilityScore, makeItScore, provideScore, inspireScore, coreTotal, leaderTotal, rawTotal, competencyPercentTotal)
    }
}
calculateScores()
const calculateScoresByInput = function() {
    const scoreSelectors = document.querySelectorAll("td.score > div > select")
    for (const scoreSelector of scoreSelectors) {
        scoreSelector.addEventListener('change', calculateScores)
    }
}
calculateScoresByInput()