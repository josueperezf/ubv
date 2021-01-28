$(document).ready(function () {$("#ubvsub06s").bind("change", function (event) {$.ajax({async:true, data:$("#ubvsub06s").serialize(), dataType:"html", success:function (data, textStatus) {$("#Uad").html(data);}, type:"post", url:"\/ubv\/ubvuad09s\/listUad"});
return false;});
$("#ubvuad09_id").bind("change", function (event) {$.ajax({async:true, data:$("#ubvuad09_id").serialize(), dataType:"html", success:function (data, textStatus) {$("#dus").html(data);}, type:"post", url:"\/ubv\/ubvdus10s\/listDus"});
return false;});});