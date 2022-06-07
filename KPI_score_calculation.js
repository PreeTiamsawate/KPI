const calculateScores = function() {
    const gradingRows = document.querySelectorAll("tbody.grading-tbody > tr")
    const getValue = function(expectedComponet) {
            return (expectedComponet ? Number(expectedComponet.value) : 0)
        }
    
    for (const gradingRow of gradingRows) {
        const employeeLv = Number(gradingRow.querySelectorAll("td")[0].innerText)
        let serviceScore = getValue(gradingRow.querySelector("td.service_orientation_score > div > select"))
        let resultScore = getValue(gradingRow.querySelector("td.result_orientation_score > div > select"))
        let flexibilityScore = getValue(gradingRow.querySelector("td.flexibility_and_adaptability_score > div > select"))
        let makeItScore = getValue(gradingRow.querySelector("td.make_it_happen_score > div > select"))
        let provideScore = getValue(gradingRow.querySelector("td.provide_solutions_score > div > select"))
        let inspireScore = getValue(gradingRow.querySelector("td.inspire_people_score > div > select"))
        // let coreTotal = getValue(gradingRow.querySelector("td.core_competency_total > input"))
        // let leaderTotal = getValue(gradingRow.querySelector("td.leadership_competency_total > input"))
        // let rawTotal = getValue(gradingRow.querySelector("td.raw_total > input"))
        // let competencyPercentTotal = getValue(gradingRow.querySelector("td.total_competency_percent > input"))
        const competencyPercentTotalInput = gradingRow.querySelector("td.total_competency_percent > input")
        let coreTotalInput = gradingRow.querySelector("td.core_competency_total > input")
        let leaderTotalInput = gradingRow.querySelector("td.leadership_competency_total > input")
        let rawTotalInput = gradingRow.querySelector("td.raw_total > input")

        let coreTotal = serviceScore + resultScore + flexibilityScore;
        let leaderTotal = makeItScore + provideScore + inspireScore;
        let rawTotal = coreTotal + leaderTotal;
        let wtCoreTotal = 0
        let wtLeaderTotal = 0
        let wtCompetencyPercent = 0
        let competencyPercentTotals ={};

        

        
        rawTotalInput.setAttribute("value", String(rawTotal))
        const getTotalScores = function(coreWeight, leaderWeight) {
            wtCoreTotal = coreTotal * coreWeight / 15;
            wtLeaderTotal = leaderTotal * leaderWeight / 15
            wtCompetencyPercent = (wtCoreTotal + wtLeaderTotal) * 100 / (coreWeight + leaderWeight)
            return {wtCoreTotal, wtLeaderTotal,  wtCompetencyPercent}
        }

        if (employeeLv >= 1 && employeeLv <= 7) {
            competencyPercentTotals  = getTotalScores(50, 0)
        } else if (employeeLv >= 8 && employeeLv <= 9) {
            competencyPercentTotals  = getTotalScores(20, 20)
        } else if (employeeLv == 10) {
            competencyPercentTotals  = getTotalScores(10, 20)
        } else if (employeeLv == 11) {
            competencyPercentTotals  = getTotalScores(0, 20)
        } else if (employeeLv >= 13 && employeeLv <= 14) {
            competencyPercentTotals  = getTotalScores(0, 10)
        }
        if (coreTotalInput) {
            coreTotalInput.setAttribute("value", String(competencyPercentTotals.wtCoreTotal.toFixed(3)))
        }
        if (leaderTotalInput) {
            leaderTotalInput.setAttribute("value", String(competencyPercentTotals.wtLeaderTotal.toFixed(3)))
        }
        competencyPercentTotalInput.setAttribute("value", String(competencyPercentTotals.wtCompetencyPercent.toFixed(3) ))

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