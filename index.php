<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="http://localhost/web_mysqli/">
	<script src="topBtn.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@500&family=Chakra+Petch:wght@600&family=KoHo:wght@500&family=Quicksand:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="shortcut icon" type="image/png" href="images/preview2.png"/>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
		integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
		crossorigin="anonymous">
	</script>
	<link type="text/css" href="css/jquery.exzoom.css" rel="stylesheet">
	<title>Ookami Fashionista</title>
</head>
<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="YHMGReTW"></script>
	<div class="wrapper">

		<?php
			session_start();
			include("admincp/config/config.php");
			include("pages/header.php"); 
			include("pages/menu.php");
			include("pages/main.php");
			include("pages/footer.php"); 
		?>
			<span class="btn btn-danger" id="backtoTOP"><i class="fas fa-arrow-up"></i></span>
			<script src="js/backtoTOP.js"></script>
	</div>
</body>
</html>