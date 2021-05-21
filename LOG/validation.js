$(document).ready(function() {
    $('#page').removeClass('hide');
    $('#page').addClass('show');
    $('#close-btn').click(function(){
        close();
    });

    $('#Login-btn').click(function(){
        openLog();
    });

    $('#Signin-btn').click(function(){
        openSign();
    });
});

function close(){
    $('#page').removeClass('show');
    $('#page').addClass('hide');

}

function openLog(){
    $('#page').removeClass('hide');
    $('#page').addClass('show');
    $('#Sign').removeClass('show');
    $('#Sign').addClass('hide');
    $('#Log').removeClass('hide');
    $('#Log').addClass('show');
    $('#SignLink').addClass('hide');
    $('#SignLink').removeClass('show');    
    $('#LogLink').removeClass('hide');
    $('#LogLink').addClass('show');
};

function openSign(){
    $('#page').removeClass('hide');
    $('#page').addClass('show');
    $('#Log').removeClass('show');
    $('#Log').addClass('hide');
    $('#Sign').removeClass('hide');
    $('#Sign').addClass('show');
    $('#LogLink').addClass('hide');
    $('#LogLink').removeClass('show');
    $('#SignLink').removeClass('hide');
    $('#SignLink').addClass('show');    
};


function FocusUser(){
      $('#userName').removeClass('errorLogin');
      $('#userName1').removeClass('errorLogin');
      document.getElementById("userName").placeholder = "";
      document.getElementById("userName1").placeholder = "";
  };

  function FocusMail(){
      $('#Email1').removeClass('errorLogin');
      document.getElementById("Email1").placeholder = "";

  };

function FocusPass(){
      $('#password').removeClass('errorLogin');
      $('#password1').removeClass('errorLogin');
      document.getElementById("password").placeholder = "";
      document.getElementById("password1").placeholder = "";
  };

function validate() {
    if($('#Log').hasClass('show')) {
        // Login Validation
        var userName = document.forms["LoginForm"]["userName"].value;
        var pwd= document.forms["LoginForm"]["password"].value;
        if (userName == "") {
          $('#userName').addClass('errorLogin');
          document.getElementById("userName").placeholder = "Username cannot be blank";
           
          return false;
       }
         if(pwd == "")
        {
          $('#userName').removeClass('errorLogin');
         $('#password').addClass('errorLogin');
         document.getElementById("password").placeholder = "Password cannot be blank";
    // alert("Password not entered!!");
            return false;
        }
      }
    else {
    // Signin Validation
    var userName1 = document.forms["LoginForm"]["userName1"].value;
    var email1 = document.forms["LoginForm"]["Email1"].value;
    var pwd1= document.forms["LoginForm"]["password1"].value;
    if (userName1 == "") {
      $('#userName1').addClass('errorLogin');
      document.getElementById("userName1").placeholder = "Username cannot be blank";
       
      return false;
   }
   if (email1 == "")
   {
     $('#userName1').removeClass('errorLogin');
     $('#Email1').addClass('errorLogin');
    document.getElementById("Email1").placeholder = "Email cannot be blank";
// alert("Password not entered!!");
       return false;
   }
   if(pwd1 == "")
    {
      $('#Email1').removeClass('errorLogin');
     $('#password1').addClass('errorLogin');
     document.getElementById("password1").placeholder = "Password cannot be blank";
// alert("Password not entered!!");
        return false;
    }
    }
};
