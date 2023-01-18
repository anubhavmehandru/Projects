$(document).ready(function(){
        var ab="Gagan";
        $.post('include/load.php',{name:ab},function(data){
                        $(".panel-body").html(data);
        });
        
        $("input#go").on('click',function(){
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var tech=$("select#tech").val();
                    var entype=$("select#entype").val();
                    var status=$("select#status").val();
                   
                   $.post('include/load.php',{name:name,tech:tech,entype:entype,status:status},function(data){
                                $(".panel-body").html(data);
                   }); 
                   
        });
        $("#last").on('click',function(){
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var tech=$("select#tech").val();
                    var entype=$("select#entype").val();
                    var status=$("select#status").val();
                    var last=$("#tp").val();
                    
                   $.post('include/load.php',{name:name,tech:tech,entype:entype,status:status,page:last},function(data){
                                $(".panel-body").html(data);
                   }); 
                   
        });
        $("#first").on('click',function(){
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var tech=$("select#tech").val();
                    var entype=$("select#entype").val();
                    var status=$("select#status").val();
                    var page=1;
                    
                   $.post('include/load.php',{name:name,tech:tech,entype:entype,status:status,page:page},function(data){
                                $(".panel-body").html(data);
                   }); 
                   
        });
        $("#next").on('click',function(){
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var tech=$("select#tech").val();
                    var entype=$("select#entype").val();
                    var status=$("select#status").val();
                    var page=parseInt($("#cp").val())+1;
                            
                            
                            var last=parseInt($("#tp").val());
                            if(last<page)
                                    {
                                    page=last;    
                                    }
                            
                            
                   $.post('include/load.php',{name:name,tech:tech,entype:entype,status:status,page:page},function(data){
                                $(".panel-body").html(data);
                   }); 
                   
        });
        $("#Prev").on('click',function(){
                    var name=$("input#nm").val();
                    name=$.trim(name);
                    var tech=$("select#tech").val();
                    var entype=$("select#entype").val();
                    var status=$("select#status").val();
                    var page=parseInt($("#cp").val())-1;
                            
                            
                            if(page<1)
                                    {
                                    page=1;    
                                    }
                            
                            
                   $.post('include/load.php',{name:name,tech:tech,entype:entype,status:status,page:page},function(data){
                                $(".panel-body").html(data);
                   }); 
                   
        });
});
