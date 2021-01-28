$(document).ready(function () {$("#Ubvdus10").bind("change", function (event) {$.ajax({async:true, data:$("#Ubvdus10").serialize(), dataType:"html", success:function (data, textStatus) {$("#depDest").html(data);}, type:"post", url:"\/ubv\/ubvmov13s\/depDestino"});
return false;});
$("#ubvtmv02s").bind("change", function (event) {$.ajax({async:true, data:$("#ubvtmv02s").serialize(), dataType:"html", success:function (data, textStatus) {$("#nuevaMarca").html(data);}, type:"post", url:"\/ubv\/ubvdtm07s\/listRaz"});
return false;});});