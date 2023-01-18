$(document).ready(function(){
        
		var pcode=$("input#pcode").val();
		var pcat=$("select#pcat").val();
		var pmodel=$("input#pmodel").val();
		
		$.post('include/showpart.php',{pcode:pcode,pcat:pcat,pmodel:pmodel},function(data){
                        $(".panel-body").html(data);
        });
		
		$("input#pcode").on('keyup',function(){
				var pcode=$("input#pcode").val();
				var pcat=$("select#pcat").val();
				var pmodel=$("input#pmodel").val();
				$.post('include/showpart.php',{pcode:pcode,pcat:pcat,pmodel:pmodel},function(data){
					$(".panel-body").html(data);
				});
		});

		$("input#pmodel").on('keyup',function(){
				var pcode=$("input#pcode").val();
				var pcat=$("select#pcat").val();
				var pmodel=$("input#pmodel").val();
				$.post('include/showpart.php',{pcode:pcode,pcat:pcat,pmodel:pmodel},function(data){
					$(".panel-body").html(data);
				});
		});
		
		$("select#pcat").on('change',function(){
                var pcode=$("input#pcode").val();
				var pcat=$("select#pcat").val();
				var pmodel=$("input#pmodel").val();
				$.post('include/showpart.php',{pcode:pcode,pcat:pcat,p:1,pmodel:pmodel},function(data){
					$(".panel-body").html(data);
				});
        });

		
});
