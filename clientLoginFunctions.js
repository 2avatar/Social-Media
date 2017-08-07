

function register(){
	
   var a = document.getElementById('username').value;
   var b = document.getElementById('password').value;
   a = a.trim();
   b = b.trim();	
   
     $.ajax({
   	  type: "POST",
      url: "serverRegister.php",
      dataType: "json", 
      data: {'username' : a, 'password' : b},
      success: function(data){ 
    
    		if (data != 0){
		        localStorage.setItem("userid",data);
	    		document.location = "http://localhost/myProject/clientMain.php";
		    	}
		    	else
		    		alert("You are already Registered");
		    		//$("#error").html("You are already Registered");
    	}
    });
}

function login(){
	
	var a = document.getElementById('username').value;
	var b =  document.getElementById('password').value;
	a = a.trim();
	b = b.trim();
	
	     $.ajax({
	   	  type: "POST",
	      url: "serverLogin.php",
	      dataType: "json", 
	      data: {'username' : a, 'password' : b},
	      success: function(data){ 
	    
	    		if (data != 0){
			    
			        localStorage.setItem("userid",data);
		    		document.location = "http://localhost/myProject/clientMain.php";
		    		
			    	}
			    	else
			    		alert("Your Login Name or Password is invalid");
			    		//$("#error").html("Your Login Name or Password is invalid");
	    	}	   
	    });
}