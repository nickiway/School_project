function get_tabs(tabname){
    var tabscontent;
    localStorage.setItem('lasttab',tabname);
    tabscontent = document.getElementsByClassName('tabscontent');
        for (let i = 0; i < tabscontent.length; i++) {
            tabscontent[i].style.display = "none";
        }
    document.getElementById(localStorage.getItem('lasttab')).style.display = "block"; 
}