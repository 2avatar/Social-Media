function addFriend(userid){
	
	var selectBox = document.getElementById("friendCombobox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var userid = localStorage.getItem("userid"); 

    $.ajax({
	   	  type: "POST",
	      url: "http://localhost/myProject/serverStoreFriend.php",
	      dataType: "json", 
	      data: {'friend' : selectedValue, 'userid' : userid},
	      success: function(data){ 

				alert(data);
				location.reload(true);
		  		  
		      }
	    });   
}

function fetchFriends(userid){

	 var myFriendsLabel = document.getElementById('myFriendsLabel');
		
	 $.ajax({
	   	  type: "POST",
	      url: "http://localhost/myProject/serverFetchFriends.php",
	      dataType: "json", 
	      data: {'userid' : userid},
	      success: function(data){ 

	    	  myFriendsLabel.innerHTML = "My Friends: "+data;
		  		  
		      }
	    });   
	
}

function createTitle(comment, username, mainDiv){

	var commentElementDiv = document.createElement("div");
    var commentElementText = document.createElement("label");
    var commentElementTitle = document.createElement("label");
    var textText = document.createTextNode(comment); 
    var textTitle = document.createTextNode(username+": "); 
    commentElementText.appendChild(textText);
    commentElementTitle.appendChild(textTitle);
    commentElementDiv.appendChild(commentElementTitle);
    commentElementDiv.appendChild(commentElementText);
    mainDiv.appendChild(commentElementDiv);
	
}

function createThumbImage(image, mainDiv){

    var containerDiv = document.createElement("div");
    var imgElement = document.createElement("img");
    var middleDiv = document.createElement("div");
    var enlrageImg = document.createElement("img");

    containerDiv.className = "container";

    imgElement.src = "data:image/jpeg;base64,"+image;
	imgElement.alt = "Avatar";
	imgElement.className = "image";
	imgElement.style = "width:100%";

	middleDiv.className = "middle";

	enlrageImg.src = "data:image/jpeg;base64,"+image;
	enlrageImg.className = "text";
	
	middleDiv.appendChild(enlrageImg);
	containerDiv.appendChild(imgElement);
	containerDiv.appendChild(middleDiv);
	mainDiv.appendChild(containerDiv);

}

function createLikesLabel(postid, mainDiv){

	 var likeElement = document.createElement("div");
	 var likeNumberElement = document.createElement("label");
	 var likeLabelElement = document.createElement("label");
	 var likeText = document.createTextNode("-1"); 
	 var likeLabelText = document.createTextNode("Likes: "); 
	 likeNumberElement.appendChild(likeText);
	 likeLabelElement.appendChild(likeLabelText);
	 likeNumberElement.setAttribute("id", "like"+postid);
	 likeElement.appendChild(likeLabelElement);
	 likeElement.appendChild(likeNumberElement);
	 mainDiv.appendChild(likeElement);
	
}

function fetchNumberOfLikes(postid){

	 $.ajax({
	   	  type: "POST",
	      url: "http://localhost/myProject/serverFetchLikes.php",
	      dataType: "json", 
	      data: {'postid' : postid},
	      success: function(data){ 
		
		     $("#like"+data[0]).html(data[1]);
		    
			  
		      }
	    });
	
}

function addPostButtonEvent(postBtn, userid){

	 postBtn.onclick = function(){

	    	this.style.background = "#DC143C";
			        
	        var refToPostid = this.name;
	        var allTextareas = document.getElementsByName("textarea"+refToPostid);
			var comment = allTextareas[0].value;
			
					$.ajax({
					   	  type: "POST",
					      url: "http://localhost/myProject/serverStoreComment.php",
					      dataType: "json", 
					      data: {'postid' : refToPostid , 'userid' : userid , 'comment' :  comment},
					      success: function(data){ 
						
						    alert(data);
					    	 location.reload(true);
						      }
					    });
					
					
	      };
}

function addLikeButtonEvent(likeBtn, userid){

	likeBtn.onclick = function(){

  	  this.style.background = "#0000FF";
  	  var refToPostid = this.name;
  	  
  	  $.ajax({
		   	  type: "POST",
		      url: "http://localhost/myProject/serverStoreLike.php",
		      dataType: "json", 
		      data: {'postid' : refToPostid , 'userid' : userid },
		      success: function(data){ 
			
			  alert(data);
			  if (data != "Cant like twice")
			  location.reload(true);
			      }
		    });
	      };
	      
}

function createPostCommentsLikes(postid, userid, mainDiv){

	 var commentDiv = document.createElement("div");
	    var ta = document.createElement("TEXTAREA");
	    var postBtn = document.createElement("BUTTON");
	    var likeBtn = document.createElement("BUTTON");    
	    var postTextBtn = document.createTextNode("Comment");
	    var likeTextBtn = document.createTextNode("Like");
		
		ta.name = "textarea"+postid;
		postBtn.name = postid;
		likeBtn.name = postid; // refrence to postid
		
	    postBtn.appendChild(postTextBtn);
	    likeBtn.appendChild(likeTextBtn);

	    addPostButtonEvent(postBtn, userid);
	    addLikeButtonEvent(likeBtn, userid);
			    
	    commentDiv.appendChild(ta);
	    commentDiv.appendChild(postBtn);
	    commentDiv.appendChild(likeBtn);
		mainDiv.appendChild(commentDiv);
	
}

function addCommentsToPost(postid, mainDiv){

	var commentElement = document.createElement("h5");
    var text = document.createTextNode("Comments:"); 
    commentElement.appendChild(text);
    mainDiv.appendChild(commentElement);

    var commentElement = document.createElement("div");
	commentElement.id = "comment"+postid; // refrence to postid
    mainDiv.appendChild(commentElement);

	$.ajax({
	   	  type: "POST",
	      url: "http://localhost/myProject/serverFetchComments.php",
	      dataType: "json", 
	      data: {'postid' : postid},
	      success: function(data){ 

	    	 var commentBuilder = "";

	    	 for (var i=0; i<data[1].length; i++)
	    		 commentBuilder += data[1][i]+": "+data[2][i]+"<br>";

	    	  $("#comment"+data[0]).html(commentBuilder);
		      
	      }
	    });

	   var line = document.createElement("hr");
	   mainDiv.appendChild(line);
	
}

function fetchPosts(userid){

	var mainDiv = document.getElementById('response');

	 $.ajax({
	   	  type: "POST",
	      url: "http://localhost/myProject/serverFetchPost.php",
	      dataType: "json",
	      data: {'userid' : userid},
	      success: function(data){ 
		      
			// 0 - postid, 1 - userid of post, 2 - image, 3 - comment, 4 - isprivate?, 5 - is a friend, 6 - post username.
	    	// add post username, is a friend
					
		  for (var i=data.length-1; i>=0 ; i--){

			  if ( ((data[i][4] == 0)  && (data[i][5] == 1))  || (userid == data[i][1]) ){

				var postid = data[i][0];		
				var image = data[i][2];
				var comment = data[i][3];
				var postUsername = data[i][6];
						
				createTitle(comment, postUsername, mainDiv);
			    createThumbImage(image, mainDiv);
				createLikesLabel(postid, mainDiv);
				fetchNumberOfLikes(postid);		
				createPostCommentsLikes(postid, userid, mainDiv);
				addCommentsToPost(postid, mainDiv);			    
			   
			  }	
			}	    			  
	      }
	    });	
	
}
	
function loadPosts(){

	var userid = localStorage.getItem("userid");

	fetchFriends(userid);
	fetchPosts(userid);
 
}

function uploadPost(){

	var form = document.getElementById('file-form');
	var formData = new FormData(form);
	formData.append('userid', localStorage.getItem("userid"));
		
	$.ajax({
   	  type: "POST",
      url: "http://localhost/myProject/serverStorePost.php",
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function(data){ 
    	alert("Post Added!");
      }
    });  
    
}