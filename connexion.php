<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");

/* se connecter */

if(isset($_POST['formconnexion']))
{
	$mailconnect=htmlspecialchars($_POST['mailconnect']);
	$mdpconnect=sha1($_POST['mdpconnect']);
	if(!empty($mailconnect)AND !empty($mdpconnect)){
		
		$requser=$pdo->prepare("SELECT *FROM membres WHERE mail= ? AND motdepasse= ?");
		$requser->execute(array($mailconnect,$mdpconnect));
		$userexist=	$requser->rowCount();
		if($userexist==1){
			$userinfo=$requser->fetch();
      if($userinfo['confirme']=='NON'){
        $erreur="le compte n'est pas confirmé, vérifie votre boite mail!";
      }else{
			$_SESSION['id']=$userinfo['id'];
			$_SESSION['pseudo']=$userinfo['pseudo'];
			$_SESSION['mail']=$userinfo['mail'];
      $_SESSION['genre']=$userinfo['genre'];
			header("Location:indexprofil.php?id=".$_SESSION['id']);
      }
		}
		else{
			$erreur="mail ou mot de passe incorrect !";
		}
		
		
	}else{$erreur="Tous les champs doivent être complétés !";}
		
}


/* s'inscrire */

if(isset($_POST['forminscription']))
{
	 $pseudo=htmlspecialchars($_POST['pseudo1']);
   $genre=$_POST['le-genre'];
	   $mail=htmlspecialchars($_POST['mail1']);
       $mail2=htmlspecialchars($_POST['mail2']);
     $mdp=sha1($_POST['mdp1']);
     $mdplenth=strlen($_POST['mdp1']);
	$mdp2=sha1($_POST['mdp2']);
  $num=$_POST['numtel'];
if(!empty($_POST['pseudo1'])
   and!empty($_POST['mail1'])
   and!empty($_POST['mail2'])
   and!empty($_POST['mdp1'])
   and!empty($_POST['mdp2'])
   and!empty($_POST['numtel']))
       {
		
	  
	$pseudolenth=strlen($pseudo);
	if($pseudolenth<= 50){
		 
		
		if($mail==$mail2){
		  if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
			  
		  $reqmail=$pdo->prepare("SELECT * FROM membres WHERE  mail=?");
			   $reqmail->execute(array($mail));
			  $mailexist= $reqmail->rowCount();
			  if($mailexist==0){
				  
          $reqnum=$pdo->prepare("SELECT * FROM membres WHERE  num=?");
          $reqnum->execute(array($num));
         $numexist= $reqnum->rowCount();
         if($numexist==0){
if($mdplenth > 4){
			if($mdp==$mdp2){
				/* script pour générer un code  */
        $longueurkey=12;
        $key='';
        for($i=1;$i<$longueurkey;$i++){
          $key=mt_rand(0,9);
        }

				$insertmembres=$pdo->prepare("INSERT INTO membres(pseudo,mail,motdepasse,genre,num,confirmkey,confirme) VALUES(?,?,?,?,?,?,?)");
				$insertmembres->execute(array($pseudo,$mail,$mdp,$genre,$num,$key,'NON'));
				$erreur2="votre compte a été bien créé confirmez le et connectez vous ! ";
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"ObjectsDetector.com"<support@objectsdetector.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        
        $message='
        <html>
        <head>
        <link rel="stylesheet" href="css/all.css"/>
        </head>
            <div style="background:linear-gradient(to bottom right,#0582e7,#022f53); border: #0091FF solid 3px ;
            border-radius: 40px;
            padding:30px;
            box-shadow: 0 0 10px #151415;
            font-family: sans-serif" 
            align="center">
              <br />
              <a href="http://localhost/OD%20-StolenOrNot/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'"style="font-size:1.3em;color:#fff;margin-top:-15px;text-shadow:0 0 4px #000000;">Cliquez pour confirmer votre compte !</a>
              <br />
        <br />
            </div>
          </body>
        </html>
        ';
        
        
        mail($mail, "Confirmer votre compte  !", $message, $header)  ;
      
			}
			else{
				$erreur1="vos mots de passes ne correspondent pas !";
			}
    }else{
      $erreur1="le mot de passes doit contenir plus que 4 caractères  !";
    }
    }else{
      $erreur1="numéro déja utilisée ";
    }
    
			  
			  }
			  else{
				  $erreur1="adresse mail déja utilisée ";
			  }
			  
			  
			  
		  }else{
			  $erreur1="votre adresse mail n'est pas valide !";
		  }
			  
		}
		else{
			$erreur1="vos adresses mail ne correspondent pas !";
		}
		
	}
	
	
	else{
		$erreur1="votre pseudo ne doit pas dépasser 50 caractères !";
	}

		}
	else
	{
		$erreur1="Tous les champs doivent être complétés";
	}

	
}
  
?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="shortcut icon" href="S.PNG"/>
    <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body,
input {
  font-family: sans-serif;
}

.container {
  position: relative;
  width: 100%;
  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
  min-height: 100vh;
  overflow: hidden;
}

.forms-container {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.signin-signup {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  left: 75%;
  width: 50%;
  transition: 1s 0.7s ease-in-out;
  display: grid;
  grid-template-columns: 1fr;
  z-index: 5;
}

form {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0rem 5rem;
  transition: all 0.2s 0.7s;
  overflow: hidden;
  grid-column: 1 / 2;
  grid-row: 1 / 2;
}

form.sign-up-form {
  opacity: 0;
  z-index: 1;
}

form.sign-in-form {
  z-index: 2;
}

.title {
  font-size: 2.2rem;
color: #fff;
text-shadow: 0 0 4px black;
  margin-bottom: 10px;
}
.title2 {
  font-size: 2rem;
color: #fff;
text-shadow: 0 0 4px black;
  margin-top:10px;
padding:5px;
}
.input-field {
  max-width: 380px;
  width: 100%;
  background:linear-gradient(to right,#022e5365,#0582e7);
  margin: 10px 0;
  height: 55px;
  border-radius: 55px;
  display: grid;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}

.input-field i {
  text-align: center;
  line-height: 55px;
  transition: 0.5s;
  font-size: 1.1rem;
}

#icon {color:#058eff;text-shadow: 0 0 2px black;}

.input-field input {
  background: none;
outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: #ffffff;
}

.input-field input::placeholder {
  color: #ffffffee;
  font-weight: 500;
}

.input-field .selection{
  color: rgba(255, 255, 255, 0.562);
  font-size: 1.1em;
  border: none;
  height:55px;
 background-color: transparent;
  border-radius: 30px;
  text-align: center;
  display:flex;
  flex-direction: column;
  position:relative;
  width:250px;

}

option{
  background-color:rgb(15, 125, 228);
  text-align: center;
}


.panels-container {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.container:before {
  content: "";
  position: absolute;
  height: 1800px;
  width: 2500px;
  top: 50%;
  right: 51%;
  transform: translateY(-50%);
  background:linear-gradient(to top,rgba(6,55,115,25),rgba(6,55,115,25),#0091FF,rgba(6,55,115,25),rgba(6,55,115,25));
  transition: 1.8s ease-in-out;
  border-radius: 49%;
  z-index: 6;
}

.image {
 animation: scaleimage .7s; 
  width: 100%;
  transition: transform 1.1s ease-in-out;
  transition-delay: 0.4s;
}

@keyframes  scaleimage {
  0%{
    scale:1.4;

  }

  100%{
    scale:1;

  }
}
.panel {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-around;
  text-align: center;
  z-index: 6;
}

.left-panel {
  pointer-events: all;
  padding: 3rem 17% 2rem 12%;
}

.right-panel {
  pointer-events: none;
  padding: 3rem 12% 2rem 17%;
}

.panel .content {
  color: #fff;
  transition: transform 0.9s ease-in-out;
  transition-delay: 0.6s;
}

.panel h3 {
  font-weight: 600;
  line-height: 1;
  font-size: 1.5rem;
  text-shadow:0 0 4px black;
}

.panel p {
  font-size: 1.2rem;
  font-weight:500;
  padding: 0.7rem 0; text-shadow:0 0 4px black;
}

button {
  height:40px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
  margin:20px;
  border:none;
  border-radius: 30px 15px;
  position: relative;
  overflow: hidden;
  background:linear-gradient(to bottom,#0582e7,#022f53);
  text-align: center;
  font-size: 18px;
  transition: .3s;
  z-index: 0;
  font-family: inherit;
  color:rgba(220, 220, 220, 0.938);
 }
 
 button::before {
  content: '';
  width: 0;
  height: 300px;
  position: absolute;
  top: 50%;
  left: 50%;
  color: white;
  transform: translate(-50%, -50%) rotate(45deg);
  background:linear-gradient(to bottom,#0582e7,#022f53);
  box-shadow:0 0 10px white;
  transition: 1s ;
  display: block;
  z-index: -1;
 }
 
 button:hover::before {cursor: pointer;box-shadow:0 0 10px white;
  width: 105%;
 }
 
 button:hover {cursor: pointer; 
   box-shadow:0 0 10px white;
   transition: 0.6s;
 }  
 #inscription-btn{
   margin-top:5px;
 }

.right-panel .image,
.right-panel .content {
  transform: translateX(800px);
}



.container.sign-up-mode:before {
  transform: translate(100%, -50%);
  right: 52%;
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
  transform: translateX(-800px);
}

.container.sign-up-mode .signin-signup {
  left: 25%;
}

.container.sign-up-mode form.sign-up-form {
  opacity: 1;
  z-index: 2;
}

.container.sign-up-mode form.sign-in-form {
  opacity: 0;
  z-index: 1;
}

.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
  transform: translateX(0%);
}

.container.sign-up-mode .left-panel {
  pointer-events: none;
}

.container.sign-up-mode .right-panel {
  pointer-events: all;
}

@media (max-width: 870px) {
  .container {
    min-height: 800px;
    height: 100vh;
  }
  .signin-signup {
    width: 100%;
    top: 95%;
    transform: translate(-50%, -100%);
    transition: 1s 0.8s ease-in-out;
  }

  .signin-signup,
  .container.sign-up-mode .signin-signup {
    left: 50%;
  }

  .panels-container {
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 2fr 1fr;
  }

  .panel {
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    padding: 2.5rem 8%;
    grid-column: 1 / 2;
  }

  .right-panel {
    grid-row: 3 / 4;
  }

  .left-panel {
    grid-row: 1 / 2;
  }

  .image {
    width: 200px;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
  }

  .panel .content {
    padding-right: 15%;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.8s;
  }

  .panel h3 {
    font-size: 1.3rem;
  }

  .panel p {
    font-size: 1.1rem;
    padding: 0.5rem 0;
  }

  .btn.transparent {
    width: 110px;
    height: 35px;
    font-size: 0.7rem;
  }

  .container:before {
    width: 1500px;
    height: 1500px;
    transform: translateX(-50%);
    left: 30%;
    bottom: 68%;
    right: initial;
    top: initial;
    transition: 2s ease-in-out;
  }

  .container.sign-up-mode:before {
    transform: translate(-50%, 100%);
    bottom: 32%;
    right: initial;
  }

  .container.sign-up-mode .left-panel .image,
  .container.sign-up-mode .left-panel .content {
    transform: translateY(-300px);
  }

  .container.sign-up-mode .right-panel .image, .container.sign-up-mode .right-panel .content {
    transform: translateY(0px);
  }

  .right-panel .image,
  .right-panel .content {
    transform: translateY(300px);
  }

  .container.sign-up-mode .signin-signup {
    top: 5%;
    transform: translate(-50%, 0);
  }
}

@media (max-width: 570px) {
  form {
    padding: 0 1.5rem;
  }

  .image {
    display: none;
  }
  .panel .content {
    padding: 0.5rem 1rem;
  }
  .container {
    padding: 1.5rem;
  }

  .container:before {
    bottom: 72%;
    left: 50%;
  }

  .container.sign-up-mode:before {
    bottom: 28%;
    left: 50%;
  }
}
</style>
    <title>Authentification</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="" class="sign-in-form">
          <?php if(isset($erreur)){
	 echo '<p style="color:#fff;font-size:1.3em;font-weight:500;margin-top:-15%;margin-bottom:30px;text-shadow:0 0 2px black;"><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
}
	?> <br><br><br>
  <h2 class="title">Se connecter</h2>
            <div class="input-field">
            <i class="fas fa-envelope"id="icon"></i>
              <input type="text" name="mailconnect" placeholder="Mail" />
            </div>
            <div class="input-field">
              <i class="fa-solid fa-lock"id="icon"></i>
              <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            </div>
           <button type="submit" name="formconnexion">Connecter</button>
         
          </form>

          <form method="post" action="" class="sign-up-form">
            <h2 class="title2">S'inscrire</h2>
            <div class="input-field">
              <i class="fas fa-user"id="icon"></i>
              <input type="text" placeholder="Nom et prénom(Pseudo)" id="pseudo1" name="pseudo1" />
            </div>
           
            <div class="input-field">
              <i class="fas fa-envelope"id="icon"></i>
              <input type="email" placeholder="Mail" id="mail1" name="mail1"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"id="icon"></i>
              <input type="email" placeholder="Confirmation du mail" id="mail2" name="mail2"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"id="icon"></i>
              <input type="password" placeholder="Mot de passe " id="mdp1" name="mdp1" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"id="icon"></i>
              <input type="password" placeholder="Confirmation du mot de passe" id="mdp2" name="mdp2"/>
              </div>      
              <div class="input-field">
              <i class="fa-solid fa-phone"id="icon"></i>
              <input type="text" placeholder="numéro du téléphone" id="numtel" name="numtel"/>
              </div>      
              <div class="input-field">
              <i class="fa-solid fa-venus-mars" id="icon"></i>
              <select class="selection" name="le-genre" >
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
              </select>
              </div>         
            <br>
            <button type="submit" name="forminscription" id="inscription-btn"  >S'inscrire</button>
             
          </form>
        </div>
      </div>

      <div class="panels-container">
        
        <div class="panel left-panel">
         
          <div class="content">
             <a href="index.php" style=" font-size:1.5em;position: relative;
             top: -30px;
             left: -223px;
             color: rgb(255, 255, 255);
             text-shadow:0 0 4px #151415;
             font-weight: 700;
             text-decoration: none;
             transition: .5s;" ><i style="color:#058eff;"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
            <h3> T'es un noveau ?</h3>
            <p>
              avant toute une déclaration ou utilisation du coffre virtuel il faut s'authentifier
            </p>
  <?php          if(isset($erreur2)){
  echo '<p style="color:#fff;font-size:20px;wieght:400;"><i class="fa-solid fa-user-check" style="color:rgb(0,236,173);"></i> '.$erreur2."</p>";
  
} ?>
            <button  id="sign-up-btn">
              S'inscrire
           </button>
        </div>
       <img src="img/lock-iso-color1.png" class="image" alt="" />
        </div>
      <div class="panel right-panel">
      <div class="content">
           <h3>T'es Parmi nous ?</h3>
            <p>
              si vous possédez un compte connectez vous directement
            </p>
           <?php if(isset($erreur1)){
	 echo '<p style="color:#fff;font-size:1.3em;font-weight:500;text-shadow:0 0 2px black;"><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur1."</p>";
}  

	?>    <button  id="sign-in-btn">
                Se connecter
             </button>

          </div>
          <img src="img/boy2.PNG" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>