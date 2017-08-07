var xmlHttp;
function showHint(str){
	
	if (str.length==0){ 
		document.getElementById("friendCombobox").innerHTML=""; 
		return; 
		} 

	xmlHttp=GetXmlHttpObject(); 
	
	if (xmlHttp==null){	
alert ("Your browser does not support AJAX!"); 
return;
}

var myuserid = localStorage.getItem("userid");
var url="http://localhost/myProject/serverFetchUsers.php";
url=url+"?q="+str; 
url=url+"&userid="+myuserid;
url=url+"&sid="+Math.random(); 
xmlHttp.onreadystatechange=stateChanged; 
xmlHttp.open("GET",url,true); 
xmlHttp.send(null); 

}
function stateChanged() { 
	if (xmlHttp.readyState==4){
		
		var a = xmlHttp.responseText.split(" , ");
		var combobox = document.getElementById("friendCombobox");
		
		combobox.innerHTML = "";
		
		var option = document.createElement("option");
		option.innerHTML= "";
		option.id = "emptyOption";
		combobox.appendChild(option);
		
		for (var i=0; i<a.length; i++){
			
			var name = a[i].trim();
			var option = document.createElement("option");
			option.innerHTML=name;
			combobox.appendChild(option);
			
		}
		
		} 
	} 
function GetXmlHttpObject(){ 
	var xmlHttp=null; 
	try { 
		/* firefox, Opera 8.0+, Safari */       
		xmlHttp=new XMLHttpRequest();     
		} catch (e) {     
			/* Iexplorer */ try { 
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");   
				} catch (e)   { 
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
					} 
				} 
		return xmlHttp; 
		} 
