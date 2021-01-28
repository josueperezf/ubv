$(document).ready(function () {$("#eje").bind("change", function (event) {alert("Hola!");
return false;});
$("#Ubvcat04s").bind("change", function (event) {$.ajax({async:true, data:$("#Ubvcat04s").serialize(), dataType:"html", success:function (data, textStatus) {$("#denominacion").html(data);}, type:"post", url:"\/ubv\/ubvden08s\/listaDeno\\3"});
return false;});});