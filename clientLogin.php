<html>
<head>
<link rel="stylesheet" href="styleLogin.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://localhost/myProject/clientLoginFunctions.js"></script>
</head>
<body>

<div align="center" style = "margin-top:110px">
		<div style="width: 300px; border: solid 1px #333333;" align="left">
			<div style="background-color: #333333; color: #FFFFFF; padding: 3px;">
				<b>Login</b>
			</div>
			<div style="margin: 30px">
				<form id="file-form" enctype="multipart/form-data">
					<label>Username:</label>
					<input type="text" name="username" id="username" class="box"/><br /> <br /> 
					<label>Password:</label>
					<input type="password" name="password" id="password" class="box" /><br /> <br />
					<input type="submit" value="Register" onclick="register()"/>
					<input type="submit" value="Login" onclick="login()"/><br />
					
					<div id="error" style = "font-size:11px; color:#cc0000; margin-top:20px"></div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>


