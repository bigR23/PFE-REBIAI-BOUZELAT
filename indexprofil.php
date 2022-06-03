<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_GET['id'])AND $_GET['id']>0){
	$getid=intval($_GET['id']);
	$requser=$pdo->prepare("SELECT * FROM membres WHERE id= ?");
	$requser->execute(array($getid));
	$userinfo=$requser->fetch();
 if(isset($_SESSION['id'])AND $userinfo['id']==$_SESSION['id']){
?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Profil</title>  
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
  .banner:before{
  
    content: '';
    position: absolute;
    top:50px;
    left:300px;
    width: 370px;
    height: 320px;
    background:linear-gradient(to top left,rgba(6,55,115,25),#0091FF,rgba(6,55,115,25));
    opacity: .9;
    z-index: 1;
    transition: .8s;
    border: none;
    border-radius: 20% 100%;
  }
  .banner.active:before{
    position:fixed;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
    border: none;
    border-radius: 0%;
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
    padding: 20px 50px;
  }
  button {
   height:40px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin-top:30px;
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
  header .re{
    font-size:1.5em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }
  header .re:hover #icon{ transition: .4s;
    color: rgb(240, 27, 27);
  }
  @keyframes blurFadeIn {
	0% {
		opacity: 0;
		transform: scale(1.8);
	}

	100% {
		opacity: 1;
		transform: scale(1);
	}
}
  .banner.active .re{
    transform: scale(0);
    transform-origin:left;
  }
 .toggle{position:relative;height: 30px;width: 30px;
                    background: url("img/toggle.png");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: 30px;
                    cursor: pointer;

  }
  .toggle.active{background: url("img/close.png");background-repeat: no-repeat;background-position: center;
                    background-size: 25px;cursor: pointer;
}
.content{position:relative;z-index: 2;width: 100%;display: flex;justify-content: space-between;align-items: center;
transition: .5s;transform-origin: right;}

.banner.active .content{
    transform: scale(0);
    transform-origin:left;
  }

.content .contentbx{
  justify-content: center;align-items: center;display: flex;text-align: center;width: 100%;position: relative;

}
.contentbx h2{text-transform: uppercase;color: #fff;line-height: 1em;font-size:3em;text-shadow:0 0 8px #151415;   animation: blurFadeIn .6s;}
.contentbx h3{text-transform: uppercase;color: #fff;line-height: 1em;font-size:2.5em;text-shadow:0 0 8px #151415;}
.contentbx h4{text-transform: uppercase;color: #fff;line-height: 1em;font-size:1.4em;text-shadow:0 0 8px #151415; padding:10px;}
.contentbx p {font-size:19px;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #151415;}
.contentbx a {color: #fff; text-decoration: none; font-size: 20px;}
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
 .dec img,.det img {
 animation:flotter 6s ease-in-out infinite;
 height:230px;
 transition:.5s;
}
.dec img:hover,.det img:hover {
  cursor:pointer;
scale:1.3;transition:.5s;
}
.menu{position: fixed;top: 0;left: 0;width: 100%;height: 100%;display: flex;justify-content: center;align-items: center;
flex-direction: column;z-index: 2;visibility: hidden;opacity: 0;transition: .3s;transition-delay:0s;}

.banner.active .menu{visibility:visible;opacity:1;transition-delay:.4s;}
.menu li{list-style:none; padding:12px;}
.menu li a{color: #fff;text-decoration: none;font-size: 25px; font-family: sans-serif;}
.menu li :hover {opacity: 0.4;}

#icon{color:#058eff;text-shadow: 0 0 3px black;}

.dec{
  width: 40%;
  padding: 40px;
  margin: 40px;
  background:transparent;
}

.det{
  width: 40%;
  padding: 40px;
  margin: 40px;
  background:transparent;
}


.dec p,.det p{font-size:19px;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;}




      
@media(max-width:991px){
  header{padding: 20px 30px;}
  .banner{padding:40px;overflow: hidden;}
  .banner a {font-size:28px;}
  .banner:before{top: 150px;left: 40px;width: 170px;height: 310px;}
  .content{
     flex-direction: column;
    margin: 50px 0;}
    .content .contentbx{flex-direction: column;
     max-width:100%;
    text-align: center;}
    .dec,.det{width: 90%;}
}
</style>
       
</head>

<body>

  <section class="banner"id="top">
    <header>
      <a href="deconnexion.php" class="re"><button style="width:200px; background:#0582e7;   margin-top:0px;"><i class="fa-solid fa-door-open" id="icon" ></i> Déconnexion</button></a>
      <a class="re" style="top:-20px"><img src="img/<?php if ($userinfo['genre']=='Homme') {echo ('boy.png');} else {echo ('girl.png');}?>" height="65px" style="position:relative;top:20px;"><?php echo $userinfo['pseudo'];?></a>
      <a class="re" style="top:-20px"><img src="img/<?php if ($userinfo['genre']=='Homme') {echo ('mail-profil.png');} else {echo ('mail-profil2.png');}?>" height="60px" style="position:relative;top:20px;"><?php echo $userinfo['mail'];?></a>
      <div class="toggle" onclick="toggle();"></div>
    </header>
    <div class="content">
      <div class="contentbx">
        
      <div class="dec">
      <br>
      <a href="declaration.php"><img src="img/big4.png" /></a>
      <br>
    
     <a href="declaration.php"><button>Déclarer un objet</button></a> 
    </div>


    <div class="det">
      <br>
     <a href="coffre.php"> <img src="img/coffre.png" /></a>
      <br>
    
      <a href="coffre.php"> <button>Coffrer un document</button></a>
    </div>

</div> </div>
<div class="menu">
   <ul style="text-align: left;">
    <li><a href="édition-profil.php"><i id="icon" class="fa-solid fa-user-pen"></i> &emsp;Editer mon profil</a></li>
    <br>
    <li><a href="mes-déclarations.php"><i id="icon" class="fa-solid fa-file-lines"></i>&emsp;Mes déclarations</a></li>
    <br>
    <li><a href="mes-documents.php"><i id="icon" class="fa-solid fa-file-lines"></i>&emsp;Documents coffrés</a></li>
    <br>
</div>

  
  </ul>
  </section>
 



   <script type="text/javascript">
    function toggle(){
      const toggle = document.querySelector('.toggle');
      const déconnexion = document.querySelector('.re');
      const banner = document.querySelector('.banner');
      toggle.classList.toggle('active')
      banner.classList.toggle('active')
      déconnexion.classList.toggle('active')

    }
    
    </script>
 <script src="skrollr.js"></script>
  
</body>
</html>
<?php     }    }      ?> 