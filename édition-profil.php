<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if( isset($_SESSION['id'])){
    $ID=$_SESSION['id'];
    $requser=$pdo->prepare("SELECT * FROM membres WHERE id= ?");
	$requser->execute(array($ID));
    $userinfo=$requser->fetch();


if(isset($_POST['nvpseudo']) and !empty($_POST['nvpseudo'] ) and $_POST['nvpseudo'] != $userinfo['pseudo']){
    $nvpseudo=htmlspecialchars($_POST['nvpseudo']);
    $pseudolenth=strlen($nvpseudo);
	if($pseudolenth<= 30){
    $insererpseudo=$pdo->prepare("UPDATE  membres SET pseudo =? WHERE id= ?");
    $insererpseudo->execute(array($nvpseudo,$ID));
    header('Location:indexprofil.php?id='.$ID);}
    else{$erreur="pseudo trop long !";}
}

if(isset($_POST['nvmail']) and !empty($_POST['nvmail'] ) and $_POST['nvmail'] != $userinfo['mail']){
    $nvmail=htmlspecialchars($_POST['nvmail']);
    if(filter_var($nvmail,FILTER_VALIDATE_EMAIL)){
        $reqmail=$pdo->prepare("SELECT * FROM membres WHERE  mail=?");
			   $reqmail->execute(array($nvmail));
			  $mailexist= $reqmail->rowCount();
			  if($mailexist==0){
    $inserermail=$pdo->prepare("UPDATE  membres SET mail =? WHERE id= ?");
    $inserermail->execute(array($nvmail,$ID));
    header('Location:indexprofil.php?id='.$ID);}
    else {
        $erreur="mail existe déja !";}

    }
}
if(isset($_POST['nvmdp1']) and !empty($_POST['nvmdp1'] ) AND isset($_POST['nvmdp2']) and !empty($_POST['nvmdp2'] ) ){
$mdp1=sha1($_POST['nvmdp1']);
$mdp2=sha1($_POST['nvmdp2']);
if($mdp1 == $mdp2){

    $inserermdp=$pdo->prepare("UPDATE  membres SET motdepasse =? WHERE id= ?");
    $inserermdp->execute(array($mdp1,$ID));
    header('Location:indexprofil.php?id='.$ID);
}else {
    $erreur="vos deux mots de passe ne correspondent pas !";
}
}

if(isset($_POST['numtel']) and !empty($_POST['numtel'] ) and $_POST['numtel'] != $userinfo['num']){
    $nvnum=$_POST['numtel'];
   
    $reqnum=$pdo->prepare("SELECT * FROM membres WHERE  num=?");
    $reqnum->execute(array($nvnum));
   $numexist= $reqnum->rowCount();
   if($numexist==0){
    $inserernum=$pdo->prepare("UPDATE  membres SET num=? WHERE id= ?");
    $inserernum->execute(array($nvnum,$ID));
    header('Location:indexprofil.php?id='.$ID);}
    else {
        $erreur="numéro existe déja !";}
       
    
}
  
if(isset($_POST['nv-genre'])  and $_POST['nv-genre'] != $userinfo['genre']){
     $genre=$_POST['nv-genre'];
    $inserergenre=$pdo->prepare("UPDATE  membres SET genre =? WHERE id= ?");
    $inserergenre->execute(array($genre,$ID));
    header('Location:indexprofil.php?id='.$ID);
}
  
  ?>
    
<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>édition du profil</title>  
<style>
  
 
  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
  }

  .banner{
    position:relative;
    width: 100%;
    min-height: 100vh;
    padding:0 100px;
    display: flex; align-items: center;
    background:linear-gradient(to bottom ,rgba(6,55,115,25),rgba(6,55,115,25),#0091FF);
   
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
  button {
   height:40px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin-top:0px;
   margin-left:70px;
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
  
  .banner h2{
    position:absolute;
    top:-8px;
    left: 0;
    animation: blurFadeIn .6s;
    color: #fff;
    text-shadow: 0 0 8px black;
    font-size:2em;
    margin: 70px 60px;
    padding: 20px;
  }
  
#icon{color:#058eff;text-shadow: 0 0 3px black;}

form {margin-left:auto;margin-top:100px;margin-right:auto;width:50%;}
input {
  font-family: sans-serif;
}

.input-field {
  max-width: 380px;
  width: 100%;
  background:linear-gradient(to right,#022e5365,#0582e7);
  margin: 10px 0;
  height: 55px;
  border-radius: 55px;
  display: grid;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}

.input-field i {
  text-align: center;
  line-height: 55px;
  transition: 0.5s;
  font-size: 1.1rem;
}

.input-field input {
  background: none;
outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: #ffffff;
}

.input-field input::placeholder {
  color: #ffffffee;
  font-weight: 500;
}

.input-field .selection{
  color: rgba(255, 255, 255, 0.562);
  font-size: 1.1em;
  border: none;
  height:55px;
 background-color: transparent;
  border-radius: 30px;
  text-align: center;
  display:flex;
  flex-direction: column;
  position:relative;
  width:250px;

}

option{
  background-color:rgb(15, 125, 228);
  text-align: center;
}

.alerte p { color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black; animation:op .8s;}
@keyframes op{
  0%{
     opacity:0;
   }
   100%{
     opacity:1;
   }
 }

@keyframes flotter{
 0% {
        transform: translateY(0px);
      }
    50%{
        transform: translateY(-30px);
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
        transform: translateY(-90px)rotate(45deg);
      }
      100%{
        transform: translateY(0px);
      }
      
    }
    @keyframes flotter3{
 0% {
        transform: translateY(0px);
      }
    50%{
        transform: translateY(-90px)rotate(25deg);
      }
      100%{
        transform: translateY(0px);
      }
      
    }
</style>
       
</head>

<body>

  <section class="banner"id="top">
    <header>
    <header>
      <a href="indexprofil.php?id=<?=$ID?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
      <div class="alerte">
					
                    <?php if(isset($erreur)){
              echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
              }?>
        </div>
    </header>
<h2>édition du profil &emsp;<i id="icon" class="fa-solid fa-user-pen"></i></h2>
    <form method="post" action="">
       
            <div class="input-field">
              <i class="fas fa-user"id="icon"></i>
              <input type="text" placeholder="<?php echo $userinfo['pseudo'];?>" id="nvpseudo" name="nvpseudo" />
            </div>
           
            <div class="input-field">
              <i class="fas fa-envelope"id="icon"></i>
              <input type="email" placeholder="<?php echo $userinfo['mail'];?>" id="nvmail" name="nvmail"/>
            </div>
            <div class="input-field">
            <i class="fa-solid fa-phone"id="icon"></i>
              <input type="text" placeholder="<?php echo $userinfo['num'];?>" id="numtel" name="numtel"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"id="icon"></i>
              <input type="password" placeholder="Mot de passe " id="nvmdp1" name="nvmdp1" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"id="icon"></i>
              <input type="password" placeholder="Confirmation du mot de passe" id="nvmdp2" name="nvmdp2"/>
              </div>         
              <div class="input-field">
              <i class="fa-solid fa-venus-mars" id="icon"></i>
              <select class="selection" name="nv-genre" >
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
              </select>
              </div>         
            <br>
            <button type="submit" name="forminscription" id="inscription-btn"  > Mettre à jour</button>
               <?php if(isset($erreur1)){
	 echo '<p style="color:#fff;font-size:1.3em;font-weight:500;text-shadow:0 0 2px black;"><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur1."</p>";
}  

	?> 
          </form>      
          <div style="position:relative;right:220px;">
          <img src="img/<?php if ($userinfo['genre']=='Homme') {echo ('boy-user.png');} else {echo ('girl-user.png');}?>"height="450px;"style=" animation:flotter 6s ease-in-out infinite;z-index:1000;" />
        <img src="img/<?php if ($userinfo['genre']=='Homme') {echo ('mail-profil.png');} else {echo ('mail-profil2.png');}?>" height="180px" style="position:absolute;bottom:20px;right:-80px;z-index:1000;animation:flotter2 8s ease-in-out infinite;" />
        <img src="img/<?php if ($userinfo['genre']=='Homme') {echo ('phone1.png');} else {echo ('phone2.png');}?>" height="150px" style="position:absolute;bottom:20px;left:-20px;z-index:1000;animation:flotter3 7s ease-in-out infinite;" />
</div>  
      </section>
 


</body>
</html>
<?php         }      ?> 