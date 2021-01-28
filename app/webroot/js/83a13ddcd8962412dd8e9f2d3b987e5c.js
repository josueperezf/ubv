$(document).ready(function () {$("#Ubvdus10").bind("change", function (event) {$.ajax({async:true, data:$("#Ubvdus10").serialize(), dataType:"html", success:function (data, textStatus) {$("#depDest").html(data);}, type:"post", url:"\/ubv\/ubvmov13s\/depDestino"});
return false;});
$("#ubvtmv02s").bind("change", function (event) {$.ajax({async:true, data:$("#ubvtmv02s").serialize(), dataType:"html", success:function (data, textStatus) {$("#listaRazones").html(data);}, type:"post", url:"\/ubv\/ubvdtm07s\/listRaz"});
return false;});
$("#ubvsub06s").bind("change", function (event) {$.ajax({async:true, data:$("#ubvsub06s").serialize(), dataType:"html", success:function (data, textStatus) {$("#Uad").html(data);}, type:"post", url:"\/ubv\/ubvuad09s\/listMov"});
return false;});});