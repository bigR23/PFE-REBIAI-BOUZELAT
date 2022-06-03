<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_SESSION['nomadmin'])){
    $ad=$_SESSION['nomadmin'];
    
    $ID=intval($_GET['id']);
    $pseudo=$_GET['pseudo'];
    $genre=$_GET['genre'];
    $requser=$pdo->prepare("SELECT * FROM membres WHERE id=$ID");
    $requser->execute();
    $userinfo=$requser->fetch();
    $mail=$userinfo['mail'];

   /* selectionner les téléphonnes déclarés par le memme id */
   $reqtel=$pdo->prepare("SELECT * FROM telephone WHERE id=?");
   $reqtel->execute(array($ID));  
   $telinfo=$reqtel->fetchAll();    

   /* selectionner les tablettes déclarés par le memme id */
   $reqtab=$pdo->prepare("SELECT * FROM tablette WHERE id=?");
   $reqtab->execute(array($ID));  
   $tabinfo=$reqtab->fetchAll();    

   /* selectionner les laptops déclarés par le memme id */
   $reqlap=$pdo->prepare("SELECT * FROM laptop WHERE id=?");
   $reqlap->execute(array($ID));  
   $lapinfo=$reqlap->fetchAll();    

/* selectionner les appareils photo déclarés par le memme id */
$reqapp=$pdo->prepare("SELECT * FROM  appareil_photo WHERE id=?");
$reqapp->execute(array($ID));  
$appinfo=$reqapp->fetchAll();    

/* selectionner les tv déclarés par le memme id */
$reqtv=$pdo->prepare("SELECT * FROM  tv WHERE id=?");
$reqtv->execute(array($ID));  
$tvinfo=$reqtv->fetchAll();  

/* selectionner les smart watch déclarés par le memme id */
$reqsw=$pdo->prepare("SELECT * FROM smart_watch WHERE id=?");
$reqsw->execute(array($ID));  
$swinfo=$reqsw->fetchAll();  

/* selectionner les casques VR déclarés par le memme id */
$reqvr=$pdo->prepare("SELECT * FROM casque_vr WHERE id=?");
$reqvr->execute(array($ID));  
$vrinfo=$reqvr->fetchAll();  

/* selectionner les vélos déclarés par le memme id */
$reqvelo=$pdo->prepare("SELECT * FROM velo WHERE id=?");
$reqvelo->execute(array($ID));  
$veloinfo=$reqvelo->fetchAll();  

/* selectionner les consoles déclarés par le memme id */
$reqcons=$pdo->prepare("SELECT * FROM console WHERE id=?");
$reqcons->execute(array($ID));  
$consinfo=$reqcons->fetchAll();  

/* selectionner les voitures déclarés par le memme id */
$reqvoiture=$pdo->prepare("SELECT * FROM voiture WHERE id=?");
$reqvoiture->execute(array($ID));  
$voitureinfo=$reqvoiture->fetchAll();  

/* selectionner les motos déclarés par le memme id */
$reqmoto=$pdo->prepare("SELECT * FROM moto WHERE id=?");
$reqmoto->execute(array($ID));  
$motoinfo=$reqmoto->fetchAll();  

/* selectionner les autres objets déclarés par le memme id */
$reqobj=$pdo->prepare("SELECT * FROM objet WHERE id=?");
$reqobj->execute(array($ID));  
$objinfo=$reqobj->fetchAll();  

/* selectionner les documents coffrés par le memme id */
$reqdoc=$pdo->prepare("SELECT * FROM coffre WHERE id=?");
$reqdoc->execute(array($ID));  
$docinfo=$reqdoc->fetchAll();  

    if(isset($_POST['btnsup'])){
           /* supprimer le membre */
      $reqsup=$pdo->prepare("DELETE FROM membres WHERE id= ? ");
        $reqsup->execute(array($ID));
               if(isset( $reqsup)){
              
                 /* supprimer le justificatif et la photo de chaque téléphone*/
        foreach($telinfo as $telephone):
             $justtel ="justificatifs-tel/";
                $phototel ="téléphones-déclarés/";
                $justtel .=$telephone['justificatif'];
                $phototel .=$telephone['photo'];
                unlink($justtel)AND unlink($phototel);
               endforeach;
             /* supprimer chaque téléphone déclaré par l'id du membre suprimé*/
                 $reqsuptel=$pdo->prepare("DELETE FROM telephone WHERE id= ? ");
                 $reqsuptel->execute(array($ID));
              
        
                  
                 /* supprimer le justificatif et la photo de chaque tablette*/
        foreach($tabinfo as  $tablette):

          $justtab="justificatifs-tab/";
             $phototab ="tablettes-déclarés/";
             $justtab .=$tablette['justificatif'];
             $phototab .=$tablette['photo'];
             unlink($justtab)AND unlink($phototab);
            endforeach;
          /* supprimer chaque tablette déclaré par l'id du membre suprimé*/
              $reqsuptab=$pdo->prepare("DELETE FROM tablette WHERE id= ? ");
              $reqsuptab->execute(array($ID));

         

               /* supprimer le justificatif et la photo de chaque laptop */
        foreach($lapinfo as  $laptop):

          $justlap="justificatifs-lap/";
             $photolap ="laptops-déclarés/";
             $justlap .=$laptop['justificatif'];
             $photolap .=$laptop['photo'];
             unlink($justlap)AND unlink($photolap);
            endforeach;
          /* supprimer chaque laptop déclaré par l'id du membre suprimé*/
              $reqsuplap=$pdo->prepare("DELETE FROM laptop WHERE id= ? ");
              $reqsuplap->execute(array($ID));

            
            
              /* supprimer le justificatif et la photo de chaque appareil photo */
        foreach($appinfo as  $appareilphoto):

          $justapp ="justificatifs -appareil-photo/";
        $photoapp ="appareils-photo-déclarés/";
             $justapp .=$appareilphoto['justificatif'];
             $photoapp .=$appareilphoto['photo'];
             unlink($justapp)AND unlink($photoapp);
            endforeach;
          /* supprimer chaque appareil photo déclaré par l'id du membre suprimé*/
              $reqsupapp=$pdo->prepare("DELETE FROM appareil_photo WHERE id= ? ");
              $reqsupapp->execute(array($ID));

      
      
        /* supprimer le justificatif et la photo de chaque tv  */
        foreach($tvinfo as  $tv):

          $justtv ="justificatifs -TV/";
        $phototv ="TV-déclarés/";
             $justtv .=$tv['justificatif'];
             $phototv .=$tv['photo'];
             unlink($justtv)AND unlink($phototv);
            endforeach;
          /* supprimer chaque tv  déclaré par l'id du membre suprimé*/
              $reqsuptv=$pdo->prepare("DELETE FROM tv WHERE id= ? ");
              $reqsuptv->execute(array($ID));


      
          /* supprimer le justificatif et la photo de chaque smartwatch  */
        foreach($swinfo as  $smartwatch):

          $justsw ="justificatifs-SmartWatch/";
        $photosw ="SmartWatch-déclarés/";
             $justsw .=$smartwatch['justificatif'];
             $photosw .=$smartwatch['photo'];
             unlink($justsw)AND unlink($photosw);
            endforeach;
          /* supprimer chaque smartwatch  déclaré par l'id du membre suprimé*/
              $reqsupsw=$pdo->prepare("DELETE FROM smart_watch WHERE id= ? ");
              $reqsupsw->execute(array($ID));

          
      
            /* supprimer le justificatif et la photo de chaque casque vr  */
        foreach($vrinfo as  $vr):

          $justvr ="justificatifs-CasqueVR/";
        $photovr ="CasqueVR -déclarés/";
             $justvr .=$vr['justificatif'];
             $photovr .=$vr['photo'];
             unlink($justvr)AND unlink($photovr);
            endforeach;
        
          /* supprimer chaque casque vr déclaré par l'id du membre suprimé*/
              $reqsupvr=$pdo->prepare("DELETE FROM casque_vr WHERE id= ? ");
              $reqsupvr->execute(array($ID));
          
      
            /* supprimer le justificatif et la photo de chaque velo  */
        foreach($veloinfo as  $velo):

          $justvelo ="justificatifs-vélo/";
        $photovelo ="vélos-déclarés/";
             $justvelo .=$velo['justificatif'];
             $photovelo .=$velo['photo'];
             unlink($justvelo)AND unlink($photovelo);
            endforeach;
          /* supprimer chaque velo déclaré par l'id du membre suprimé*/
              $reqsupvelo=$pdo->prepare("DELETE FROM velo WHERE id= ? ");
              $reqsupvelo->execute(array($ID));
          
      
            /* supprimer le justificatif et la photo de chaque console  */
            foreach($consinfo as  $console):

              $justcons ="justificatifs-console/";
            $photocons ="consoles-déclarés/";
                 $justcons .=$console['justificatif'];
                 $photocons .=$console['photo'];
                 unlink($justcons)AND unlink($photocons);
                endforeach;
              /* supprimer chaque console déclaré par l'id du membre suprimé*/
                  $reqsupcons=$pdo->prepare("DELETE FROM console WHERE id= ? ");
                  $reqsupcons->execute(array($ID));
              
      
            /* supprimer le justificatif et la photo de chaque voiture  */
            foreach($voitureinfo as $voiture):

              $justvoiture ="justificatifs-voiture/";
            $photovoiture ="voitures-déclarés/";
                 $justvoiture .=$voiture['justificatif'];
                 $photovoiture .=$voiture['photo'];
                 unlink($justvoiture)AND unlink($photovoiture);
                endforeach;
              /* supprimer chaque voiture déclaré par l'id du membre suprimé*/
                  $reqsupvoiture=$pdo->prepare("DELETE FROM voiture WHERE id= ? ");
                  $reqsupvoiture->execute(array($ID));
    
        
            /* supprimer le justificatif et la photo de chaque moto  */
            foreach($motoinfo as $moto):

              $justmoto ="justificatifs-moto/";
            $photomoto ="motos-déclarés/";
                 $justmoto .=$moto['justificatif'];
                 $photomoto .=$moto['photo'];
                 unlink($justmoto)AND unlink($photomoto);
                endforeach;
              /* supprimer chaque moto déclaré par l'id du membre suprimé*/
                  $reqsupmoto=$pdo->prepare("DELETE FROM moto WHERE id= ? ");
                  $reqsupmoto->execute(array($ID));
    
           
           
       /* supprimer le justificatif et la photo de chaque objet  */
           
          foreach($objinfo as $objet):

              $justobj ="justificatifs-autre/";
            $photobj ="autreobjets-déclarés/";
                 $justobj .=$objet['justificatif'];
                 $photobj .=$objet['photo'];
                 unlink($justobj)AND unlink($photobj);
                endforeach;
              /* supprimer chaque objet déclaré par l'id du membre suprimé*/
                  $reqsupobj=$pdo->prepare("DELETE FROM objet WHERE id= ? ");
                  $reqsupobj->execute(array($ID));


       /* supprimer le justificatif et la photo de chaque moto  */
           
          foreach($docinfo as $document):

           
            $filename ="coffre/";
            $filename .= $document['fichier'];
               unlink($filename);
              endforeach;
            /* supprimer chaque objet déclaré par l'id du membre suprimé*/
                $reqsupdoc=$pdo->prepare("DELETE FROM coffre WHERE id= ? ");
                $reqsupdoc->execute(array($ID));

$header="MIME-Version: 1.0\r\n";
$header.='From:"ObjectsDetector.com"<support@objectsdetector.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
$motif=$_POST['motif'];
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
			<p style="font-size:1.2em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;"> Votre compte a était <strong style="color:red">supprimé</strong> pour le motif suivant :</p>
		<p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$motif.'</p>
<br />
		</div>
	</body>
</html>
';


mail($mail, "Alerte !", $message, $header);
   
   header("Location:admin-membres.php?msg=membre-supprimé&nomadmin=".$ad);
   }
  }

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
   height:45px;width: 200px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin:60px;
   left:130px;
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
   
.content{
   text-align:center;
   margin-top:160px;
    margin-left:auto;
    margin-right:auto;
}
.content img {transition:.5s;}
img:hover {
    scale:1.2;
    transition:.5s;
   
}
form{height:45px;width: 230px;position:relative;right:30px;}
p{margin:20px;
 font-weight: 700;
  font-size:1.3em;
  color:#fff;
  text-shadow:0 0 4px black;
  text-decoration:none;}
#motif{
    margin-left:auto;
    margin-right:auto;
    text-align:center;
     background:linear-gradient(to bottom left,#0582e7,#022f53);
  border: #0091FF solid 2px ;
  border-radius: 60px;
 
      outline: none;
      padding: 10px 0;
      font-size: 18px;
      font-weight: 300;
      color: #fff;
      border-radius:30px;
}
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="admin-membres.php?nomadmin=<?=$ad?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    </header>

    <h2> supprimer un compte &emsp;<i id ="icon"class="fa-solid fa-clipboard-list"></i></h2>

     <div class="content">
       <p>voulez vous vraiment supprimer ce compte :    <?php echo $pseudo ?> ? </p>
       <form method="POST" action="">
<textarea name="motif" id="motif" cols="70" rows="8" placeholder="pourquoi voulez vous le supprimmer "></textarea>
<button type="submit"name="btnsup">Supprimer</button></form> 
	
</form>
      



</div>

     </section>

</body>
</html>
<?php } 
?>