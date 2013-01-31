// JavaScript Document
	function ajax_cal_total(page_name,quantity,quote_price,element_id,element_ids)
	{
		document.getElementById(element_id).innerHTML="<img src='images/spinner2.gif'>";
		document.getElementById(element_ids).innerHTML="<img src='images/spinner2.gif'>";
		var XMLHTTP= XMLHttpRequest || ActiveXObject("Microsoft.XMLHTTP");
		if(typeof XMLHTTP!="undefined")
		{
			var xmlhttp= new XMLHTTP;
			xmlhttp.open("GET",page_name+"&quantity="+quantity+"&quote_price="+quote_price,true);
			xmlhttp.send(null);
			xmlhttp.onreadystatechange= function ()
				{
					if(xmlhttp.readyState== 4)
					{
						var resp= xmlhttp.responseText;
						document.getElementById(element_id).innerHTML= resp;
						document.getElementById(element_ids).innerHTML= resp;
					}
				}
		}
		else
		{
			alert("Your Brower Does not Support Ajax");
		}
	}
