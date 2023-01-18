$(document).ready(function(){
        
		var calltype=$("select#calltype").val();
		var callid=parseInt($("input#callid").val());
		var serialno=$("input#serialno").val();
		var nm=$("input#nm").val();
		var con=$("input#contact").val();
		
		
		//var course=$("select#course").val();
		
		$.post('include/showcall.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                        $(".panel-body").html(data);
        });
		$("select#calltype").on('change',function(){
                var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				
				$.post('include/showcall.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                });
        });
		$("input#callid").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				
				$.post('include/showcall.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                });
        });
		
		$("input#nm").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				
				$.post('include/showcall.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                });
        });
		
		$("input#contact").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				
				$.post('include/showcall.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                });
        });
		$("input#serialno").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				
				$.post('include/showcall.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                });
        });
		
        $("#last").on('click',function(){
					var page=$("#tp").val();
					var calltype=$("select#calltype").val();
					var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				
		
                   $.post('include/showcall.php',{page:page,name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                   });
        });
        $("#first").on('click',function(){
					var page=1;
					var calltype=$("select#calltype").val();
					var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
                   $.post('include/showcall.php',{page:page,name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                   });       
        });
        $("#next").on('click',function(){
                    
					var calltype=$("select#calltype").val();
					var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
					var page=parseInt($("#cp").val())+1;
                            var last=parseInt($("#tp").val());
                            if(last<page)
                                    {
                                    page=last;    
                                    }
                     $.post('include/showcall.php',{page:page,name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
                                $(".panel-body").html(data);
                   });                   
        });
        $("#Prev").on('click',function(){
                    var page=parseInt($("#cp").val())-1;
					var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
					var calltype=$("select#calltype").val();
                            if(page<1)
                                    {
                                    page=1;    
                                    }
                    $.post('include/showcall.php',{page:page,name:calltype,id:callid,srno:serialno,cname:nm,contact:con},function(data){
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
