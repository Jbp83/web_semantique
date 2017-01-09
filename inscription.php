
<!DOCTYPE html>  
<html>  
<head>  
    <meta charset=utf-8 />  
    <title>Pictionnary - Inscription</title>
</head>  
<body>  
<header>
	<?php
		include "header.php";
	?>
</header>
<div class="container">  
<h2>Inscrivez-vous</h2>  
<form role="form" class="form-horizontal" action="req_inscription.php" method="post" name="inscription">  
   
    <span class="form_hint">Les champs obligatoires sont indiqués par *</span>  
		<div class="form-group">
            <label class="control-label col-sm-2" for="email">E-mail* :</label>
			<div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" autofocus required="required" placeholder="name@something.com"/>
			</div>
			<?php
				if(isset($_GET['erreur']))
				{
					echo '<span>email d&eacute;j&agrave; utilis&eacute;</span>';
				}
			?>
           
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="mdp1">Mot de passe* :</label>
			<div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="mdp1" pattern="^[a-z0-9A-Z]{6,8}" onkeyup="validateMdp2()" title = "Le mot de passe doit contenir de 6 à 8 caractères alphanumériques." placeholder="le mot de passe doit être composé de 6 à 8 caractères alphanumériques" required/>
            </div>
			

		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="mdp2">Confirmez mot de passe* :</label>
			<div class="col-sm-10">
            <input class="form-control" type="password" id="mdp2" required onkeyup="validateMdp2()" placeholder="entrez un mot de passe identique au premier"/>
			</div>
            
            <script>  
                validateMdp2 = function(e) 
				{  
                    var mdp1 = document.getElementById('mdp1');  
                    var mdp2 = document.getElementById('mdp2');
					var re = /^[a-z0-9A-Z]{6,8}/;
                    if (re.exec(mdp1.value) && mdp1.value==mdp2.value) 
					{  
                       
                        document.getElementById('mdp2').setCustomValidity('');  
                    } 
					else 
					{  
                        
                        document.getElementById('mdp2').setCustomValidity('Les mots de passe ne sont pas identique');  
                    }  
                }  
            </script>
		</div>
		<div class="form-group"> 
            <label class="control-label col-sm-2" for="nom">Nom :</label>
			<div class="col-sm-10">
            <input class="form-control" type="text" name="nom" id="nom"/> 
			</div>
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="prenom">Pr&eacute;nom* :</label>
			<div class="col-sm-10">
            <input class="form-control" type="text" name="prenom" id="prenom" required="required" placeholder="Entrez votre pr&eacute;nom"/> 
			</div>
          
		</div>
		<div class="form-group"> 
            <label class="control-label col-sm-2" for="telephone">Téléphone :</label>  
			<div class="col-sm-10">
            <input class="form-control" type="tel" name="telephone" id="telephone"/>
			</div>
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="siteweb">Site Web :</label> 
			<div class="col-sm-10">
            <input class="form-control" type="url" name="siteweb" id="siteweb"/>
			</div>
		</div>
		<div class="form-group">
		<label class="control-label col-sm-2">Sexe :</label>
		<div class="col-sm-10">  
            <label> Homme : </label><input value="H" class="form-control" type="radio" name="sexe"/><label> Femme : </label><input value="F" class="form-control" type="radio" name="sexe"/>
		</div>
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="birthdate">Date de naissance* :</label> 
			<div class="col-sm-10">
            <input class="form-control" type="date" name="birthdate" id="birthdate" placeholder="JJ/MM/AAAA" required onchange="computeAge()"/>
			</div>
			<script>  
                computeAge = function(e) 
				{  
                    try
					{  
                        // j'affiche dans la console quelques objets javascript, ce qui devrait vous aider.  
                        console.log(Date.now());  
                        console.log(document.getElementById("birthdate"));  
                        console.log(document.getElementById("birthdate").value);  
                        console.log(Date.parse(document.getElementById("birthdate").value));  
                        console.log(new Date(0).getYear());  
                        console.log(new Date(65572346585).getYear());  
						console.log(document.getElementById("age"));
						// modifier ici la valeur de l'élément age
						var dateAtuel = new Date();
						var anneeActuel = dateAtuel.getYear();
						var moiActuel = dateAtuel.getMonth();
						var jourActuel = dateAtuel.getDay();
						var dateNaissance = Date.parse(document.getElementById("birthdate").value);
						var anneeNaissance = new Date(dateNaissance).getYear();
						var moiNaissance = new Date(dateNaissance).getMonth();
						var jourNaissance = new Date(dateNaissance).getDay();
						if(moiActuel < moiNaissance)
						{
							document.getElementById("age").value = anneeActuel - anneeNaissance - 1;
						}
						else if(moiActuel > moiNaissance)
						{
							document.getElementById("age").value = anneeActuel - anneeNaissance;
						}
						else
						{
							if(jourActuel < jourNaissance)
							{
								document.getElementById("age").value = anneeActuel - anneeNaissance - 1;
							}
							else
							{
								document.getElementById("age").value = anneeActuel - anneeNaissance;
							}
						}
					}
					catch(e) 
					{  
						document.getElementById("age").value = "";
					}  
				}  
			</script>  
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="age">Age:</label> 
			<div class="col-sm-10">
            <input class="form-control" type="number" name="age" id="age" disabled/> 
			</div>
            <!-- à quoi sert l'attribut disabled ? empeche l'utilisateur de changer la valeur-->
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="ville">Ville :</label> 
			<div class="col-sm-10">
            <input class="form-control" type="text" name="ville" id="ville"/> 
			</div>
		</div>
		<div class="form-group">  
            <label class="control-label col-sm-2" for="taille">Taille :</label>
			<div class="col-sm-10">
            <input class="form-control" type="range" name="taille" id="taille" min="0" max="250" step="1"/>
			</div>
		</div>
		<div class="form-group"> 
            <label class="control-label col-sm-2" for="couleur">Couleur Pr&eacute;f&eacute;r&eacute;e :</label> 
			<div class="col-sm-10">
            <input class="form-control" type="color" name="couleur" id="couleur" value="#000000"/> 
			</div>
		</div>
		<div class="form-group">
            <label class="control-label col-sm-2" for="profilepicfile">Photo de profil:</label>
			<div class="col-sm-10">
            <input class="form-control" type="file" id="profilepicfile" onchange="loadProfilePic(this)"/>
			</div>
           
            <span class="form_hint">Choisir une image</span>  
			<div class="col-sm-10">
            <input class="form-control" type="hidden" name="profilepic" id="profilepic"/> 
			</div>

            <!-- l'input profilepic va contenir l'image redimensionnée sous forme d'une data url -->   
            <!-- c'est cet input qui sera envoyé avec le formulaire, sous le nom profilepic -->  
            <canvas id="preview" width="0" height="0"></canvas>  
            <!-- le canvas (nouveauté html5), c'est ici qu'on affichera une visualisation de l'image. -->  
            <!-- on pourrait afficher l'image dans un élément img, mais le canvas va nous permettre également   
            de la redimensionner, et de l'enregistrer sous forme d'une data url-->  
            <script>  
                loadProfilePic = function (e) {  
                    // on récupère le canvas où on affichera l'image  
                    var canvas = document.getElementById("preview");  
                    var ctx = canvas.getContext("2d");  
                    // on réinitialise le canvas: on l'efface, et déclare sa largeur et hauteur à 0  
                    ctx.fillStyle="white";  
                    ctx.fillRect(0,0,canvas.width,canvas.height);  
                    canvas.width=0;  
                    canvas.height=0;  
                    // on récupérer le fichier: le premier (et seul dans ce cas là) de la liste  
                    var file = document.getElementById("profilepicfile").files[0];  
                    // l'élément img va servir à stocker l'image temporairement  
                    var img = document.createElement("img");  
                    // l'objet de type FileReader nous permet de lire les données du fichier.  
                    var reader = new FileReader();  
                    // on prépare la fonction callback qui sera appelée lorsque l'image sera chargée  
                    reader.onload = function(e) {  
                        //on vérifie qu'on a bien téléchargé une image, grâce au mime type  
                        if (!file.type.match(/image.*/)) {  
                            // le fichier choisi n'est pas une image: le champs profilepicfile est invalide, et on supprime sa valeur  
                            document.getElementById("profilepicfile").setCustomValidity("telechargement image");  
                            document.getElementById("profilepicfile").value = "";  
                        }  
                        else {  
                            // le callback sera appelé par la méthode getAsDataURL, donc le paramètre de callback e est une url qui contient   
                            // les données de l'image. On modifie donc la source de l'image pour qu'elle soit égale à cette url  
                            // on aurait fait différemment si on appelait une autre méthode que getAsDataURL.  
                            img.src = e.target.result;  
                            // le champs profilepicfile est valide  
                            document.getElementById("profilepicfile").setCustomValidity("");  
                            var MAX_WIDTH = 96;  
                            var MAX_HEIGHT = 96;  
                            var width = img.width;  
                            var height = img.height;  
  
                            // A FAIRE: si on garde les deux lignes suivantes, on rétrécit l'image mais elle sera déformée  
                            // Vous devez supprimer ces lignes, et modifier width et height pour:  
                            //    - garder les proportions,   
                            //    - et que le maximum de width et height soit égal à 96  
                            if(width > height)
							{
								height = (height*MAX_HEIGHT)/width;
								width = MAX_WIDTH;
							}
                            else if(height > width)
							{
								width = (width*MAX_WIDTH)/height;
								height = MAX_HEIGHT;
							}
							else
							{
								height = MAX_HEIGHT;
								width = MAX_WIDTH;
							}
                            canvas.width = width;  
                            canvas.height = height;  
                            // on dessine l'image dans le canvas à la position 0,0 (en haut à gauche)  
                            // et avec une largeur de width et une hauteur de height  
                            ctx.drawImage(img, 0, 0, width, height);  
                            // on exporte le contenu du canvas (l'image redimensionnée) sous la forme d'une data url  
                            var dataurl = canvas.toDataURL("image/png");  
                            // on donne finalement cette dataurl comme valeur au champs profilepic  
                            document.getElementById("profilepic").value = dataurl;  
                        };  
                    }  
                    // on charge l'image pour de vrai, lorsque ce sera terminé le callback loadProfilePic sera appelé.  
                    reader.readAsDataURL(file);  
                }  
            </script>
		</div>  
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-default" value="Soumettre Formulaire"> 
		</div>
		</div>
</form>
</div>
</body>  
</html> 
            
    
