function getData()
{

	req = new XMLHttpRequest();

	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status==200){
		alert(req.responseText);}}

	
	req.open("GET","http://bigoofn.com/heart/ajax.php?user_id=1", true);
	req.send();

}

getData();

