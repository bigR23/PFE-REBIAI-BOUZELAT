<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
$number=$_GET['num'];
if(isset($_POST['btnrech'])){
	$couleur=$_POST['clr'];
$rech=sha1($_POST['rech']);
 if(empty($_POST['rech']) OR empty($_POST['clr'])) {
  $erreur="complétez tous les champs !";
}
else if(!empty($rech)){
	$rechlenth=strlen($_POST['rech']);
  if($rechlenth <=50 AND $rechlenth >=3 ){
    
$reqobj=$pdo->prepare("SELECT *FROM objet WHERE num_s= ? AND couleur= ? AND confirmation=?");
$reqobj->execute(array($rech,$couleur,'OK'));
$objexist= $reqobj->rowCount();

if($objexist==1){

$objinfo=$reqobj->fetch();


$_SESSION['nature']=$objinfo['nature'];

$_SESSION['num_s']=$objinfo['num_s'];

$_SESSION['couleur']=$objinfo['couleur'];

$_SESSION['photo']=$objinfo['photo'];


$ID=$objinfo['id'];
	$reqprop=$pdo->prepare("SELECT * FROM membres WHERE id= $ID");
  $reqprop->execute();
	$propinfo=$reqprop->fetch();
  $mail=$propinfo['mail'];
  
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
			<p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;"> Votre objet a été retrouvé par un utilisateur de notre application,
      voilà son numéro pour savoir plus: <strong style="color:rgb(0,236,173);">'.$number.'</strong> </p>

<br />
		</div>
	</body>
</html>
';


mail($mail, "Votre objet a été retrouvé !", $message, $header);


header("Location:objet-volé.php?num=$number&nums=".$_SESSION['num_s']);

}else{
  header("Location:objet-n'est-pas-déclaré.php?num=$number&objet=l'objet ");
}
}
else {
$erreur="le numéro de série que vous avez entré est invalide !";
}
}

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détection d'objet</title>
  <link rel="stylesheet" href="css/all.css"/>
  <link rel="shortcut icon" href="S.PNG"/>
</head>
<style type="text/css">
*{
  margin: 0%;
  padding: 0%;
  box-sizing: border-box;
  font-family: sans-serif;
}
body{
  display:flex;
  justify-content:center;
  align-items: center;
  min-height: 100vh;
  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
  overflow: hidden;
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

  header .re{
    font-size:1.5em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
 
  h2{
    position:absolute;
    top:0;
    left: 0;
    animation: blurFadeIn .6s;
    color: #fff;
    text-shadow: 0 0 8px black;
    font-size:2em;
    margin: 70px 60px;
    padding: 20px;
  }
 
  form {
     
     position: relative;
     width: 600px;
    margin-top:180px;
     text-align: center;
     height:350px;
     margin-right:auto;
     margin-left:auto;
     padding:30px;
     border: #0091FF 3px solid;
     background:linear-gradient(to bottom left,#0582e7,#022f53);
     border-radius: 80px;
     box-shadow: 0 0 7px black;
   
   }
   form .inputbx input{
       position:relative;
       text-align:center;
       margin-top:20px;
    margin-bottom:50px;
         width: 70%;
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
       form .inputbx input::placeholder{color: #fff;}
 #loop {
  position: absolute;
  right: 20px;
  color:#555;
  font-size: 1.4em;
  cursor:pointer;
}  button {
   height:40px;width: 240px;text-shadow: 0 0 7px rgb(0, 0, 0);
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
.rech{animation:transition 1s;}
.info { padding:50px;color:#fff;font-size:1em;font-weight:200;text-shadow:0 0 3px black; animation:op .8s;position:absolute;top:100px;left:20px;margin-left:10px;}
@keyframes op{
  0%{
     opacity:0;
   }
   100%{
     opacity:1;
   }
 }
@keyframes transition{
     from{ 
        opacity: 0;
        scale:0;
        transform: translateX(400px);
     }

     to {
      opacity: 1;
      scale:1;
      transform: translateX(0);
     }
   }
   p {color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black; animation:op .9s ,transition .4s;}
   @keyframes op{
  0%{
     opacity:0;
   }
   100%{
     opacity:1;
   }
 }
</style>
<body>
  <header>
    <a href="detection.php?num=<?=$number?>"class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
 <?php if(isset($erreur)){
echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
}
?> </header>
  <h2>Détection d'objet par numéro de série<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <lord-icon
        src="https://cdn.lordicon.com/msoeawqm.json"
        trigger="loop"
        colors="primary:#0091ff,secondary:#0091ff"
        style="width:60px;height:60px">
    </lord-icon></h2>
    <div class="info"><p><img src="img/White-in-Basic5.png" height="30px"/>malheuresement,vous ne pouvez pas détecter n'importe quel objet, il doit au moins avoir un numéro de série ou un numéro unique qui l'identifie </p></div>
    <br>    <br>
    <form name="formaadd" method="post" action="" enctype="multipart/form-data">
    
    <div class="inputbx">
<input type="text" name="rech" placeholder="Entrez le numéro de série"/>
</div>
<div class="inputbx">
      <input type="text" name="clr" id="clr" placeholder="entrez la couleur">
    </div>
<button  type="submit" name="btnrech">Lancer la recherche </button>
</form>

</body>
</html>