<?php
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_GET['num'])){
  $number=$_GET['num'];



}


?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Objects Detector</title>  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
 <style type="text/css">
   
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

  
  header{
    position:fixed;
    top:0;
    left: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 50px;
  }

  header .re{
    font-size:1.6em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }
  .banner h2{
    position:absolute;
    top:0;
    left: 0;
    color: #fff;
    text-shadow: 0 0 8px black;
    font-size:2.1em;
    font-weight: 700;
    margin: 70px 60px;
    padding: 19px;
  }
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
  
  .carousel{ height:100vh;}
  .carousel-item{width: 400px;text-align: center;scale: 1;}
  img{ animation:flotter 6s ease-in-out infinite;transition: .5s;}
  .carousel-item:hover img{scale: 1.1;} 

  p{font-size: 1.5em;
     font-family: sans-serif;
    color: azure;
      text-shadow: 0 0 4px black;}
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
     @keyframes ba {
       0% { scale: 1.2; opacity: 0;}
      100%{ scale: 1;opacity: 1;}
     }
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="detection-num.php" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    </header>
     <h2>Choisissez la nature de votre objet <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
      <lord-icon
          src="https://cdn.lordicon.com/ngcezuqf.json"
          trigger="loop"
          colors="primary:#0091ff,secondary:#0091ff"
          style="width:90px;height:50px">
      </lord-icon></h2>

     <div class="carousel">
      <a href="detection-telephone.php?num=<?=$number?>" class="carousel-item"><img src="img/phone.PNG" ><p>Telephone</p></a>
      <a href="detection-laptop.php?num=<?=$number?>" class="carousel-item"><img src="img/Laptop_perspective_matte_s2.PNG"><p>Laptop</p></a>
      <a href="detection-tablette.php?num=<?=$number?>" class="carousel-item"><img src="img/tablette.PNG"><p>Tablette</p></a>
      <a href="detection-appareil-photo.php?num=<?=$number?>" class="carousel-item"><img src="img/Camera_perspective_matte_s2.PNG"><p>Caméra</p></a>
      <a href="detection-SmartWatch.php?num=<?=$number?>" class="carousel-item"><img src="img/Smart_watch_perspective_matte_s.png"><p>Smart watch</p></a>
      <a href="detection-TV.php?num=<?=$number?>" class="carousel-item"><img src="img/TV.PNG"><p>TV</p></a>
      <a href="detection-CasqueVR.php?num=<?=$number?>" class="carousel-item"><img src="img/VR.PNG"><p>VR</p></a>
      <a href="detection-console.php?num=<?=$number?>" class="carousel-item"><img src="img/gamepad.PNG"><p>Console</p></a>
      <a href="detection-vélo.php?num=<?=$number?>" class="carousel-item"><img src="img/velo.PNG"><p>Vélo</p></a>
      <a href="detection-moto.php?num=<?=$number?>" class="carousel-item"><img src="img/moto.PNG"><p>Moto</p></a>
      <a href="detection-voiture.php?num=<?=$number?>" class="carousel-item"><img src="img/voiture.PNG"><p>Voiture</p></a>
      <a href="detection-objet.php?num=<?=$number?>" class="carousel-item"><img src="img/plus-d'objets1.PNG"><p>Autres</p></a>
       
     </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script type="text/javascript">
     $(document).ready(function(){
       $('.carousel').carousel({
         indicators:true
       });
     });
   </script>
</section>

</body>
</html>