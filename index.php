<?php
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_POST['send'])){
if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['num']) AND !empty($_POST['msg']) ){
$nom=$_POST['nom'];
$num=$_POST['num'];
$mail=$_POST['mail'];
$msg=$_POST['msg'];
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
      <p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$nom.'</p>
      <p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$num.'</p>
      <p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$mail.'</p>
      <p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$msg.'</p>

<br />
    </div>
  </body>
</html>
';


mail("objectsdetector1@gmail.com", "message d'un utilisateur !", $message, $header)  ;
$erreur2="votre message a été envoyé !";

}else{
  $erreur1="complétez tout les champs !";
}
}



?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Objects Detector</title>  
<style>
  
  
  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
  }

  .banner{
    position:relative;
    width: 100%;
    min-height: 100vh;
    padding:0 100px;
    display: flex; align-items: center;
    background:linear-gradient(to bottom ,rgba(6,55,115,25),rgba(6,55,115,25),#0091FF);
   
  }
  .banner:before{
  
    content: '';
    position: absolute;
    top:50px;
    left:300px;
    width: 370px;
    height: 320px;
    background:linear-gradient(to top left,rgba(6,55,115,25),#0091FF,rgba(6,55,115,25));
    opacity: .9;
    z-index: 1;
    transition: .8s;
    border: none;
    border-radius: 20% 100%;
  }
  .banner.active:before{
    position:fixed;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
    border: none;
    border-radius: 0%;
  }
  
  header{
    position:fixed;
    top:0;
    left: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 50px;
  }

  header .logo{
    font-size: 2em;
    color: rgb(255, 255, 255);
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
    animation: blurFadeIn .6s;
  }
  @keyframes blurFadeIn {
	0% {
		opacity: 0;
		transform: scale(1.8);
	}

	100% {
		opacity: 1;
		transform: scale(1);
	}
}
  .banner.active .logo{
    transform: scale(0);
    transform-origin:left;
  }
 .toggle{position:relative;height: 30px;width: 30px;
                    background: url("img/toggle.png");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: 30px;
                    cursor: pointer;

  }
  .toggle.active{
  background: url("img/close.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 25px;
  cursor: pointer;
}


.banner.active .content{
    transform: scale(0);
    transform-origin:left;
  }
 button {
   height:40px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin:0px;
   border:none;
   border-radius: 30px 15px;
   position: relative;
   overflow: hidden;
   background:linear-gradient(to bottom,#0582e7,#022f53);
   text-align: center;
   font-size: 18px;
   color: #ddd;
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

.content{position:relative;
  z-index: 2;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: .5s;
  transform-origin: right;}
  
  .content .contentbx{max-width: 600px;}
.contentbx h2{text-transform: uppercase;color: #fff;line-height: 1em;font-size:3.5em;text-shadow:0 0 8px #151415;   animation: blurFadeIn .6s;}
.contentbx h3{text-transform: uppercase;color: #fff;line-height: 1em;font-size:2.5em;text-shadow:0 0 8px #151415;}
.contentbx p {font-size:19px;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #151415;}
.contentbx a {color: #fff; text-decoration: none; font-size: 20px;}

 @keyframes flotter{
 0% {
        transform: translateY(0px);
      }
    50%{
        transform: translateY(-20px);
      }
      100%{
        transform: translateY(0px);
      }
    }

 .imgbx img {
 animation:flotter 6s ease-in-out infinite;
  max-width: 100%;
  min-width: 360px;
}

.menu{position: fixed;top: 0;left: 0;width: 100%;height: 100%;display: flex;justify-content: center;align-items: center;
flex-direction: column;z-index: 2;visibility: hidden;opacity: 0;transition: .3s;transition-delay:0s;}

.banner.active .menu{visibility:visible;opacity:1;transition-delay:.4s;}
.menu li{list-style:none; padding: 20px;}

.menu li a{color: #fff;text-decoration: none;font-size: 25px; font-family: sans-serif;}
.menu li :hover {opacity: 0.4;}

#icon{color:#058eff;text-shadow: 0 0 3px black;}

.partie1{
  justify-content: center;align-items: center;display: flex;text-align: center;width: 100%;position: relative;
  background-color: #0091FF;
}
.partie1 h2{
  font-size: 1.5em;
  color: #fff;
  text-shadow: #151415 0 0 4px;
}
.partie2{justify-content: center;align-items: center;display: flex;text-align: center;width: 100%;position: relative;
background: linear-gradient(to bottom,#0091FF,rgba(6,55,115,25));padding: 50px;}
.inscription{ padding-top:100px;}

.partie1 p,.partie2 p ,.partie3 p,.partie4 p,.partie5 p{font-size:19px;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;}

.partie2 h2,.partie3 h2,.partie4 h2,.partie5 h2{font-size:2em;color:#fff ;margin: 20px 0px;text-shadow:0 0 7px #000000;}

.dec{
  width: 40%;
  padding: 40px;
  margin: 40px;
  background:linear-gradient(to bottom left,#0582e7,#022f53);
  border: #0091FF solid 3px ;
  border-radius: 60px;
  box-shadow: 0 0 10px #151415;
}

.det{
  width: 40%;
  padding: 40px;
  margin: 40px;
  background:linear-gradient(to bottom right,#0582e7,#022f53);
  border: #0091FF solid 3px ;
  border-radius:60px ;
  box-shadow: 0 0 10px #151415;
}


.partie3{justify-content: center;align-items: center;text-align: center;width: 100%;position: relative;
background: linear-gradient(to bottom,rgba(6,55,115,25),rgba(6,70,130,35),#0091FF); padding: 60px;padding-top: 100px;}

.service .locker 
{height:190px;
   width: 170px;
  margin-left: auto;
    margin-right: auto;
                    background:url("img/coffre.png");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size:190px;
                    cursor: pointer;
                  transition: .4s;}
.service .locker:hover{
                   scale: 1.1;
                      }
                    

.partie4{
  justify-content:center;
  align-items: center;
  text-align: center;
  width: 100%;
  position: relative;
  display: flex;
background:linear-gradient(to top,rgba(6,55,115,25),rgba(6,70,130,35),#0091FF); 
padding:80px;
padding-top: 100px;}

.partie5{
  align-items: center;
  width: 100%;
  position: relative;
  padding:50px;
  background:rgba(6,55,115,25);
  padding-top: 50px;}


  .partie6{
text-align: center;  
position: relative;
width: 100%;
background: black;
display: flex;
background:linear-gradient(to bottom,rgba(6,55,115,25),rgba(6,70,130,35),#0091FF);
}  
.form {width: 50%;
    text-align: center;
   height: 550px;;
   padding:40px;
   margin: 30px;
   border: #0091FF 3px solid;
   background:linear-gradient(to bottom left,#0582e7,#022f53);
   border-radius: 80px;
   box-shadow: 0 0 7px black;
}
    .form .inputbx {margin-bottom: 40px;}

    .form .inputbx input{ 
      width: 100%;
      background-color: transparent;
      box-shadow: none;
      border: none;
      outline: none;
      padding: 10px 0;
      font-size: 18px;
      font-weight: 300;
      color: #fff;
      border-bottom:  2px solid #fff;
    }
    .form .inputbx input::placeholder{color: #fff;}

    .form .inputbx textarea{
      width: 100%;
      background-color: transparent;
      box-shadow: none;
      border: none;
      outline: none;
      padding: 10px 0;
      font-size: 18px;
      font-weight: 300;
      min-height: 150px;
      color: #fff;
      border-bottom:  2px solid #fff;
    }
    .form .inputbx textarea::placeholder{color: #fff;}

    .form .inputbx input[type="submit"]{
      width: 150px;
      background-color: #056dc2;
      ;font-weight: 400p;
      cursor: pointer;
      color: black;}

  .imgbx2{ 
    width: 50%;
    align-items: center;
    justify-content: center;
    text-align: center}

  .imgbx2 img {margin-top:200px;}

  footer{
    background: #0091FF;
    text-align: center;
    padding: 30px;
    margin: 0%;

  }


      
@media(max-width:991px){

  header{padding: 20px 30px;}

  .banner{padding:40px;overflow: hidden;}

  .banner a {font-size:28px;}

  .banner:before{top: 150px;
    left: 40px;
    width: 170px;
    height: 310px;}

   .content{
     flex-direction: column-reverse;
    margin: 50px 0;}

   .content .contentbx{
     max-width:100%;
    text-align: center;}

   .content .imgbx img{
     max-width: 100%;
    min-width:300px;
    height: 300px;}

    .partie1{ flex-direction: column;}
    .dec,.det{width: 90%;}

    .partie2 h2 ,.partie2 p{padding:5px;}

    .partie3 h2 ,.partie3 p{padding:5px;}
    .partie6{ flex-direction: column;}
    .partie6 .form{ width:90%;margin:auto;}
    
    .partie6 .imgbx2 img{ margin-top:20%;margin:auto;margin-left:50%; }
    footer {margin-bottom:-100px;padding: 0%;}
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("a").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        } 
      });
    });
    </script>          
</head>

<body>

  <section class="banner"id="top">
    <header>
      <a href="#top" class="logo" ><img src="S.PNG" height="80px" style="filter: drop-shadow(0 0 1px black);"><span style="position:relative;top:-30px;text-shadow:0 0 4px #000000;"> Stolen or not</span></a>
      <div class="toggle" onclick="toggle();"></div>
    </header>
    <div class="content" data-0-top="opacity:0;left:100px" data-50-top="opacity:1;left:0px">
      <div class="contentbx">
        <h2 >Objects Detector</h2>
        <p>Bienvenu sur objects detector ,un detecteur et un registre des objets volés ,
          le site vous permet de savoir si l'objet proposé pour vous été déja volé ou non , 
          et il vous permet de déclarer le vol d'un objet qui apppartient a vous pour sensibiliser les autres
           pour ne pas l'acheter,le site propose aussi d'autres services clique pour savoir plus  </p>
   <a href="#service"><button style="width: 180px;padding: 10px 30px ;">Savoir Plus</button></a>
      </div>
      <div class="imgbx" >
        <img src="img/icone-od.PNG" height="360px" >
      </div>
   </div>
  <div class="menu">
   <ul >
    <li><a href="#top"><i id="icon"class="fas fa-home"></i> &emsp; Acceuil</a></li>
  
    <li><a href="connexion.php"><i id="icon"class="fas fa-user-alt"></i>&emsp;Se connecter</a></li>
    
    <li><a href="#service"><i id="icon" class="fas fa-handshake"></i>&emsp;Service</a></li>
  
    <li><a href="#Apropos"><i id="icon"class="fas fa-question-circle"></i>&emsp;A propos</a></li>
    
    <li><a href="#contact"> <i id="icon"class="fas fa-envelope"></i>&emsp;Contacter</a></li>
  </ul>
  </div>
  <a href="#footer"  data-0-bottom="opacity:1;" data-0-top="opacity:0;" style="position:fixed;margin-left:40%;margin-top:550px;z-index:0;"><img src="img/flesh.png"  height="40px"></a>
  </section>
 


  <section class="partie1">
    <div class="dec"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
      <h2>Décalarer un objet </h2>
      <br>
      <p>vous êtes une victime d'un vol ou vous avez perdu un objet
         qui vous appartient n'hesitez pas a le déclarer </p>
      <br>
     <a href="connexion.php"><button>Déclarer un objet</button></a> 
    </div>
    <div class="det"data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-50px;">
      <h2>Détecter un objet </h2>
      <br>
      <p>Tu veux acheter un objet d'occasion détecte le
        chez nous pour savoir si il été déja volé ou non </p>
      <br>
      <a href="detection-num.php"> <button>Détecter un objet</button></a>
    </div>
  </section>


    <section class="partie2" >
     <div class="inscription" >
      <h2 data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-100px;">N'hesitez pas a nous rejoindre</h2>
      <span data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-60px;">
      <p>inscrivez vous avant de déclarer un objets on cas ou votre objets sera détecter on vous informe directement </p>
      <br>
       <img src="img/team.png" height="160px">
       <br> <br>  <br> 
      <a href="connexion.php"><button> S'inscrire</button></a></span>
     </div>
    </section>

    <section class="partie3" id="service" >
      <div class="service">
<h2 data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-100px;"> Nos Services </h2>
<p data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-60px;">Object Detector vous permet de:<br><br>
Faire une déclaration d'un objet volé,et dés que votre objet sera détecté par quelq'un on vous informe directement<br>
on vous rapportant quelques informations qui peuvent etre utile pour le retrouver <br><br>
Détecter un objet proposé pour vous s'il est déja volé ou  non <br><br>
Object detector propose aussi un suppliment c'est :<br><br>
  "Le coffre Virtuelle"<br> 
  <br>il vous permet de stocker vos documents sensible en cas de vol ou perte</p>
  <a href="connexion.php"><div class="locker"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-100px;"></div></a>

      </div>

    </section>



    <section class="partie4" id="Apropos"> 
    <div class="apropos">
      <h2 data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-100px;">A propos</h2>
      <p data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-60px;">Bienvenue chez OBJECT DETECTOR STOLEN OR NOT, notre site est a votre disposition en cas ou vous voulez acheter un objet d'occasion quelque soit
        Smartphone ,PC, Tablette,vélo... notre site détecte si l'objet qui vous intéresse a été déjà volé ou non et bien-sur aussi vous pouvez
        faire une déclaration de vole pour faire sensibiliser les gens pour ne pas acheter cet objet et éviter les arnaqeurs </p>
    </div>
    </section>


    <section class="partie5" id="contact">
<h2 data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-100px;">Nous contacter</h2>
<p data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-40px;">Bienvenue chez OBJECT DETECTOR STOLEN OR NOT, notre site est a votre disposition en cas ou vous voulez acheter un objet d'occasion quelque soit
  Smartphone ,PC, Tablette,vélo... notre site détecte si l'objet qui vous intéresse a été déjà volé ou non et bien-sur aussi vous pouvez
  faire une déclaration de vole pour faire sensibiliser les gens pour ne pas acheter cet objet et éviter les arnaqeurs </p>
</section>

<section class="partie6">
<div class="form">
  <?php if(isset($erreur1)){
    echo '<p style="color:#fff;font-size:1.2em;font-weight:500;text-shadow:0 0 2px black;"><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur1."</p>";
 } else
 if(isset($erreur2)){
  '<p style="color:#fff;font-size:1.2em;font-weight:500;text-shadow:0 0 2px black;">   <i class="fa-solid fa-circle-check"style="color:rgb(0,236,173);"></i>'.$erreur2."</p>";

 }
 
   ?>
  <div class="inputbx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">

      <form method="post">
    <input type="text" placeholder="nom complet" name="nom">
  </div>
  <div class="inputbx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
    <input type="text" placeholder="mail"name="mail">
  </div>
  <div class="inputbx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
    <input type="text" placeholder="numéro de téléphone"name="num">
  </div>
  <div class="inputbx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
    <textarea type="text" placeholder="ecrivez votre message"name="msg"></textarea>
  </div>
    <button type="submit" name="send">Envoyer</button>
    </div>
      <form>
        
<div class="imgbx2"><img src="img/mail.png" height="250px"></div>
 

        </section>

    <footer id=footer>
      <br><br>
      <sub>© Tous droits réservés-2022</sub><br>
      <sub> Réalisé par Mr. Rebiai Achraf, Bouzelat Tarek</sub>
    </footer>
   <script type="text/javascript">
    function toggle(){
      const toggle = document.querySelector('.toggle');
      const banner = document.querySelector('.banner');
      toggle.classList.toggle('active')
      banner.classList.toggle('active')

    }
    
  </script>
 <script src="skrollr.js"></script>
  <script type="text/javascript">
  var s = skrollr.init();
  </script>

  
</body>
</html>