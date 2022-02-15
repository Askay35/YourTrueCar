
let result_submit = document.getElementById('result-submit')


function checkboxArrayToQuery(arr){
    let query = ""
    for (let i =0; i < arr.length; i++){
        if(arr[i].checked){
            query += arr[i].value + ','
        }
    }
    return query.substr(0,query.length-1)
}

function getAutoModelsQuery() {
    let ams = document.getElementsByClassName('result-auto-model')
    let ams_query = checkboxArrayToQuery(ams)
    if(ams_query.length > 0){
        return "make=" + ams_query
    }
    return ""
}


function getDriveQuery() {
    let drives = document.getElementsByClassName('result-drive')
    let drives_query = checkboxArrayToQuery(drives)
    if(drives_query.length > 0){
        return "drive=" + drives_query
    }
    return ""
}

function getAuksQuery(){
    let aukcions = document.getElementsByClassName('result-auk')
    let auks_query = checkboxArrayToQuery(aukcions)
    if(auks_query.length > 0){
        return "site=" + auks_query
    }
    return ""
}
function getBodyQuery(){
    let b = document.getElementsByClassName('result-body')
    let b_query = checkboxArrayToQuery(b)
    if(b_query.length > 0){
        return "body=" + b_query
    }
    return ""
}

function getColorQuery(){
    let colors = document.getElementsByClassName('result-color')
    let c_query = checkboxArrayToQuery(colors)
    if(c_query.length > 0){
        return "color=" + c_query
    }
    return ""
}
function getStatusQuery(){
    let status = document.getElementsByClassName('result-status')
    let status_query = checkboxArrayToQuery(status)
    if(status_query.length > 0){
        return "runs_drive=" + status_query
    }
    return ""
}
function getTransmissionQuery(){
    let ts = document.getElementsByClassName('result-transmission')
    let ts_q = checkboxArrayToQuery(ts)
    if(ts_q.length > 0){
        return "transmission=" + ts_q
    }
    return ""
}

function getSaleStatusQuery(){
    let ss = document.getElementsByClassName('result-ss')
    let ss_q = checkboxArrayToQuery(ss)
    if(ss_q.length > 0){
        return "sale_status=" + ss_q
    }
    return ""
}

function getFuelsQuery(){
    let ss = document.getElementsByClassName('result-fuel')
    let ss_q = checkboxArrayToQuery(ss)
    if(ss_q.length > 0){
        return "fuel=" + ss_q
    }
    return ""
}

function getOsnQuery(){
    let ss = document.getElementsByClassName('result-osn')
    let ss_q = checkboxArrayToQuery(ss)
    if(ss_q.length > 0){
        return "damage=" + ss_q
    }
    return ""
}

function getVtorQuery(){
    let ss = document.getElementsByClassName('result-vtor')
    let ss_q = checkboxArrayToQuery(ss)
    if(ss_q.length > 0){
        return "damage2=" + ss_q
    }
    return ""
}

let dv_min = document.getElementById('input-0')
let dv_max = document.getElementById('input-1')

let probeg_min = document.getElementById('input-2')
let probeg_max = document.getElementById('input-3')

let god_min = document.getElementById('input-4')
let god_max = document.getElementById('input-5')


result_submit.onclick = ()=>{
    let new_url = document.location.origin + "/plc.php?"

    let amq = getAutoModelsQuery()
    if(amq.length>0){
        new_url+=amq+'&'
    }
    let aq = getAuksQuery()
    if(aq.length>0){
        new_url+=aq+'&'
    }
    let drives = getDriveQuery()
    if(drives.length>0){
        new_url+=drives+'&'
    }
    let bodies = getBodyQuery()
    if(bodies.length>0){
        new_url+=bodies+'&'
    }
    let colors = getColorQuery()
    if(colors.length>0){
        new_url+=colors+'&'
    }
    let statuses = getStatusQuery()
    if(statuses.length>0){
        new_url+=statuses+'&'
    }
    let transmissions = getTransmissionQuery()
    if(transmissions.length>0){
        new_url+=transmissions+'&'
    }
    let sale_statuses = getSaleStatusQuery()
    if(sale_statuses.length>0){
        new_url+=sale_statuses+'&'
    }

    let fuels = getFuelsQuery()
    if(fuels.length>0){
        new_url+=fuels+'&'
    }

    let osn = getOsnQuery()
    if(osn.length>0){
        new_url+=osn+'&'
    }

    let vtor = getVtorQuery()
    if(vtor.length>0){
        new_url+=vtor+'&'
    }


    new_url += 'min_year=' + god_min.value + '&'
    new_url += 'max_year=' + god_max.value + '&'

    new_url += 'min_engine=' + dv_min.value + '&'
    new_url += 'max_engine=' + dv_max.value + '&'

    new_url += 'min_odometer=' + probeg_min.value + '&'
    new_url += 'max_odometer=' + probeg_max.value + '&'



    document.location = new_url + "limit=30"
}