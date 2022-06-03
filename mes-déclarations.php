<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
 if( isset($_SESSION['id'])){
 	$ID=$_SESSION['id'];

  /* selectionner les téléphones déclarés */
  $reqtel=$pdo->prepare("SELECT * FROM telephone WHERE id= $ID");
	$reqtel->execute();
  $telinfo=$reqtel->fetchAll();
 /* selectionner les tablette déclarés */
  $reqtab=$pdo->prepare("SELECT * FROM tablette WHERE id= $ID");
	$reqtab->execute();
  $tabinfo=$reqtab->fetchAll();
   /* selectionner les laptop déclarés */
   $reqlap=$pdo->prepare("SELECT * FROM laptop WHERE id= $ID");
   $reqlap->execute();
   $lapinfo=$reqlap->fetchAll();
     /* selectionner les appareils-photo déclarés */
     $reqapp=$pdo->prepare("SELECT * FROM appareil_photo WHERE id= $ID");
     $reqapp->execute();
     $appinfo=$reqapp->fetchAll();
     /* selectionner les TV déclarés */
     $reqtv=$pdo->prepare("SELECT * FROM tv WHERE id= $ID");
     $reqtv->execute();
     $tvinfo=$reqtv->fetchAll();    
 /* selectionner les smartwatch déclarés */
 $reqsw=$pdo->prepare("SELECT * FROM smart_watch WHERE id= $ID");
 $reqsw->execute();
 $swinfo=$reqsw->fetchAll();
  /* selectionner les vr déclarés */
  $reqvr=$pdo->prepare("SELECT * FROM casque_vr WHERE id= $ID");
  $reqvr->execute();
  $vrinfo=$reqvr->fetchAll();
  /* selectionner les vélos déclarés */
  $reqvé=$pdo->prepare("SELECT * FROM velo WHERE id= $ID");
  $reqvé->execute();
  $véinfo=$reqvé->fetchAll();
    /* selectionner les consoles déclarés */
    $reqc=$pdo->prepare("SELECT * FROM console WHERE id= $ID");
    $reqc->execute();
    $coinfo=$reqc->fetchAll();
      /* selectionner les voitures déclarés */
      $reqvoiture=$pdo->prepare("SELECT * FROM voiture WHERE id= $ID");
      $reqvoiture->execute();
      $voitureinfo=$reqvoiture->fetchAll();
        /* selectionner les Motos déclarés */
        $reqm=$pdo->prepare("SELECT * FROM moto WHERE id= $ID");
        $reqm->execute();
        $motoinfo=$reqm->fetchAll();
   /* selectionner les autres objets déclarés */
        $reqobjet=$pdo->prepare("SELECT * FROM objet WHERE id= $ID");
        $reqobjet->execute();
        $objetinfo=$reqobjet->fetchAll();
?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Mes déclarations</title>  

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
      <a href="indexprofil.php?id=<?=$ID?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    <div class="alerte">
					
          <?php 
          if(isset($_GET['msg'])){
  echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '."votre décalaration a était supprimée !"."</p>";
          } else if(isset($_GET['msg2'])){
            echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '."votre décalaration a était modifiée !"."</p>";
                    }?>
          </div> </header>
   
     <h2> liste des déclarations que vous avez fait &emsp;<i id ="icon"class="fa-solid fa-clipboard-list"></i></h2>
    <div class="content">
   
     <div class="liste"> 
    <ul>
    <p> <?php 
          if(isset($message)){
  echo $message;
          }?>
    </p>      
    <!-- afficher les téléphones déclarés -->
    <?php 
     foreach( $telinfo as $telephone):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="téléphones-déclarés/<?= $telephone['photo'];?>"><?=$telephone['nom_appareil'];?> :</a> <a href="justificatifs-tel/<?= $telephone['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-telephone.php?imei=<?php echo $telephone['emei'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=telephone&imei=<?php echo $telephone['emei'];?>&just=<?= $telephone['justificatif'];?>&photo=<?= $telephone['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>
      <hr>
<?php endforeach  ?>
  <!-- afficher les tablettes déclarés -->
<?php 
     foreach( $tabinfo as $tablette):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="tablettes-déclarés/<?= $tablette['photo'];?>"><?=$tablette['nom_appareil'];?> :</a> <a href="justificatifs-tab/<?= $tablette['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-tablette.php?imei=<?php echo $tablette['emei'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=tablette&imei=<?php echo $tablette['emei'];?>&just=<?= $tablette['justificatif'];?>&photo=<?= $tablette['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br> <hr>
<?php endforeach  ?>
  <!-- afficher les laptop déclarés -->
  <?php 
     foreach( $lapinfo as $laptop):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="laptops-déclarés/<?= $laptop['photo'];?>"><?=$laptop['nom_appareil'];?> :</a> <a href="justificatifs-lap/<?= $laptop['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-laptop.php?nums=<?php echo $laptop['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=laptop&nums=<?php echo $laptop['num_s'];?>&just=<?= $laptop['justificatif'];?>&photo=<?= $laptop['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les appareils photo déclarés -->
<?php 
     foreach( $appinfo as $appareilphoto):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="appareils-photo-déclarés/<?= $appareilphoto['photo'];?>"><?=$appareilphoto['nom_appareil'];?> :</a> <a href="justificatifs -appareil-photo/<?= $appareilphoto['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-appareil-photo.php?nums=<?php echo $appareilphoto['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=appareil_photo&nums=<?php echo $appareilphoto['num_s'];?>&just=<?= $appareilphoto['justificatif'];?>&photo=<?= $appareilphoto['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les Tv déclarés -->
<?php 
     foreach( $tvinfo as $tv):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="TV-déclarés/<?= $tv['photo'];?>">TV <?=$tv['marque'];?> :</a> <a href="justificatifs -TV/<?= $tv['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-tv.php?nums=<?php echo $tv['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=tv&nums=<?php echo $tv['num_s'];?>&just=<?= $tv['justificatif'];?>&photo=<?= $tv['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les smart watch déclarés -->
<?php 
     foreach(  $swinfo as $sw):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="SmartWatch-déclarés/<?= $sw['photo'];?>"><?=$sw['nom_appareil'];?> :</a> <a href="justificatifs-SmartWatch/<?= $sw['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-smartwatch.php?imei=<?php echo $sw['imei'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=smart_watch&imei=<?php echo $sw['imei'];?>&just=<?= $sw['justificatif'];?>&photo=<?= $sw['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les VR  déclarés -->
<?php 
     foreach(  $vrinfo as $vr):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="CasqueVR -déclarés/<?= $vr['photo'];?>"><?=$vr['nom_appareil'];?> :</a> <a href="justificatifs-CasqueVR/<?= $vr['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-casqueVR.php?nums=<?php echo $vr['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=casque_vr&nums=<?php echo $vr['num_s'];?>&just=<?= $vr['justificatif'];?>&photo=<?= $vr['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les vélos déclarés -->
<?php 
     foreach(   $véinfo as $velo):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="vélos-déclarés/<?= $velo['photo'];?>">Vélo <?=$velo['marque'];?> :</a> <a href="justificatifs-vélo/<?= $velo['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-vélo.php?nums=<?php echo $velo['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=velo&nums=<?php echo $velo['num_s'];?>&just=<?= $velo['justificatif'];?>&photo=<?= $velo['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les consoles déclarés -->
<?php 
     foreach(  $coinfo as $console):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="consoles-déclarés/<?= $console['photo'];?>"><?=$console['nom_appareil'];?> :</a> <a href="justificatifs-console/<?= $console['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-console.php?nums=<?php echo $console['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=console&nums=<?php echo $console['num_s'];?>&just=<?= $console['justificatif'];?>&photo=<?= $console['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les voitures déclarés -->
<?php 
     foreach( $voitureinfo as $voiture):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="voitures-déclarés/<?= $voiture['photo'];?>"><?=$voiture['nom_voiture'];?> :</a> <a href="justificatifs-voiture/<?= $voiture['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-voiture.php?numchassis=<?php echo $voiture['num_chassis'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=voiture&numchassis=<?php echo $voiture['num_chassis'];?>&just=<?= $voiture['justificatif'];?>&photo=<?= $voiture['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les motos déclarés -->
<?php 
     foreach( $motoinfo as $moto):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="motos-déclarés/<?= $moto['photo'];?>"><?=$moto['nom_moto'];?> :</a> <a href="justificatifs-moto/<?= $moto['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-moto.php?numchassis=<?php echo $moto['num_chassis'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=moto&numchassis=<?php echo $moto['num_chassis'];?>&just=<?= $moto['justificatif'];?>&photo=<?= $moto['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
<!-- afficher les autres objets déclarés -->
<?php 
     foreach( $objetinfo as $objet):
     ?>
     <li>
       <img src="img/f.png" style="position:relative;top:12px;"><a href="autreobjets-déclarés/<?= $objet['photo'];?>"><?=$objet['nature'];?> :</a> <a href="justificatifs-autre/<?= $objet['justificatif'];?>">Justificatif</a>
       <a href="édition/édition-objet.php?nums=<?php echo $objet['num_s'];?>"> &emsp;&emsp;<img class="icon-list"src="img/pencil1.png" height="45px"style="position:relative;top:17px;"></a>
  <a  href="supprimer-déclaration.php?table=objet&nums=<?php echo $objet['num_s'];?>&just=<?= $objet['justificatif'];?>&photo=<?= $objet['photo'];?>"> &emsp;&emsp;<img class="icon-list"src="img/trash.png" height="40px"style="position:relative;top:14px;"></a>
      </li><br>   <hr>
<?php endforeach  ?>
</ul>
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