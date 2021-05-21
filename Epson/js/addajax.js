//alert("hello");
$(document).ready(function(){
        var ab="Gagan";
        $.post('include/showcall.php',{name:ab},function(data){
                        $(".panel-body").html(data);
        });
        
        $("#last").on('click',function(){
                    var page=$("#tp").val();
                   $.post('include/showcall.php',{page:page},function(data){
                                $(".panel-body").html(data);
                   });
        });
        $("#first").on('click',function(){
                   var page=1;
                   $.post('include/showcall.php',{page:page},function(data){
                                $(".panel-body").html(data);
                   });       
        });
        $("#next").on('click',function(){
                    var page=parseInt($("#cp").val())+1;
                            var last=parseInt($("#tp").val());
                            if(last<page)
                                    {
                                    page=last;    
                                    }
                     $.post('include/showcall.php',{page:page},function(data){
                                $(".panel-body").html(data);
                   });                   
        });
        $("#Prev").on('click',function(){
                    var page=parseInt($("#cp").val())-1;
                            if(page<1)
                                    {
                                    page=1;    
                                    }
                    $.post('include/showcall.php',{page:page},function(data){
                                $(".panel-body").html(data);
                   });  
                   
        });
        /*
        $("#last").on('click',function(){
                    
                    var page=$("#tp").val();
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var entype=$("select#entype").val();
                    var course=$("select#course").val();
                    
                   $.post('include/showcall.php',{name:name,entype:entype,course:course,page:page},function(data){
                                $(".panel-body").html(data);
                   });
        });
        $("#first").on('click',function(){
                   var page=1;
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var entype=$("select#entype").val();
                    var course=$("select#course").val();
                    
                   $.post('include/showcall.php',{name:name,entype:entype,course:course,page:page},function(data){
                                $(".panel-body").html(data);
                   });       
        });
        $("#next").on('click',function(){
                    var page=parseInt($("#cp").val())+1;
                            
                            
                            var last=parseInt($("#tp").val());
                            if(last<page)
                                    {
                                    page=last;    
                                    }
                            
                            
                       
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var entype=$("select#entype").val();
                    var course=$("select#course").val();
                    
                   $.post('include/showcall.php',{name:name,entype:entype,course:course,page:page},function(data){
                                $(".panel-body").html(data);
                   });                   
        });
        $("#Prev").on('click',function(){
                    var page=parseInt($("#cp").val())-1;
                            
                            if(page<1)
                                    {
                                    page=1;    
                                    }
                            
                            
                   
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var entype=$("select#entype").val();
                    var course=$("select#course").val();
                    
                   $.post('include/showcall.php',{name:name,entype:entype,course:course,page:page},function(data){
                                $(".panel-body").html(data);
                   });  
                   
        });*/
});
