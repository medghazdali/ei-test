<?php require_once('./Controller/LoginController.php'); ?>


<?php
  $Login = new LoginController();
  $Response = [];
  $active = $Login->active;
  if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST);
?>
  
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Test Antadis</title>
		<link type="text/css" href="style.css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>

	<?php if (isset($Response['status']) && !$Response['status']) : ?>
	<span><B>Oops     :'(   </B> Informations d'identification utilisées non valides.</span> 
	<?php endif; ?>

		<h1>Identification</h1>
		<!-- <form method="post" action="/index.php?action=login"> -->
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">

			<fieldset>
				<label for="username">Utilisateur</label>
				<input value="test" type="text" name="username" id="username" placeholder="utilisateur" />
				<label for="password">Mot de passe</label>
				<input  value="Medtek@10"  type="password" name="password" id="password" placeholder="mot de passe" />
				<input type="submit" id="submit" value="Connexion" />
			</fieldset>
		</form>
		{{ errors }}
	</body>
</html>

