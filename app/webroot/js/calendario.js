  $(function() {
	$("#container #content #fecha" ).datepicker({
			maxDate: "+0M +0D",
			MaxDate: "2013-05-25",
			changeMonth:true,
			changeYear: true,
			showOn: "button",
			buttonImage: "/ubv/img/calendario.gif",
			showAnim: "explode",
			//showAnim: "fold",
			buttonImageOnly: true,
		});
		$("#container #content #fecha" ).datepicker('option',{dateFormat: 'yy-mm-dd'});
  });