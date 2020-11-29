//Tabs Admin page
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
//checkboxRow
function checkedRow(id)
{
    var CheckboxId = document.getElementById(id+"Mail");
    var isChecked = $("input[type=checkbox]").is(":checked");
    var CancellBtb = document.getElementById('Cancel');
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
    if(isChecked != 0){
        CancellBtb.style.display ="block";
    } if(isChecked == 0){
        CancellBtb.style.display ="none";   
    }    
// Cancell all
   
}
var CancellBtb = document.getElementById('Cancel');
var BtnAll = document.getElementById('ChoseAll');
BtnAll.onclick = function(){
    var checkBoxes = document.querySelectorAll('.checkBox');
    var RowId = document.querySelectorAll('.MailTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = true; 
            RowId[i].style.background ="#1273EB";
            RowId[i].style.textShadow ="0px 0px 3px #000";
            RowId[i].style.color ="#fff";
            RowId[i].style.transition = ".5s";
        }  
        CancellBtb.style.display = "block";
}
CancellBtb.onclick = function () {
    var checkBoxes  = document.querySelectorAll('.checkBox'); 
    var RowId = document.querySelectorAll('.MailTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = false; 
            RowId[i].style.background ="#fff";
            RowId[i].style.textShadow ="none";
            RowId[i].style.color ="#000";
            RowId[i].style.transition = ".5s";
        } 
    CancellBtb.style.display = "none";
}

// TABLE USERS!!!!!!!!!!!
function checkedRowUser(id)
{
    var CheckboxId = document.getElementById(id);
    var isChecked = $("input[type=checkbox]").is(":checked");
    var CancellBtb = document.getElementById('CancelUser');
    if(CheckboxId.checked){
        var RowId = document.getElementById(id+'Us');
        RowId.style.background ="#1273EB";
        RowId.style.color ="white";
        RowId.style.textShadow ="0px 0px 3px #000";
        RowId.style.transition = ".5s";
    }
    else if(!CheckboxId.checked){
        var RowId = document.getElementById(id+'Us');
        RowId.style.background ="white";   
        RowId.style.color ="black";   
        RowId.style.textShadow ="none";
        RowId.style.transition = ".5s";
    }
    if(isChecked != 0){
        CancellBtb.style.display ="block";
    } if(isChecked == 0){
        CancellBtb.style.display ="none";   
    }    
}
// Cancell Button
var CancellBtbUser = document.getElementById('CancelUser');
var BtnAllUser = document.getElementById('ChoseAllUser');
// Choose everything
BtnAllUser.onclick = function(){
    var checkBoxes = document.querySelectorAll('.checkBoxUser');
    var RowId = document.querySelectorAll('.UserTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = true; 
            RowId[i].style.background ="#1273EB";
            RowId[i].style.textShadow ="0px 0px 3px #000";
            RowId[i].style.color ="#fff";
            RowId[i].style.transition = ".5s";
        }  
        CancellBtbUser.style.display = "block";
}
CancellBtbUser.onclick = function () {
    var checkBoxes  = document.querySelectorAll('.checkBoxUser'); 
    var RowId = document.querySelectorAll('.UserTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = false; 
            RowId[i].style.background ="#fff";
            RowId[i].style.textShadow ="none";
            RowId[i].style.color ="#000";
            RowId[i].style.transition = ".5s";
        } 
        CancellBtbUser.style.display = "none";
}  
// TABLE ORDERS 
function checkedRowOrder(id)
{
    var CheckboxId = document.getElementById(id+"Or");
    var isChecked = $("input[type=checkbox]").is(":checked");
    var CancellBtb = document.getElementById('CancelOrders');
    var Commit = document.querySelector('.Commit');
    var Undefined =  document.querySelector('.Undefined');
    var Reject = document.querySelector('.Reject');
    if(CheckboxId.checked){
        var RowId = document.getElementById(id+'TrOr');
        RowId.style.background ="#1273EB";
        RowId.style.color ="white";
        RowId.style.textShadow ="0px 0px 3px #000";
        RowId.style.transition = ".5s";
    }
    else if(!CheckboxId.checked){
        var RowId = document.getElementById(id+'TrOr');
        RowId.style.background ="white";   
        RowId.style.color ="black";   
        RowId.style.textShadow ="none";
        RowId.style.transition = ".5s";
    }
    if(isChecked != 0){
        CancellBtb.style.display ="block";
        Commit.style.display ="block";
        Undefined.style.display ="block";
        Reject.style.display ="block";
    } 
    if(isChecked == 0){
        CancellBtb.style.display ="none";  
        Commit.style.display ="none";
        Undefined.style.display ="none";
        Reject.style.display ="none"; 
    }
}    
// Cancell Button
var CancellBtbOrders = document.getElementById('CancelOrders');
var BtnAllOrder = document.getElementById('ChoseAllOrders');
var Commit = document.querySelector('.Commit');
var Undefined =  document.querySelector('.Undefined');
var Reject = document.querySelector('.Reject');
// Choose everything
BtnAllOrder.onclick = function(){
var checkBoxes = document.querySelectorAll('.checkBoxOrder');
    var RowId = document.querySelectorAll('.OrdersTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = true; 
            RowId[i].style.background ="#1273EB";
            RowId[i].style.textShadow ="0px 0px 3px #000";
            RowId[i].style.color ="#fff";
            RowId[i].style.transition = ".5s";
        }  
        CancellBtbOrders.style.display = "block";
        Commit.style.display ="block";
        Undefined.style.display ="block";
        Reject.style.display ="block";
}
CancellBtbOrders.onclick = function () {
    var checkBoxes  = document.querySelectorAll('.checkBoxOrder'); 
    var RowId = document.querySelectorAll('.OrdersTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = false; 
            RowId[i].style.background ="#fff";
            RowId[i].style.textShadow ="none";
            RowId[i].style.color ="#000";
            RowId[i].style.transition = ".5s";
        }     
        CancellBtbOrders.style.display = "none";
        Commit.style.display ="none";
        Undefined.style.display ="none";
        Reject.style.display ="none";
}  

// Adapted Menu
var AdadtedMenuBtn = document.getElementById('toogleMenuAdmin');
AdadtedMenuBtn.onclick = function(){
    var MenuPannel  =document.querySelector('.main__pannel');
    MenuPannel.classList.toggle('active');
}

//checkboxRow
function checkedRowAvailable(id)
{
    var CheckboxId = document.getElementById(id+"Available");
    var isChecked = $("input[type=checkbox]").is(":checked");
    var CancellBtb = document.getElementById('CancelAllAvailable');
    if(CheckboxId.checked){
        var RowId = document.getElementById(id+'Ava');
        RowId.classList.toggle('activeCheck');
    }
    else if(!CheckboxId.checked){
        var RowId = document.getElementById(id+'Ava');
        RowId.classList.toggle('activeCheck');
    }
    if(isChecked != 0){
        CancellBtb.style.display ="block";
    } if(isChecked == 0){
        CancellBtb.style.display ="none";   
    }    
// Cancell all
   
}
var CancellBtbAvailable = document.getElementById('CancelAllAvailable');
var BtnAllAvailable = document.getElementById('ChoseAllAvailable');
BtnAllAvailable.onclick = function(){
    var checkBoxes = document.querySelectorAll('.checkBoxAvailable');
    var RowId = document.querySelectorAll('.AvailableTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = true; 
            RowId[i].classList.toggle('activeCheck');
        }  
        CancellBtbAvailable .style.display = "block";
}
CancellBtbAvailable.onclick = function () {
    var checkBoxes  = document.querySelectorAll('.checkBoxAvailable'); 
    var RowId = document.querySelectorAll('.AvailableTd'); 
        for (var i = 0; i < checkBoxes.length; i++) { 
            checkBoxes[i].checked = false; 
            RowId[i].classList.toggle('activeCheck');
        } 
    CancellBtbAvailable.style.display = "none";
}
