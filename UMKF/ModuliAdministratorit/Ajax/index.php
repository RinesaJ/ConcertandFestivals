<html>
<head>
<title>Moduli Administratorit</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="overlay">
		<div>
			<img src="loader.gif" width="64px" height="64px" />
		</div>
	</div>
	<div class="poll-content-outer">
		<div id="poll-content"></div>
	</div>
<script src="jquery-3.2.1.min.js"></script>
<script>
   function show_poll(){
		$.ajax({
			type: "POST", 
			url: "shfaq-votimin.php", 
			processData : false,
			beforeSend: function() {
				$("#overlay").show();
			},
			success: function(responseHTML){
				$("#overlay").hide();
				$("#poll-content").html(responseHTML);
			}
		});
	}
	function addPoll() {
		if($("input[name='Pergjigjja']:checked").length != 0){
			var Pergjigjja = $("input[name='Pergjigjja']:checked").val();
			$.ajax({
				type: "POST", 
				url: "ruaj-votimin.php", 
				data : "Pyetja="+$("#Pyetja").val()+"&Pergjigjja="+$("input[name='Pergjigjja']:checked").val(),
				processData : false,
				beforeSend: function() {
					$("#overlay").show();
				},
				success: function(responseHTML){
					$("#overlay").hide();	
					$("#poll-content").html(responseHTML);				
				}
			});
			
		}
	}
    $(document).ready(function(){
		show_poll();
	});
   </script>
</body>
</html>