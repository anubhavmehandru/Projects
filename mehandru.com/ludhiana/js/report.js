
$(document).ready(function(){

				var calltype=$("select#calltype").val();
				var callid=parseInt($("input#callid").val());
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
		
		//var course=$("select#course").val();
		
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                        $(".panel-body").html(data);
        });
		$("select#calltype").on('change',function(){
                var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
			    var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
				
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		$("input#callid").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		     	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
				
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		
		$("input#nm").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
			    var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
				
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		
		$("input#contact").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
				
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });

		$("input#dfrom").on('change',function(){
			
			var calltype=$("select#calltype").val();
			var callid=$("input#callid").val();
			var serialno=$("input#serialno").val();
			var nm=$("input#nm").val();
			var con=$("input#contact").val();
			var dfrom=$("input#dfrom").val();
			var dto=$("input#dto").val();
			var eng=$("select#eng").val();
			var warranty=$("select#warranty").val();
			var carry=$("select#carry").val();
			var local=$("select#local").val();

				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
							$(".panel-body").html(data);
			});
		});

		$("input#dto").on('change',function(){

			var calltype=$("select#calltype").val();
			var callid=$("input#callid").val();
			var serialno=$("input#serialno").val();
			var nm=$("input#nm").val();
			var con=$("input#contact").val();
			var dfrom=$("input#dfrom").val();
			var dto=$("input#dto").val();
			var eng=$("select#eng").val();
			var warranty=$("select#warranty").val();
			var carry=$("select#carry").val();
			var local=$("select#local").val();

				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
							$(".panel-body").html(data);
			});
		});

		$("input#serialno").on('keyup',function(){
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
				
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		$("select#eng").on('change',function(){
		
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
		//alert(eng);		
		
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		$("select#warranty").on('change',function(){
		
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
		//alert(eng);		
		
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		
		$("select#carry").on('change',function(){
		
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
		//alert(eng);		
		
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		$("select#local").on('change',function(){
		
				var calltype=$("select#calltype").val();
                var callid=$("input#callid").val();
				var serialno=$("input#serialno").val();
				var nm=$("input#nm").val();
				var con=$("input#contact").val();
				var dfrom=$("input#dfrom").val();
		    	var dto=$("input#dto").val();
				var eng=$("select#eng").val();
				var warranty=$("select#warranty").val();
				var carry=$("select#carry").val();
				var local=$("select#local").val();
		
		//alert(eng);		
		
				$.post('include/report.php',{name:calltype,id:callid,srno:serialno,cname:nm,contact:con,dfrom:dfrom,dto:dto,engineer:eng,war:warranty,car:carry,local:local},function(data){
                                $(".panel-body").html(data);
                });
        });
		
   
});
