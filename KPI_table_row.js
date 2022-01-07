var row = `<tr row-status="">
                <td class="EMPLOYEE_LEVEL">${myList[i].APPRAISAL_LEVEL}</td>
                <td class="EMPLOYEE_ID">${myList[i].APPRAISAL_EMPLOYEE_ID}</td>
                <td class="EMPLOYEE_FULLNAME">${myList[i].APPRAISAL_EMPLOYEE_NAME}</td>
                <td></td>
                <td class="service_orientation_score score">
                    <div>
                        <select name="CSCORE1[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="CSCORE1_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]"" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_CSCORE1}</textarea>

                    </div>
                </td>
                <td class=" result_orientation_score score ">
                    <div>
                        <select name="CSCORE2[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="CSCORE2_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_CSCORE2}</textarea>
                    </div>
                </td>
                <td class="flexibility_and_adaptability_score score ">
                    <div>
                        <select name="CSCORE3[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="CSCORE3_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_CSCORE3}</textarea>

                    </div>
                </td>
                <td class="core_competency_total total ">
                    <input name="CSCORE_TOTAL[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_CTOTAL}" type="text" readonly>
                </td>
                <td></td>
                <td class="make_it_happen_score score ">
                    <div>
                        <select name="LSCORE1[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="LSCORE1_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_LSCORE1}</textarea>

                    </div>
                </td>
                <td class="provide_solutions_score score ">
                    <div>
                        <select name="LSCORE2[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="LSCORE2_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_LSCORE2}</textarea>

                    </div>
                </td>
                <td class="inspire_people_score score ">
                    <div>
                        <select name="LSCORE3[${myList[i].APPRAISAL_EMPLOYEE_ID}]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <img src="./kpi_image/Icon-empty-comment.svg" class="w3-dropdown-click">
                        <textarea name="LSCORE3_COMMENT[${myList[i].APPRAISAL_EMPLOYEE_ID}]" cols="30" rows="5" class="w3-dropdown-content" placeholder="คำอธิบายประกอบการประเมิน">${myList[i].COMMENT_COMPETENCY_LSCORE3}</textarea>

                    </div>
                </td>
                <td class="leadership_competency_total total ">
                    <input name="LSCORE_TOTAL[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_LTOTAL}" type="text " readonly>
                </td>

                <td class="raw_total grand_total ">
                    <input name="COMPETENCY_TOTAL[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_TOTAL}" type="text " readonly>
                </td>
                <td class="total_competency_percent grand_total ">
                    <input name="COMPETENCY_TOTAL100[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].APPRAISAL_COMPETENCY_TOTAL100}" type="text " readonly>
                </td>
                <input type="hidden" name="ORIGINAL_SCORE[${myList[i].APPRAISAL_EMPLOYEE_ID}]" value="${myList[i].ORIGINAL_SCORE}">
            </tr>
            ` //It ends here :)