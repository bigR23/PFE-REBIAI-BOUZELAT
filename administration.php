<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_SESSION['nomadmin'])){
 $ad=$_GET['nomadmin'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace Admin</title>
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
    padding: 10px 50px;
  }

h2{
    font-size:1.5em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }

 
  
       button { animation: ba .5s;
   height:45px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin-right: 40px;
   margin-top: 50px;
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
  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
    
  }  .banner{
    position:relative;
    width: 100%;
    min-height: 100vh;
    padding: 0 80px;
    display: flex; 
    background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
   
  }
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
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
   .container{width: 100%;display: flex;justify-content: space-between;flex-wrap: wrap;margin-top:140px;position: relative;}
</style>
<body>
<section class="banner">
  <header>

<a href="deconnexion-admin.php" class="re"><button style="width:200px; background:#0582e7;   margin-top:20px;">déconnecter</button></a>
    <img src="S.png" height="60px"style=" margin-top:20px;">
    </header>
        
<div class="container">
 <div class="contenu">
      <h2> gérer les déclarations &emsp;<i id ="icon"class="fa-solid fa-clipboard-list"></i> </h2>
 <a href="admin-tel.php"><button>Téléphone &emsp14; <i class="fas fa-mobile-alt" id="icon"></i></button></a>
             <a href="admin-tab.php"> <button>Tablette &emsp14;<i class="fas fa-tablet-alt" id="icon"></i></button></a>
             <a href="admin-lap.php"><button>Laptop &emsp14;<i class="fas fa-laptop"id="icon"></i></button></a>
             <a href="admin-voiture.php"><button> Voiture &emsp14;<i class="fa-solid fa-car" id="icon"></i></button></a>
             <a href="admin-app.php"><button>Appareil Photo &emsp14;<i class="fas fa-camera"id="icon"></i></button></a>
             <a href="admin-tv.php"><button>TV &emsp14;<i class="fas fa-tv"id="icon"></i></button></a>
             <a href="admin-vélo.php"><button>Vélo &emsp14;<i class="fas fa-bicycle"id="icon"></i></button></a>
             <a href="admin-moto.php"><button>Moto &emsp14;<i class="fas fa-motorcycle"id="icon"></i></button></a>
             <a href="admin-sw.php"><button>Smart Watch &emsp14;<img src="SmartWatch/smartwatch1.png" height="20px" style="filter:drop-shadow(0 0 1px black)"/></button></a>
             <a href="admin-console.php"><button>Console &emsp14;<i class="fa-solid fa-gamepad" id="icon"></i></button></a>
             <a href="admin-vr.php"> <button> Casque VR &emsp14; <i class="fa-solid fa-vr-cardboard" id="icon"></i></button></a>
             <a href="admin-objet.php"><button>autres &emsp14; <i class="fas fa-plus"id="icon"></i></button></a>
             <a href="admin-membres.php"><button style="margin-left:440px;width:270px;"> gérer les membres &emsp14;  <i class="fas fa-user"id="icon"></i></button></a>
</div>
</div>
</section>
</body>
</html>
<?php }  ?>