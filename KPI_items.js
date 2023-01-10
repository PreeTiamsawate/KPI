const kpi_item_1 = document.querySelector('#item-1')
const item_1_des = kpi_item_1.querySelector('.w3-dropdown-content')

const kpi_item_2 = document.querySelector('#item-2')
const item_2_des = kpi_item_2.querySelector('.w3-dropdown-content')

const kpi_item_3 = document.querySelector('#item-3')
const item_3_des = kpi_item_3.querySelector('.w3-dropdown-content')

const kpi_item_4 = document.querySelector('#item-4')
const item_4_des = kpi_item_4.querySelector('.w3-dropdown-content')

const kpi_item_5 = document.querySelector('#item-5')
const item_5_des = kpi_item_5.querySelector('.w3-dropdown-content')

const kpi_item_6 = document.querySelector('#item-6')
const item_6_des = kpi_item_6.querySelector('.w3-dropdown-content')

const kpi_item_7 = document.querySelector('#item-7')


const insertKpiItem = (itemCell, des, cat, seq)=>{
    const item = kpiItems.find((item) => item.CATEGORY == cat && item.SEQ == seq);
    des.innerHTML = item.DESCRIPTION;
    itemCell.innerHTML =  item.TITLE
    itemCell.appendChild(des)
}
insertKpiItem(kpi_item_1,item_1_des,"CORE",1)
insertKpiItem(kpi_item_2,item_2_des,"CORE",2)
insertKpiItem(kpi_item_3,item_3_des,"CORE",3)
insertKpiItem(kpi_item_4,item_4_des,"LEAD",1)
insertKpiItem(kpi_item_5,item_5_des,"LEAD",2)
insertKpiItem(kpi_item_6,item_6_des,"LEAD",3)

kpi_item_7.innerHTML = kpiItems.find((item)=>item.TITLE == "ระดับการให้คะแนน").DESCRIPTION;