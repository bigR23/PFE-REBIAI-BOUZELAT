<?php $objet=$_GET['objet'];
$number=$_GET['num'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alerte</title>
  <link rel="shortcut icon" href="S.PNG"/>
  <link rel="stylesheet" href="css/all.css"/>
</head>
<style type="text/css">
*{
  margin: 0%;
  padding: 0%;
  box-sizing: border-box;
  font-family: sans-serif;
}
.partie0{
  display:flex;
  flex-direction: column;
  justify-content:center;
  align-items: center;
  min-height: 100vh;
  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
  overflow: hidden;
  animation: signal .6s ;
}
@keyframes signal{

0%{background:#4eb48a;}
30%{  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);}
60%{background:#4eb48a;}
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
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
 
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
		transform: scale(1.8);
	}

	100% {
		opacity: 1;
		transform: scale(1);
	}
}
.ok img{ 
  margin-top: 50px;
  animation:flotter 6s ease-in-out infinite , scaling .7s;
  cursor: pointer;
  transition: .5s;
}
  .ok img:hover{
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
 .info{text-align: center; 
opacity: 0;
transition: .5s;}
 .info p {
  color:#fff ;
 font-size:1.2em;
 font-weight: 600;
  text-shadow:  0 0 4px black;
 }
</style>
<body>
  <header>
    <a href="detection.php?num=<?=$number?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
  </header>
 
    <section class="partie0">
<h2> <?php echo $objet ?> qui vous intéresse n'est pas déclaré <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
  <lord-icon
      src="https://cdn.lordicon.com/hjeefwhm.json"
      trigger="loop"
      colors="primary:#0091ff"
      state="intro"
      style="width:50px;height:50px">
  </lord-icon> </h2>
<div class="ok">
<img src="img/yes.png" height="360px" onclick="Show();">

</div>
<div class="info" id="inf">
<p> cela ne siginifie pas que le produit proposé pour vous n'est pas volé a 100%</p>
<p>Donc s'il vous plait soyez prudents </p>

</div>
</section>
<script type="text/javascript">
  function Show()
  {
    document.getElementById("inf").style.opacity="1";
  }
 
</script>
</body>
</html>