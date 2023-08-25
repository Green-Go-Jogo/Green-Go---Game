<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Green GO</title>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="csscheer/indexjog.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head> 

<style>
.*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}



.buttons {
  margin-top: 50px;
  text-align: center;
  border-radius: 30px;
}

.blob-btn {
  z-index: 1;
  position: relative;
  padding: 40px 92px;
  margin-bottom: 30px;
  text-align: center;
  text-transform: uppercase;
  color: #ffffff;
  font-size: 16px;
  font-weight: bold;
  background-color: #f58c95;
  outline: none;
  border: none;
  transition: color 0.5s;
  cursor: pointer;
  border-radius: 30px;
  font-size: 40px;
}
.blob-btn:before {
  content: "";
  z-index: 1;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  border: 2px solid #f58c95;
  border-radius: 30px;
}
.blob-btn:after {
  content: "";
  z-index: -2;
  position: absolute;
  left: 3px;
  top: 3px;
  width: 100%;
  height: 100%;
  transition: all 0.3s 0.2s;
  border-radius: 30px;
}
.blob-btn:hover {
  color: #FFFFFF;
  border-radius: 30px;
}
.blob-btn:hover:after {
  transition: all 0.3s;
  left: 0;
  top: 0;
  border-radius: 30px;
}
.blob-btn__inner {
  z-index: -1;
  overflow: hidden;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  border-radius: 30px;
  background: #f58c95;
}
.blob-btn__blobs {
  position: relative;
  display: block;
  height: 100%;
  filter: url("#goo");
}
.blob-btn__blob {
  position: absolute;
  top: 2px;
  width: 25%;
  height: 100%;
  background: #C05367;
  border-radius: 100%;
  transform: translate3d(0, 150%, 0) scale(1.7);
  transition: transform 0.45s;
}
@supports (filter: url("#goo")) {
  .blob-btn__blob {
    transform: translate3d(0, 150%, 0) scale(1.4);
  }
}
.blob-btn__blob:nth-child(1) {
  left: 0%;
  transition-delay: 0s;
}
.blob-btn__blob:nth-child(2) {
  left: 30%;
  transition-delay: 0.08s;
}
.blob-btn__blob:nth-child(3) {
  left: 60%;
  transition-delay: 0.16s;
}
.blob-btn__blob:nth-child(4) {
  left: 90%;
  transition-delay: 0.24s;
}
.blob-btn:hover .blob-btn__blob {
  transform: translateZ(0) scale(1.7);
}
@supports (filter: url("#goo")) {
  .blob-btn:hover .blob-btn__blob {
    transform: translateZ(0) scale(1.4);
  }
}

.jogo {
    margin-top: 7%;
    text-align: center;
    font-family: Poppins-regular;

}

.home {
 padding : 70px 70px;    
}


</style>

<?php include_once("../../bootstrap/navJog.php");?>

<body>
    <div class="home">
    <p class="jogo" >Um jogo para aprender mais sobre as plantas</p>
    <img src="../../public/isologo-greengo.svg" width="100%" class="isologo">
<div class="buttons">
  <button class="blob-btn">
    Jogar Agora
    <span class="blob-btn__inner">
      <span class="blob-btn__blobs">
        <span class="blob-btn__blob"></span>
        <span class="blob-btn__blob"></span>
        <span class="blob-btn__blob"></span>
        <span class="blob-btn__blob"></span>
      </span>
    </span>
  </button>
  <br/>

<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
      <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
    </filter>
  </defs>
</svg>
</div>
</div>

                        <?php include_once("../../bootstrap/footer.php");?>
</html>