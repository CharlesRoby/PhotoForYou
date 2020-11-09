<header>
<?php
    session_start();
?>

		<!-- nav est un élément HTML servant à la navigation -->
    	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        	
        	<a class="navbar-brand" href="index.php">PhotoForYou</a>
        	<!-- Passage en mode hamburger pour petit écran -->
        	<button class="navbar-toggler" type="button" data-toggle="collapse" 
        		data-target="#navbarCollapse" aria-controls="navbarCollapse" 
        		aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
        	</button>

        	<div class="collapse navbar-collapse" id="navbarCollapse">
          		<ul class="navbar-nav mr-auto">
            	 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" >Photos</a>
  						    <div class="dropdown-menu">
  							   <a class="dropdown-item" href="">Acheter</a>
  							   <a class="dropdown-item" href="#">Vendre</a>
  							   <a class="dropdown-item" href="#">Les plus populaires</a>
  							   <a class="dropdown-item" href="#">Les nouveautés</a>
  						    </div>
					     </li>
            	<li class="nav-item">
              			<a class="nav-link" href="#section-tarifs">Tarifs</a></li>
            	</li>
				<li class="nav-item">
              			<a class="nav-link" href="#section-articles">Articles</a></li>
            	</li>
				 </ul>

				      <!-- formulaire de recherche -->
          		<form class="form-inline mt-md-0">
            		<input class="form-control mr-sm-2" type="text" placeholder="Votre recherche" aria-label="rechercher">
            		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          		</form>

          		<ul class="navbar-nav mr-right">
				
				<!-- navbar qui prend en compte le fait d'être client, photographe ou pas inscrit -->
				<?php
					if (isset($_SESSION['TypeUtilisateur'])&& $_SESSION['TypeUtilisateur'] == "client") {
						echo ('<li class="nav-item">
                  <a class="nav-link btn btn-outline-dark" href="connexion.php">Bonjour client '.$_SESSION['nom'].'</a>
            	 </li>
            	 <li class="nav-item">
                  <a class="nav-link btn btn-outline-dark" href="deconnexion.php">deconnexion</a>
					</li>');}
					
					elseif (isset($_SESSION['TypeUtilisateur'])&& $_SESSION['TypeUtilisateur'] == "photographe") {
						echo ('<li class="nav-item">
                  <a class="nav-link btn btn-outline-dark" href="connexion.php">bonjour photographe '.$_SESSION['nom'].'</a>
            	 </li>
            	 <li class="nav-item">
                  <a class="nav-link btn btn-outline-dark" href="deconnexion.php">deconnexion</a>
					</li>');}
					
					else {echo('<li class="nav-item">
                  <a class="nav-link btn btn-outline-dark" href="connexion.php">Se connecter</a>
            	 </li>
            	 <li class="nav-item">
                  <a class="nav-link btn btn-outline-dark" href="inscription.php">S\'inscrire</a>
           		 </li>');}
				?>

          		</ul>  
        	</div>
    	</nav>
</header>