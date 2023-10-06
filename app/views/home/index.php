<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("../../controllers/LoginController.php"); 

LoginController::manterUsuario();
if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}?>
<head>
    <?php include_once("../../bootstrap/header.php");
    ?>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Adicione estilos personalizados aqui, se necessário */
        body {
            overflow-x: hidden;
        }
        @media (max-width: 50%) {

            .row.justify-content-md-left {
                justify-content: center;
                align-items: center;
            }

            .quadrado p {
                text-align: center !important;
            }


            h1 {
                font-size: 24px;
            }


            #imagem-celular {
                width: 80%;
                height: auto;
            }

        }

.col-md-6 {
    display: flex;
    width: 600px;
    height: 300px;
    justify-content: center;
    align-items: center;
}

.col {
    display: flex;
    flex-direction: column-reverse;
    width: 600px;
    height: 300px;
    justify-content: center;
    align-items: center;
}

.wrapper { 
    text-align: center;
}

.link_wrapper{
    display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  position: relative;
}

.wrapper a{
  display: block;
  width: 250px;
  height: 50px;
  line-height: 50px;
  font-weight: bold;
  font-family: Poppins-medium;
  text-decoration: none;
  background: #f0b6bc;
  text-align: center;
  color: #f58c95;
  text-transform: uppercase;
  letter-spacing: 1px;
  border: 3px solid #f58c95;
  transition: all .35s;
}

.wrapper .icon{
  width: 50px;
  height: 50px;
  border: 3px solid transparent;
  position: absolute;
  transform: rotate(45deg);
  right: 0;
  top: 0;
  z-index: -1;
  transition: all .35s;
}

.wrapper .icon svg{
  width: 30px;
  position: absolute;
  top: calc(50% - 15px);
  left: calc(50% - 15px);
  transform: rotate(-45deg);
  fill: #2ecc71;
  transition: all .35s;
}

.wrapper :hover{
  width: 225px;
  border: 3px solid #04574d;
  background: #338a5f;
  color: #04574d;
}

.wrapper :hover + .icon{
  border: 3px solid #04574d;
  right: -25%;
}

.btn-cssbuttons {
  display: flex;
  margin: auto;   
  --btn-color: #275efe;
  position: relative;
  padding: 16px 32px;
  font-family: Poppins-medium;
  font-weight: 500;
  font-size: 16px;
  line-height: 1;
  color: #f58c95;
  background: none;
  border: none;
  outline: none;
  overflow: hidden;
  cursor: pointer;
  filter: drop-shadow(0 2px 8px rgba(39, 94, 254, 0.32));
  transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}

.btn-cssbuttons::before {
  display: flex;
  margin: auto;
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  background: #f0b6bc;
  border: 3px solid #f58c95;
  transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}

.btn-cssbuttons span,
.btn-cssbuttons span span {
 display: inline-flex;
 vertical-align: middle;
 transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}

.btn-cssbuttons span {
 transition-delay: 0.05s;
}

.btn-cssbuttons span:first-child {
 padding-right: 7px;
}

.btn-cssbuttons span span {
 margin-left: 8px;
 transition-delay: 0.1s;
}

.btn-cssbuttons ul {
 position: absolute;
 top: 50%;
 left: 0;
 right: 0;
 display: flex;
 margin: 0;
 padding: 0;
 list-style-type: none;
 transform: translateY(-50%);
}

.btn-cssbuttons ul li {
 flex: 1;
}

.btn-cssbuttons ul li a {
 display: inline-flex;
 vertical-align: middle;
 transform: translateY(55px);
 transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}

.btn-cssbuttons ul li a:hover {
 opacity: 0.5;
}

.btn-cssbuttons:hover::before {
 transform: scale(1.2);
}

.btn-cssbuttons:hover span,
.btn-cssbuttons:hover span span {
 transform: translateY(-55px);
}

.btn-cssbuttons:hover ul li a {
 transform: translateY(0);
}

.btn-cssbuttons:hover ul li:nth-child(1) a {
 transition-delay: 0.15s;
}

.btn-cssbuttons:hover ul li:nth-child(2) a {
 transition-delay: 0.2s;
}

.btn-cssbuttons:hover ul li:nth-child(3) a {
 transition-delay: 0.25s;
}

.light-button button.bt {
  position: relative;
  height: 200px;
  display: flex;
  align-items: flex-end;
  outline: none;
  background: none;
  border: none;
}

.light-button button.bt .button-holder {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100px;
  width: 100px;
  background-color: #04574d;
  border-radius: 5px;
  color: #04574d;
  font-weight: 700;
  transition: 300ms;
  outline: #04574d 2px solid;
  outline-offset: 20;
}

.light-button button.bt .button-holder svg {
  height: 50px;
  fill: #04574d;
  transition: 300ms;
}

.light-button button.bt .light-holder {
  position: absolute;
  height: 200px;
  width: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.light-button button.bt .light-holder .dot {
  position: absolute;
  top: 0;
  width: 10px;
  height: 10px;
  background-color: #04574d;
  border-radius: 10px;
  z-index: 2;
}

.light-button button.bt .light-holder .light {
  position: absolute;
  top: 0;
  width: 200px;
  height: 200px;
  clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
  background: transparent;
}

.light-button button.bt:hover .button-holder svg {
  margin-top: 7px;
  fill: #7EC4BB;
}

.light-button button.bt:hover .button-holder {
  font-family: Poppins-medium;
  color: #7EC4BB;
  outline: #7EC4BB 2px solid;
  outline-offset: 2px;
}

.light-button button.bt:hover .light-holder .light {
  background: rgb(255, 255, 255);
  background: linear-gradient(180deg, #7EC4BB 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);
}
    </style>
</head>

<body>

<?php LoginController::navBar($tipo);?>

    <div class="container" style="height: 750px;">
        
    </div>

    <div class="container">
        <div class="row">

        <!-- Parte 1 - Cadastro -->
            <div class="col-md-6">
              <div class="wrapper">
                <div class="link_wrapper">
                    <a href="#">Cadastre-se</a>
                        <div class="icon">
                            <svg viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" fill="#338A5F"/>
                        </svg>
                </div>
            </div>
    </div>
            </div>
            <div class="col-md-6">
                <p class="textoBotao">Participe de uma experiência única <br> Se cadastre agora no Green Go!</p>
            </div>
        <!-- Fim da Parte 1 -->

        <!-- Parte 2 - Redes Sociais -->
            <div class="col-md-6">
                <p class="textoBotao">Acompanhe nosso Blog e nossa página no Instagram! <br> E conheça mais sobre o IFPR!</p>
            </div>
            <div class="col-md-6">
                <button class="btn-cssbuttons">
                    <span>REDES SOCIAIS</span><span>
                        <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                        <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
                        </svg>
                    </span>
                    <ul>
                        <li>
                            <a href="https://ifpr.edu.br/foz-do-iguacu/"><img src="../../public/ifpr.svg"></a></li>
                        <li>
                            <a href="https://www.instagram.com/projetogreengo/"><img src="../../public/instagram.svg"></a>
                        </li>
                        <li>
                        <a href=""><svg width="18" height="18" viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill="white" d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" fill="#338A5F"/>
                        </svg>
                        </a>
                        </li>
                    </ul>
                </button>
        </div>
        <!-- Fim da Parte 2 -->

        <!-- Parte 3 - Projeto -->
        <div class="col-md-6">
              <div class="wrapper">
                <div class="link_wrapper">
                    <a href="#">Conheça o Projeto</a>
                        <div class="icon">
                            <svg viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" fill="#338A5F"/>
                        </svg>
                </div>
            </div>
    </div>
            </div>
            <div class="col-md-6">
                <p class="textoBotao">Participe de uma experiência única <br> Se cadastre agora no Green Go!</p>
            </div>
        <!-- Fim da Parte 3 -->  
        </div>
    </div>

    <div class="row" style="background-color: #338a5f; height: 5px"></div>
    <br><br>

    <!-- Parte Final com o Em breve -->
    <div class="container">
        <div class="row">     
            <div class="col">
            <p class="textoNovidade">"Na imensidão da natureza, uma descoberta inovadora<br> aguarda para apresentar seus mistérios."</p>
                <div class="light-button">
                    <p class="textoNovidade"> EM BREVE </p>
                    <br>
                    <button class="bt">
                        <div class="light-holder">
                            <div class="dot"></div>
                                <div class="light"></div>
                        </div>
                        <div class="button-holder">
                        <svg viewBox="0 0 148 148"  role="img" xmlns="http://www.w3.org/2000/svg">
                            <path d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z"/>
                        </svg>
                            <p>GREEN GO <br> APP</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim da Parte Final -->
    
    <?php include_once("../../bootstrap/footer.php");?>
    <script src="../../bootstrap/bootstrap.min.js"></script>
</body>

</html>