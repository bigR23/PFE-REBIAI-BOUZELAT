<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_SESSION['nomadmin'])){
    $ad=$_SESSION['nomadmin'];
 /* selectionner les vr déclarés sans confirmation */
 $reqvr=$pdo->prepare("SELECT * FROM casque_vr WHERE confirmation=''");
 $reqvr->execute();
 $vrinfo=$reqvr->fetchAll();
 $decexiste=$reqvr->rowCount();
 if( $decexiste==0){
  $erreur="il ne y'a pas de déclarations à traiter pour l'instant";}
  
?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Admin</title>  

 <style type="text/css">
     
     button { animation: ba .5s;
   height:45px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin-top: 60px;
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
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
  
  .container{width: 100%;display: flex;justify-content: space-between;flex-wrap: wrap;margin-top:150px;position: relative;}
    
     @keyframes ba {
       0% { scale: 0.3; opacity: 0;}
      100%{ scale: 1;opacity: 1;}
     }
   
.alerte p { color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black;opacity:0; animation:op 3s;}
p{ color:#fff;font-size:1.4em;font-weight:200;text-shadow:0 0 3px black;}
@keyframes op{
  0%{
     opacity:0;
   }
   50%{
     opacity:1;
   }
   100%{
     opacity:0;
   }
 }
.liste{
  margin-top:140px;
  margin-left:20px;
  margin-bottom:20px;
}
li { 
 
  margin:8px;
  list-style:none;
  cursor:pointer;
}
li i{font-size:.9em;}
a{ font-weight: 700;
  font-size:1.3em;
  color:#fff;
  text-shadow:0 0 4px black;
  text-decoration:none;}
.content{position:relative;
  width: 100%;
  display: flex;
  justify-content: space-between;
  transition: .5s;
}
.icon-list{
  transition:.5s;
}
.icon-list:hover {
  scale:1.7;
  transition: .5s;
}
.coffre{display:flex; align-items: center;}


.coffre .img2{position:absolute; margin-top:140px;top:50px;right:110px;height:350px;z-index:2; animation:flotter1 6s ease-in-out infinite;}
.coffre .img3{position:absolute; margin-top:140px;top:19px;right:175px;height:350px;z-index:1; animation:flotter2 6s ease-in-out infinite;}

@keyframes flotter1{
 0% {
        transform: translateY(0px);
      }
    50%{
        transform: translateY(-40px);
      }
      100%{
        transform: translateY(0px);
      }
    }
    @keyframes flotter2{
 0% {
        transform: translateY(0px);
      }
    50%{
        transform: translateY(40px);
      }
      100%{
        transform: translateY(0px);
      }
    }
     hr {
       box-shadow:0 0 1px black;
       background:#058eff;
      height: 3px;
      color:#058eff;
    }

</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="administration.php?nomadmin=<?=$ad?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    <div class="alerte">
					
          <?php 
          if(isset($_GET['msg'])){
  echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '."La décalaration a était supprimée !"."</p>";
          }else if(isset($_GET['msg2'])){
            echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '."La décalaration a était validée !"."</p>";
                    } ?>
          </div> </header>
   
     <h2> liste des déclarations de casques VR &emsp;<i id ="icon"class="fa-solid fa-clipboard-list"></i></h2>
    <div class="content">
   
     <div class="liste"> 
    <ul>
    <?php if (isset($erreur)){echo '<p>'.$erreur.'</p>';}?> 
    <!-- afficher les VR  déclarés -->
<?php 
     foreach(  $vrinfo as $vr):
     ?>
     <li>
     <a>ID=<?= $vr['id'];?>) </a><a href="CasqueVR -déclarés/<?= $vr['photo'];?>"><?=$vr['nom_appareil'];?> :</a> <a href="justificatifs-CasqueVR/<?= $vr['justificatif'];?>">Justificatif</a>
     <a href="supprimer-déclaration-vr.php?table=casque_vr&id=<?php echo $vr['id'];?>&nums=<?php echo $vr['num_s'];?>&just=<?= $vr['justificatif'];?>&photo=<?= $vr['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/no.png" height="45px"style="position:relative;top:17px;"></a>
   &emsp;&emsp;  <a href="validation-vr.php?table=casque_vr&id=<?php echo $vr['id'];?>&nums=<?php echo $vr['num_s'];?>"><img class="icon-list"src="img/yes.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>

     </div>   

   <div class="coffre">
  <img src="img/file-text-iso-color1.png"class="img2">
  <img src="img/file-text-iso-color1.png"class="img3">
  </div>
     </div>
  </section>

</body>
</html>
<?php   }?>