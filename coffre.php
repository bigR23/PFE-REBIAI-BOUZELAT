<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
 if( isset($_SESSION['id'])){
	$ID=$_SESSION['id'];
      
	 if(isset($_POST['btnadd']))
     {   $nom=$_POST['nom'];
       $doc=$_FILES['doc']['name'];
       $target_file= basename($_FILES["doc"]["name"]);
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(!empty($_POST['nom']))
  {	
    if($_FILES['doc']['size'] > 0 ) {
        if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"  && $FileType != "pdf"){
          $erreur= "le format de fichiers doit être en: pdf,JPG, JPEG, PNG  ";
          
        }else{

  $req= $pdo->prepare("INSERT INTO coffre (id,nom,fichier) VALUES (?,?,?)");
	$req->execute(array($ID,$nom,$_FILES['doc']['name']));
	if($req){
move_uploaded_file($_FILES["doc"]["tmp_name"],"coffre/$doc");
$erreur2="votre document a été coffré !";
        }}

    }else{
        $erreur="entrez votre document !";
    }    
    
}else{
        $erreur="entrez un nom pour votre document svp !";
    }    
}
?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Coffre virtuel</title>  

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
     form {
     
  position: relative;
  width: 40%;
 margin:auto;
  text-align: center;
  height:460px;
  margin-left:auto;
  margin-right:auto;
  margin-top:170px;
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
 margin-bottom:90px;
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

    form .inputbx textarea::placeholder{color: #fff;}
     [type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;display: none;
}

[type="file"] + label {
   display:flex;
margin-top:-20px;
margin-left:auto;
margin-right:auto;
text-align: center;
justify-content: center;
 background:linear-gradient(to bottom left,#0582e7,#022f53);
  border:none ;
  border-radius: 40px ;
  color: #fff;
  cursor: pointer;
  font-family: 'Rubik', sans-serif;
  font-size: 13px;
  width: 280px;
  height: 90px;

  }
  
  [type="file"] + label:hover {
   background:#0b6fc0;
  }
  [type="file"] + label:hover .ic { transition: .6s;
   position: relative;left:35px;top: 13px;
  color: #31c1ef;opacity: 1;text-shadow: 0 0 5px rgb(0, 0, 0);
  }
  [type="file"] + label:hover .c { transition: .4s;
   position: relative;
   top:19px;
  opacity: 0;
  }

.c{right: 75px; 
    position: relative;
    transition: .4s;
    padding-top: 30px;
    opacity: 1; 
    font-size: 1.3em;
    font-weight: 700;
    text-shadow: 0 0 3px black;
    }
p {text-align: center; font-size: 1.2em;
    font-weight: 400;
    text-shadow: 0 0 3px black;color: #fff;}


[type="file"] + label .ic {position: relative;left:36px;top:0px;transition: 0.2s;
  color:#058eff;text-shadow: 0 0 3px black;opacity: 0;
  
}
.alerte p { color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black; animation:op .8s;}
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="indexprofil.php?id=<?=$ID?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
      <div class="alerte">
					
                    <?php if(isset($erreur)){
              echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
              }else
              if(isset($erreur2)){echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '.$erreur2."</p>";}
              ?>
                    </div>  
    </header>
     <h2>télécharger le document que vous voulez coffrer &emsp;<i id ="icon" class="fa-solid fa-file-import"></i></h2>
     <form name="formaadd" method="post" action="" enctype="multipart/form-data">
     <div class="inputbx">
      <input type="text" name="nom" id="nom" placeholder="nommez votre document svp !">
    </div>
     <input type="file" name="doc" id="file-input" />
             <label for="file-input"><img src="img/coffrec.png" height="60px" class="ic"><span class="c"> Clique ici !</span></label><br>
      <p> document téléchargée: <span id="name">aucun</span></p> 
            <script>
            
              let inputFile = document.getElementById('file-input'); 
              let fileNameField = document.getElementById('name'); 
              inputFile.addEventListener('change', function(event){
                let uploadFileName=event.target.files[0].name;
                fileNameField .textContent=uploadFileName;
              });
            </script>
            <br>
            <button name="btnadd"  type ="submit"> OK </button>
            </form>
</section>

</body>
</html>
<?php } ?>