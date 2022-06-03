<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
 if( isset($_SESSION['id'])){
	$ID=$_SESSION['id'];

?><!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>

      <title>Objects Detector</title>  

 <style type="text/css">
     
     button {
   height:40px;width: 200px;text-shadow: 0 0 7px rgb(0, 0, 0);
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
  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
    
  }  .banner{
    position:relative;
    text-align: center;
    width: 100%;
    min-height: 100vh;
    padding: 0 80px;
    display: flex; align-items: center;
    background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF,rgba(6,55,115,25),rgba(6,55,115,25),#0091FF);
   
  }
 body{background-color: #0091FF; margin: 0%;padding: 0%;box-sizing: border-box;width: 100%;}
  
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
  a{ text-decoration: none;}
  .banner h2{
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
  #icon{color:#058eff;
        text-shadow: 0 0 3px black;}

  .container{width: 100%;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top:150px;
    position: relative;}
     
  .container .servicebx{
      padding:20px;
      margin-top: 40px;
      box-shadow: 0 4px 7px black;
      border: 3px solid #0091FF;
      border-radius: 40px;
      position: relative;
      background:linear-gradient(to bottom left,#0582e7,#022f53);
      width: 340px;
      height: 320px;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index:1 ;
      cursor: pointer;
      animation:scaling .5s;
     }
    @keyframes scaling {
       0% { scale: 0.3; }
      100%{ scale: 1;}
     }
      .container .servicebx img{max-width: 140px; margin-top:50px;margin-bottom: -30px;scale: 1;transition: .4s;}
      .container .servicebx :hover img {scale:1.4;transition-duration: .5s; }
      .container .servicebx h2{font-weight: 500;  font-size: 20px;letter-spacing: 1px;color:white;
      text-shadow:0 0 2px black;position: relative;padding: 0%;}
      footer{background-color: #0091FF;height: 30px;}

      @media(max-width:640px){
        
        .banner{padding: 60px;}
        .container .servicebx img{ height: 90px;}
        .banner h2 {font-size: 1.5em;}
        .container .servicebx h2{font-size: 1em;}
        .banner .container.servicebx {max-width:330px;min-width:300px;margin:auto;}
       header{padding: 20px 20px;}
      }
       
     
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="indexprofil.php?id=<?=$ID?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    </header>
     <h2>Choisissez la nature de votre objet <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
      <lord-icon
          src="https://cdn.lordicon.com/ngcezuqf.json"
          trigger="loop"
          colors="primary:#0091ff,secondary:#0091ff"
          style="width:90px;height:50px">
      </lord-icon></h2>

     <div class="container">
     
      <div class="servicebx">
        <a href="téléphones/telephone.php"><div>
          <img src="img/phone.PNG">
          <h2>Téléphone</h2>
        </div> </a> 
      </div>

  <div class="servicebx">
    <a href="tablettes/tablettes.php">    
  <div>
          <img src="img/tablette.PNG">
          <h2>Tablette</h2>
        </div>
    </a>
      </div>

      <div class="servicebx">
      <a href="laptop/laptop.php">   
        <div>
          <img src="img/Laptop_perspective_matte_s2.PNG">
          <h2>Laptop</h2>
        </div>
    </a>   
      </div>

      <div class="servicebx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
      <a href="appareil-photo/appareil-photo.php">   
        <div>
          <img src="img/Camera_perspective_matte_s2.PNG">
          <h2>Appareil-Photo</h2>
        </div>   
    </a>
      </div>

      <div class="servicebx"data-center-center="opacity:1;bottom:0;"data-0-bottom="opacity:0;bottom:-50px;">
      <a href="TV/TV.php">   
        <div>
          <img src="img/TV.PNG">
          <h2>TV</h2>
        </div>
    </a>
      </div>
      
      <div class="servicebx"data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-50px;">
      <a href="SmartWatch/SmartWatch.php">     
      <div>
          <img src="img/Smart_watch_perspective_matte_s.png">
          <h2>Smart watch</h2>
        </div>
    </a>
      </div>

      <div class="servicebx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
      <a href="CasqueVR/CasqueVR.php">  
      <div>
          <img src="img/VR.png">
          <h2>Casque VR</h2>
        </div>   
    </a>
      </div>

      <div class="servicebx"data-center-center="opacity:1;bottom:0;"data-0-bottom="opacity:0;bottom:-50px;">
      <a href="vélo/vélo.php"> 
      <div>
          <img src="img/velo.PNG">
          <h2>Vélo</h2>
        </div>
    </a> 
      </div>
      
      <div class="servicebx"data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-50px;">
      <a href="console/console.php">   
      <div>
          <img src="img/gamepad.PNG">
          <h2>Console</h2>
        </div>
    </a>
      </div>
      <div class="servicebx"data-center-center="opacity:1;left:0;"data-0-bottom="opacity:0;left:-50px;">
        <div>
        <a href="voiture/voiture.php"> 
          <img src="img/voiture.PNG">
          <h2>Voiture</h2>
        </div>   
    </a>
      </div>

      <div class="servicebx"data-center-center="opacity:1;bottom:0;"data-0-bottom="opacity:0;bottom:-50px;">
        <div>
        <a href="moto/moto.php"> 
          <img src="img/moto.PNG">
          <h2>Moto</h2>
        </div>
    </a>
      </div>
      
      <div class="servicebx"data-center-center="opacity:1;right:0;"data-0-bottom="opacity:0;right:-50px;">
      <a href="autreobjet/autreobjet.php"> 
      <div>
          <img src="img/plus-d'objets1.png">
          <h2> Autres</h2>
        </div>
    </a>
      </div>
    </div><script src="skrollr.js"></script>
<script type="text/javascript">
var s = skrollr.init();
</script>
</section>

</body>
</html>
<?php } 
?>