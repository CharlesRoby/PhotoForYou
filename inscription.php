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
      <h1 class="display-4">Inscription</h1>
      <p class="lead">Merci de remplir ce formulaire d'inscription.</p>
      <hr class="my-4">
      <p>Vous ferez bientôt parti de nos membres. Vous avez fait le bon choix ;-)</p>
    
		    <form method="POST"  oninput='mdp2.setCustomValidity(mdp2.value != mdp.value ?  "Mot de passe non identique" : "")' novalidate>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" required>
          <div class="invalid-feedback">
            Le champ prénom est obligatoire
          </div>
        </div>
      </div>
      
	  <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
          <div class="invalid-feedback">
            Le champ nom est obligatoire
          </div>
        </div>
      </div>
      
	  <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" id="mail" name="mail" placeholder="mail" required>
          <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email.</small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
        </div>
      </div>
      
	  <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse1">Votre mot de passe</label>
          <input type="password" class="form-control" name="mdp" required>
        </div>
      </div>
      
	  <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse2">Confirmation du mot de passe</label>
          <input type="password" class="form-control" name="mdp2" required>
          <div name="message" class="invalid-feedback">
            Mot de passe invalide
          </div>
        </div>
      </div>

      <!-- Choisir Client ou Photographe -->
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-info">
          <input type="radio" name="client" id="client" value="client">
          Client
        </label>
        
		<label class="btn btn-info">
          <input type="radio" name="photographe" id="photographe" value="photographe">
          Photographe
        </label>
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="offres">
          <label class="form-check-label" for="offres">
            Oui, je veux recevoir des sources d’inspiration visuelles, des offres spéciales et autres communications par e-mail. 
          </label>
        </div>
      </div>
<button class = "btn btn-primary" type="submit" name="submit">Envoyer</button>

 
	    </form>
	</div>
		

<?php 
	if (isset ($_POST['submit']))
{
	
	include "connexionBDD.php";
	
if(isset($_POST['nom'])) $nom=$_POST['nom'];
else $nom="";
if(isset($_POST['prenom'])) $prenom=$_POST['prenom'];
else $prenom="";
if(isset($_POST['mail'])) $mail=$_POST['mail'];
else $mail="";
if(isset($_POST['mdp'])) $mdp=$_POST['mdp'];
else $mdp="";

$mdp= md5($mdp);
	
	if (isset ($_POST['client']))

{

$insertion = $bdd->prepare('INSERT INTO user(mail, mdp, nom, prenom, TypeUtilisateur) VALUES (:mail, :mdp, :nom, :prenom, "client")');
$insertion->execute(array('mail'=>$mail,'mdp'=>$mdp,'nom'=>$nom,'prenom'=>$prenom));

$id = $bdd->prepare("insert into client(id_client) select id_user from user where mail='$mail' and nom='$nom' and prenom='$prenom' and TypeUtilisateur='client' ORDER BY id_user desc limit 1 ");
$id->execute();

  echo '<script language = "Javascript">
        document.location.replace("connexion.php");
		</script>';
}

else{

$insertion = $bdd->prepare('INSERT INTO user(mail, mdp, nom, prenom, TypeUtilisateur) VALUES (:mail, :mdp, :nom, :prenom, "photographe")');
$insertion->execute(array('mail'=>$mail,'mdp'=>$mdp,'nom'=>$nom,'prenom'=>$prenom));

$id = $bdd->prepare("insert into photographe(id_photographe) select id_user from user where mail='$mail' and nom='$nom' and prenom='$prenom' and TypeUtilisateur='photographe' ORDER BY id_user desc limit 1 ");
$id->execute();

  echo '<script language = "Javascript">
        document.location.replace("connexion.php");
		</script>';
	
	}
}

?>


<?php
      include "footer.php";
?>




