<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
$number=$_GET['num'];
if(isset($_GET['emei'])){
	$getemei=$_GET['emei'];
	$req=$pdo->prepare("SELECT * FROM tablette WHERE emei= ?");
	$req->execute(array($getemei));
	$info=$req->fetch();
 if(isset($_SESSION['emei'])AND $info['emei']==$_SESSION['emei']){
  $ID=$info['id'];
	$reqprop=$pdo->prepare("SELECT * FROM membres WHERE id= $ID");
  $reqprop->execute(array($getemei));
	$propinfo=$reqprop->fetch();
  $num=$propinfo['num'];
  $genre=$propinfo['genre'];
  $nom=$propinfo['pseudo'];
?>
 <!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Alerte</title>  

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
    flex-direction: column; 
    align-items: center;
    background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
    animation: signal .6s ;
   
  }

  @keyframes signal{

    0%{background:red;}
    30%{  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);}
    60%{background:red;}
    100%{  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);}
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
    animation: blurFadeIn .6s;
  }
  @keyframes blurFadeIn {
	0% {
		opacity: 0;
		transform: scale(1.6);
	}

	100% {
		opacity: 1;
		transform: scale(1);
	}
}
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
  
 .container{
     display: block;
     text-align: center;
     align-items: center;
  justify-content: center;
  margin-right:auto ;
margin-left: auto;
 }

 .no{
  position: relative;
  margin-left:auto;
  margin-right:auto;
  margin-top:150px;

 }

 .no img{

   animation:flotter 6s ease-in-out infinite , scaling .7s;
   cursor:pointer;
   transition: .5s;
 }
 .no img:hover{
 scale:1.1;
 transition: .5s;
 }
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

 @keyframes scaling{
  0%{
     scale:.5;
   }
   100%{
     scale:1;
   }
 }

 .container .form{
   height:690px;
   width:500px;
  background:white;
  position:relative;
  margin-top:150px;
  margin-bottom:20px;
  padding:10px;
  border-radius:40px;
  background:linear-gradient(to bottom left,#0582e7,#022f53);
  border: #0091FF 3px solid;
  box-shadow: 0 0 7px black;
 display:none;
 animation:op 1.2s;
 }
 .container .alerte{
text-align:center;
  height:170px;
   width:500px;
  position:relative;
  margin-top:30px;
  margin-bottom:20px;
  padding:10px;
  border-radius:40px;
  background:linear-gradient(to bottom left,#0582e7,#022f53);
  border: #0091FF 3px solid;
  box-shadow: 0 0 7px black;
 display:none;
 animation:scaling 2s ease-in-out infinite;
 }
 @keyframes scaling{
  0%{
     scale:1;
   }
   50%{
     scale:1.1;
   }
   100%{
     scale:1;
   }
 }
 .container .alerte p{ margin:10px;
  color: #fff;text-shadow: 0 0 3px black;
  font-size:1.2em;
 font-weight: 400;
 }
 @keyframes op{
  0%{
     opacity:0;
   }
   100%{
     opacity:1;
   }
 }

 .form img{
   box-shadow:0 0 4px black;
 }
 .info  {
   margin-top:20px;
  color:#fff ;
 font-size:1.2em;
 font-weight: 600;
 text-shadow:  0 0 4px black;
 opacity:0;
 transition:.5s;
 }
 li{list-style: none;
 color:#fff ;
 font-size:1.3em;
 font-weight: 600;
 margin:25px; text-shadow:  0 0 4px black;

 }
li p {
  margin:10px;
  color: #fff;text-shadow: 0 0 3px black;
  text-decoration: underline ;
  text-decoration-color:#058eff;
 
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
      
  <section class="banner">
    <header>
      <a href="detection-tablette.php?num=<?=$number?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
   
    </header>  
     <h2>attention la tablette qui vous interesse a était déja volé  <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/rslnizbt.json"
    trigger="loop"
    colors="primary:#0091ff"
    style="width:50px;height:50px">
</lord-icon> </h2>
    <div class="no">
  <a href="#alerte"><img src="img/no.png" height="340px" onclick="Show();"onmouseenter="Show1();" onmouseleave="Hide();"></a>
</div>
<div class="info" id="info">
<p> CLique sur l'icone pour savoir plus </p>
  </div>
<div class="container">

    <div class="form" id="form">
      
       <li><p> marque</p> <?php echo $info['marque'];?></li>
  <img  src="tablettes-déclarés/<?php echo $info['photo'];?>" height="280px" width="330px">
    <ul>
        <li> <p>nom: </p><?php echo $info['nom_appareil'];?> </li>
        <li> <p>numero de serie:</p> <?php echo $info['num_s'];?></li>
        <li> <p>couleur:</p><?php echo $info['couleur'];?> </li>
       
    </ul>
</div>

<div class="alerte"id="alerte"><p> Bonjour Monsieur/Madame<br> Vous avez détécter un objet volé donc s'il vous plait n'hésitez pas a informer son propriétaire<p>
      <p><lord-icon
    src="https://cdn.lordicon.com/cnyeuzxc.json"
    trigger="loop"
    colors="primary:#0091ff"
    style="width:50px;height:50px">
</lord-icon>&emsp; <?php if($genre=="Homme") {echo ('Mr.'); }else {echo ('Mme.');}?> <?php echo $nom ;?> : <?php echo $num;?></p> 
</div>

       </div>



</section>
<script type="text/javascript">
  function Show(){ 
    document.getElementById("form").style.display="block";
    document.getElementById("alerte").style.display="block";
  }

function Show1(){
  document.getElementById("info").style.opacity="1";
}
function Hide(){
  document.getElementById("info").style.opacity="0";
}
  </script>
     
</body>
</html>

<?php     }    }      ?> 