function PageOpen(evt , tabNumber){
    var i , tabcontent , tablinks ; 
    tabcontent = document.getElementsByClassName("tab");
    for ( i = 0 ; i < tabcontent.length ; i++) {
        tabcontent[i].style.display = "none";
        document.getElementById("Title-name").style.display = "none" ;       
    }    
    tablinks = document.getElementsByClassName("Nav-tab");
    for ( i = 0 ; i < tablinks.length ; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active","");
    }    
    document.getElementById(tabNumber).style.display = "block";
    evt.currentTarget.className += " active";
}