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