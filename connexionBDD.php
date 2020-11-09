<!-- Connexion a la base de donnée -->
<?php 
try
{
		$bdd=new PDO ('mysql:host=127.0.0.1;dbname=photoforyou;charset=utf8', 'root', '');
}

catch(PDOExcpetion $e)
{
		die('Erreur : '.$e->getMessage());
}
?>
