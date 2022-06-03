<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_GET['emei'])AND $_GET['emei']>0){
	$getemei=$_GET['emei'];
	$reqtel=$pdo->prepare("SELECT * FROM telephone WHERE emei= ?");
	$reqtel->execute(array($getemei));
	$telinfo=$reqtel->fetch();
 if(isset($_SESSION['emei'])AND $telinfo['emei']==$_SESSION['emei']){
?>
 <!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <title>Objects Detector</title>  

 <style type="text/css">
     
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
    align-items: center;
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
  
  .imgbx img {
 animation:flotter 6s ease-in-out infinite;
  max-width: 100%;
  min-width: 380px;
}
 .input {
   text-align: center;
   background-color: #087cdbad;
  width: 450px;
  height: 60px;
  border: #0091FF 1px solid;
  border-radius: 20px;
}
input {
  
  text-align: center;
  width: 400px;
  height: 60px;
  background: none;
outline: none;
  border: none;
}
form{position:relative;justify-content: center;text-align: center;align-items: center;margin-left: auto;margin-right: auto;}

.btn{
  margin: 40px;
  width: 160px;
  border: none;
  border-radius: 20px;
 background:linear-gradient(to bottom,#0091FF,#022f53);
 color: #ddd;
 font-size: 16px;
 font-weight: 500;
}
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="detection.html" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
     
    </header>
      
       <h4> attention le téléphone qui vous interesse a était déja volé</h>
       <?php echo $telinfo['nom_appareil'];?>
       <?php echo $telinfo['num_s'];?>
       <?php echo $telinfo['couleur'];?>
      <img  src="déclarations/<?php echo $telinfo['photo'];?>" height ="100px"/>
   <form name="formaadd" method="post" class="formulaire" enctype="multipart/form-data">
 
 
        <input class="btn" type="submit" name="btn" value="rechercher"/>

</form>
</section>

     
</body>
</html>

<?php     }    }      ?> 