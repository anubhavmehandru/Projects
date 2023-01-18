$(document).ready(function(){

    $('#btn').click(function(){
        $.ajax('https://jsonplaceholder.typicode.com/todos/1', {
            type:'GET' ,
            beforeSend:function(){
                $('#loader').css({display:'block'});
            },
            success:function(data){
                 var _data='<b>UsersId:</b>'+data.userId+'<br><b>title:</b>'+data.title;
                 var _table='<table border=1><tr><td>UserId</td><td>'+data.userId+'</td></tr><tr><td>Title</td><td>'+data.title+'</td></tr></table>'
                 $("#result").html(_table);
                $('#loader').css({display:'none'});
            },
            error:function(){
                alert('Error');
            }
        });
    });

    $('#postBtn').click(function(){
        $.ajax('https://jsonplaceholder.typicode.com/posts/' , {
            type:'POST',
            data:{"userID":11 , "Id":101 , "title":"Title Index" , "body":"Body Text"},
            beforeSend:function(){
                $('#loader').css({display:'block'});
            },       
            success:function(data){
                $('#result').html(data.Id);
                $('#loader').css({display:'none'});
            },
            error:function(){
                alert('Error');
            }
        })
    });

});