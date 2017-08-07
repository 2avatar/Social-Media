<html>
<head>
<link rel="stylesheet" href="styleMain.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://localhost/myProject/clienthint.js"></script>
<script src="http://localhost/myProject/clientMainFunctions.js"></script>
</head>
<body onload="loadPosts()">


	
  <div id="main">
  
  <div></div>
	<div>
	<label id="myFriendsLabel"></label>
<form> Find Friends: <input type="text" id="txt1" onkeyup="showHint(this.value)"> </form>
 <p>Suggestions: 
 <span><select id="friendCombobox"  onchange="addFriend()"></select></span></p> 
	</div>
  
  <hr><hr>
  
    <h1>Upload A New Post</h1>
      <form id="file-form" enctype="multipart/form-data" >
      <label>Photo :</label>
      <input type="file" name="image" id="image" multiple/><br>
  	  <h4>Comment :</h4>
	  <textarea rows="4" cols="30" name="commenting" id="commenting"></textarea> 
	  <label>Private? :</label>
      <input type="checkbox" name="isprivate" id="isprivate"/><br/>
      <input type="submit" value="Upload Post!" onclick="uploadPost()">
    </form>
 	<hr><hr>
    <div id="response">
    
  </div>
  <hr>
   <ul id="image-list">
 
 	
 
    </ul>
  </div>

</body>
</html>