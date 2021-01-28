$(document).ready(function () {$("#Ubvcat04s").bind("change", function (event) {$.ajax({async:true, data:$("#Ubvcat04s").serialize(), dataType:"html", success:function (data, textStatus) {$("#denominacion").html(data);}, type:"post", url:"\/ubv\/ubvden08s\/listaDeno"});
return false;});
$(".nMarca").bind("click", function (event) {$.ajax({async:true, data:$(".nMarca").serialize(), dataType:"html", success:function (data, textStatus) {$("#nuevaMarca").html(data);}, type:"post", url:"\/ubv\/ubvmar01s\/add"});
return false;});
$("#guardarAjax").bind("click", function (event) {$.ajax({async:true, data:$("#guardarAjax").serialize(), dataType:"html", success:function (data, textStatus) {$("#nuevaMarca").html(data);}, type:"post", url:"\/ubv\/ubvmar01s\/add"});
return false;});});