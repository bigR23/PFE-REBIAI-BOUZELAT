<?php
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_POST['btnnumber'])){
$number=$_POST['number'];
 if(!empty($_POST['number'])) {
$numberlenth=strlen($_POST['number']);
if($numberlenth ==10){
  header("Location:detection.php?num=".$number);
}else{
  $erreur="numéro de téléphone invalide !";
}

}else{
    $erreur="insérez un numéro de téléphone !";
}

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détection</title>
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
  .searchbox{
  position: relative;
  width:450px;
  right:-30%;
  height: 55px;
  display:flex;
  justify-content: center;
  align-items: center;
  transition: 0.6s;
  }
.searchbox::before{
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 10px;
  height: 100%;
  background: linear-gradient(#fff,#fff,#e3e3e3);
  z-index:1;
  filter: blur(1px);
}
.searchbox::after{
  content: '';
  position: absolute;
  top: 0;
  right: -1px;
  width: 10px;
  height: 100%;
  background:#9d9d9d;
  z-index:1;
  filter: blur(1px);
}
.shadow{
position: absolute;
top:0;
left:-50px;
width:calc(100% + 50px);
height:300px;
background:linear-gradient(180deg,rgba(0,0,0,0.1),transparent,transparent);
transform-origin: top;
transform: skew(45deg);
pointer-events: none;
}

.shadow::before{
  content: '';
  position: absolute;
  width: 50px;
  height: 50px;
  background:linear-gradient(to bottom,rgba(3,96,179,255),rgba(3,97,180,255),rgba(3,100,185,255),rgba(3,100,185,255),rgba(3,100,185,255));
  z-index: 1;
}
.searchbox input{
  position: relative;
  width: 100%;
  height: 100%;
  border:none;
  padding: 10px 25px;
  outline: none;
  font-size: 1.1em;
  color:black;
  background:linear-gradient(#dbdae1,#a3aaba);
  box-shadow: 5px 5px 5px rgba(0,0,0,0.1),
  15px 15px 15px rgba(0,0,0,0.1),
  15px 15px 20px rgba(0,0,0,0.1),
  30px 30px 15px rgba(0,0,0,0.1),
  inset 1px 2px #fff;
}

 #insert {
  position: absolute;
  right: 20px;
  color:#555;
  font-size: 1.4em;
  cursor:pointer;
}
button{
  position: relative;
  height: 55px;
  border: none;
  background: none;
  margin-bottom: 20px;
}
.rech{animation:transition 1s;}
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
    <a href="index.php" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
 <?php if(isset($erreur)){
echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
}
?> 
 </header>
  <h2>Avant de détecter un objet insérez votre numéro de téléphone<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
  <lord-icon
    src="https://cdn.lordicon.com/cnyeuzxc.json"
    trigger="loop"
    colors="primary:#0091ff"
    style="width:60px;height:60px"></h2>
    
    <br>
    <img class="rech" src="img/casual-life-3d-boy.png" height="370px" style="position:absolute;z-index:2;left:0;top:30px;margin:140px"/>
    <form name="formaadd" method="post" class="formulaire" enctype="multipart/form-data">
<div class="searchbox">
  <div class="shadow"></div>
<input type="text" name="number" placeholder="Entrez votre numéro de téléphone"/>
<button  type="submit" name="btnnumber"><i class="fa-solid fa-right-to-bracket"id="insert"></i></button>
</div>
<br>
</form>

</body>
</html>