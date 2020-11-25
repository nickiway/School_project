function get_tabs(tabname){
    var currentId;
    var  tabscontent = document.getElementsByClassName('tabscontent');
    localStorage.setItem('lasttab',tabname);
    currentId = localStorage.getItem('lasttab');
    for (let i = 0; i < tabscontent.length; i++) {
            tabscontent[i].style.display = "none";
        }
    document.getElementById(currentId).style.display = "flex"; 
}
function checkedRow(id){
    var CheckboxId = document.getElementById(id);
    if(CheckboxId.checked){
        var RowId = document.getElementById(id+'Td');
        RowId.style.background ="#1273EB";
        RowId.style.color ="white";
        RowId.style.textShadow ="0px 0px 3px #000";
        RowId.style.transition = ".5s";
    }
    else if(!CheckboxId.checked){
        var RowId = document.getElementById(id+'Td');
        RowId.style.background ="white";   
        RowId.style.color ="black";   
        RowId.style.textShadow ="none";
        RowId.style.transition = ".5s";
    }
}