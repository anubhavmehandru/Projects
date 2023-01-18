$(document).ready(function(){
        var ab="Gagan";
        $.post('include/show_spare.php',{name:ab},function(data){
                        $("#spare_show_part").html(data);
        });
});