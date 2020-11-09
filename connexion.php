<!doctype html>
<html lang="fr">
    <head>
	    <meta charset="utf-8">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <script>
  (function() {
    "use strict"
    window.addEventListener("load", function() {
      var form = document.getElementById("form")
      form.addEventListener("submit", function(event) {
        if (form.checkValidity() == false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add("was-validated")
      }, false)
    }, false)
  }())
  </script>
</head>

<body>
	<!-- L'élément HTML <header> représente un groupe de contenu introductif aidant à la navigation. -->

<?php
      include "header.php";
?>

<div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Connexion</h1>
      <p class="lead">Merci de remplir ce formulaire de connexion.</p>
      <hr class="my-4">
      <p>Vous pouvez vous connecter en tant que client ou photographe</p>
   
		<form method="post" id="form"  novalidate>

      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" name="mail" id="mail" placeholder="E-mail" required>
          <small id="info" class="form-text text-muted">Nous ne partagerons votre email.</small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse1">Votre mot de passe</label>
          <input type="password" class="form-control" name="mdp" id="mdp" required>
		   <div name="message" class="invalid-feedback">
            Mot de passe invalide
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="nom">Type d'utilisateur</label>
          <input type="text" class="form-control" name="TypeUtilisateur" id="TypeUtilisateur" placeholder="client ou photographe ?" required>
          <div class="invalid-feedback">
            Le champ Type d'utilisateur est obligatoire
          </div>
        </div>
      </div>

		<button class = "btn btn-primary" type="submit" name="submit">Envoyer</button>
			</form>
      
	</div>
    



<?php
	if (isset ($_POST['submit']))
{
	
include "connexionBDD.php";

if (isset($_POST['mail'])) $mail=$_POST['mail'];
	else $mail="";
if (isset($_POST['mdp'])) $mdp=$_POST['mdp'];
	else $mdp="";
if (isset($_POST['TypeUtilisateur'])) $TypeUtilisateur=$_POST['TypeUtilisateur'];
	else $TypeUtilisateur="";

$mdp = md5($_POST['mdp']);
$preparation=$bdd->prepare("select * from user where mail ='$mail' and mdp='$mdp' and TypeUtilisateur='$TypeUtilisateur'");
$preparation->execute();
$session=$preparation->fetch();
$result=$preparation->rowCount();
if ($result>0) { 
	$_SESSION['nom'] = $session ['nom'];
	$_SESSION['id_user'] = $session ['id_user'];
	$_SESSION['prenom'] = $session ['prenom'];
	$_SESSION['mail'] = $session ['mail'];
	$_SESSION['TypeUtilisateur'] = $session ['TypeUtilisateur'];
	
  echo '<script language = "Javascript">
        document.location.replace("index.php");
		</script>';
}
}

?>








<?php
      include "footer.php";
?>