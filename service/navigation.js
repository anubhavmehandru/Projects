$(document).ready(function(){
    var model_type = ['Printer Inkjet','Printer Dot-Matrix','Scanner','Projector','POS'];
    addType(model_type);

});

function addType(typeList){
    $('#type').empty();
    $('#type').append('<option value= "" disabled selected hidden invalid > --Select Type-- </option>');
    $(typeList).each(function(){
        $('<option>'+this+'</option>').appendTo('#type')
    });
}




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
    document.getElementById(tabNumber).style.display = "flex";
    evt.currentTarget.className += " active";
}