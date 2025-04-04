<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("../../controllers/LoginController.php");

LoginController::manterUsuario();
if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
} ?>

<head>
    <?php include_once("../../bootstrap/header.php");
    ?>
    <meta name="description" content="Catálogo de plantas do IFPR com um jogo educacional sobre o meio ambiente. Explore a flora local e aprenda sobre a natureza do nosso campus.">
    <meta name="keywords" content="GreenGo, GreenGoIFPR, greengoifpr, Catálogo de Plantas, IFPR, Jogo Educativo, Meio Ambiente, Flora">
    <meta name="author" content="Green Go Team">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.greengoifpr.com.br/">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Adicione estilos personalizados aqui, se necessário */
        body {

            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Para evitar scroll horizontal */
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

        .link_wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            position: relative;
        }

        .wrapper a {
            display: block;
            width: 250px;
            height: 50px;
            line-height: 50px;
            font-weight: bold;
            font-family: Poppins-medium;
            text-decoration: none;
            background: #f0b6bc;
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 3px solid #f58c95;
            transition: all .35s;
            z-index: 1;
        }

        .wrapper .icon {
            width: 50px;
            height: 50px;
            border: 3px solid transparent;
            position: absolute;
            transform: rotate(45deg);
            right: 0;
            top: 0;
            z-index: 0;
            transition: all .35s;
        }

        .wrapper .icon svg {
            width: 30px;
            position: absolute;
            top: calc(50% - 15px);
            left: calc(50% - 15px);
            transform: rotate(-45deg);
            fill: #2ecc71;
            transition: all .35s;
        }

        .wrapper :hover {
            width: 225px;
            border: 3px solid #04574d;
            background: #338a5f;
            color: #04574d;
        }

        .wrapper :hover+.icon {
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
            color: #fff !important;
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
            top: -93px;
            width: 10px;
            height: 12px;
            background-color: #C05367;
            border-radius: 10px;
            z-index: 2;
        }

        .light-button button.bt .light-holder .light {
            position: absolute;
            top: -87px;
            width: 250px;
            height: 340px;
            clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
            background: transparent;
        }

        .light-button button.bt:hover .button-holder svg {
            margin-top: 10px;
            fill: #F0B6BC;
        }

        .embreve .light-button button.bt:hover .button-holder {
            font-family: Poppins-medium;
            color: #F0B6BC !important;
            outline: #C05367 2px solid;
            outline-offset: 2px;
        }

        .modo-escuro .light-button button.bt:hover .button-holder #msgHide {
            color: #7EC4BB !important;
        }

        .light-button button.bt:hover .light-holder .light {
            background: rgb(255, 255, 255);
            background: linear-gradient(180deg, #EC9399 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);
        }

        @media (max-width: 768px) {

            img#clorofila {
                position: relative;
                display: flex;
                margin: auto;
                align-items: center;
                width: 100%;
                z-index: 3;
                animation: forwards;
            }

            .texto1 {
                order: 1 !important;
            }

            .botao1 {
                order: 2 !important;
            }

            .texto2 {
                order: 3 !important;
            }

            .botao2 {
                order: 4 !important;
            }

            .texto3 {
                order: 5 !important;
            }

            .botao3 {
                order: 6 !important;
            }
        }

        @media (min-width: 768px) and (max-width: 992px) {

            .light-button button.bt .light-holder .dot {
                position: absolute;
                top: -73px;
                width: 10px;
                height: 10px;
                background-color: #C05367;
                border-radius: 10px;
                z-index: 2;
            }

            .light-button button.bt .light-holder .light {
                position: absolute;
                top: -80px;
                width: 250px;
                height: 320px;
                clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
                background: transparent;
            }

        }

        @media (min-width: 576px) and (max-width: 767px) {

            .light-button button.bt .light-holder .dot {
                position: absolute;
                top: -22px;
                width: 10px;
                height: 10px;
                background-color: #C05367;
                border-radius: 10px;
                z-index: 2;
            }

            .light-button button.bt .light-holder .light {
                position: absolute;
                top: -20px;
                width: 250px;
                height: 240px;
                clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
                background: transparent;
            }

        }

        @media (max-width: 576px) and (min-width: 420px) {

            .light-button button.bt .light-holder .dot {
                position: absolute;
                top: -7px;
                width: 8px;
                height: 8px;
                background-color: #C05367;
                border-radius: 10px;
                z-index: 2;
            }

            .light-button button.bt .light-holder .light {
                position: absolute;
                top: -7px;
                width: 250px;
                height: 220px;
                clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
                background: transparent;
            }

        }

        @media (max-width: 419px) {

            .light-button button.bt .light-holder .dot {
                position: absolute;
                top: 50px;
                width: 5px;
                height: 5px;
                background-color: transparent;
                border-radius: 10px;
                z-index: 2;
            }

            .light-button button.bt .light-holder .light {
                position: absolute;
                top: 55px;
                width: 250px;
                height: 180px;
                clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
                background: transparent;
            }

            .light-button button.bt .button-holder {
                height: 70px;
                width: 70px;
                position: relative;
                left: 14px;
            }

            .light-button button.bt:hover .button-holder svg {
                margin-top: 17px;
                fill: #F0B6BC;
            }

        }

        @media (min-width: 419px) and (max-width: 502px) {

            #arvore {
                position: relative;
                height: 35rem;
                top: -60px;
            }

            #surpresa {
                position: relative;
                top: -31rem;
            }

            .light-button button.bt .button-holder {
                height: 70px;
                width: 70px;
                position: relative;

            }

            .light-button button.bt:hover .button-holder svg {
                margin-top: 17px;
                fill: #F0B6BC;
            }

            .light-button button.bt .light-holder .dot {
                position: absolute;
                top: 1px;
                width: 5px;
                height: 5px;
                background-color: transparent;
                border-radius: 10px;
                z-index: 2;
            }

            .light-button button.bt .light-holder .light {
                position: relative;
                top: 32px;
                width: 250px;
                height: 180px;
                clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
                background: transparent;
                left: -13px;
            }

        }
    </style>
</head>

<body>

    <?php LoginController::navBar($tipo); ?>
    <div class="clorofila">
        <img src="../../public/isologo-greengo.svg" width="100%" class="logo-fundo">
        <img src="../../public/clorofila.webp" onload="acelerarGIF()" alt="" id="clorofila">

    </div>
    <div class="conteudo botoes">
        <div class="container botoes">
            <div class="row">
                <!-- Parte 1 - Cadastro -->
                <div class="col-md-12">
                    <div class="texto texto1">
                        <p class="textoBotao">Participe de uma experiência única! <br> Se cadastre agora no Green Go!</p>
                    </div>
                    <div class="botao botao1">
                        <div class="wrapper">
                            <div class="link_wrapper">
                                <a href="../users/cadastro.php">Cadastre-se</a>
                                <div class="icon">
                                    <svg viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" fill="#338A5F" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim da Parte 1 -->

                <!-- Parte 2 - Redes Sociais -->
                <div class="col-md-12">
                    <div class="texto texto2">
                        <p class="textoBotao">Acompanhe nossa página no Instagram! <br> E conheça mais sobre o IFPR!</p>
                    </div>
                    <div class="botao botao2">
                        <button class="btn-cssbuttons">
                            <span>REDES SOCIAIS</span><span>
                                <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                                    <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
                                </svg>
                            </span>
                            <ul>
                                <li>
                                    <a href="https://ifpr.edu.br/foz-do-iguacu/"><img src="../../public/ifpr.svg"></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/projetogreengo/"><img src="../../public/instagram.svg"></a>
                                </li>
                                <li>
                                    <a href=""><svg width="18" height="18" viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="white" d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" fill="#338A5F" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </button>
                    </div>
                </div>
                <!-- Fim da Parte 2 -->

                <!-- Parte 3 - Projeto -->
                <div class="col-md-12">
                    <div class="texto texto3">
                        <p class="textoBotao">Gostou do Green Go? <br> Saiba mais sobre o projeto! </p>
                    </div>
                    <div class="botao botao3">
                        <div class="wrapper">
                            <div class="link_wrapper">
                                <a href="projeto.php">Conheça o Projeto</a>
                                <div class="icon">
                                    <svg viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" fill="#338A5F" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim da Parte 3 -->
            </div>
        </div>

        <div class="row botoes" style="background-color: #04574d; height: 100px; width: 100%"></div>
    </div>
    <br><br>

    <!-- Parte Novidades -->
    <div class="embreve">
        <div class="container text-center">
            <img src="../../public/Arvorebotao.png" id="arvore">
            <div class="row" id="minis">
                <div class="col" id="surpresa">
                    <div class="light-button">
                        <button class="bt">
                            <div class="light-holder">
                                <div class="dot"></div>
                                <div class="light"></div>
                            </div>
                            <div class="button-holder">
                                <svg viewBox="0 0 148 148" role="img" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M86.5709 148C62.1842 135.218 35.9826 90.599 32.7581 61.7587C29.5335 32.9184 49.1653 5.92403 67.0692 0.899082C84.9731 -4.12587 101.143 12.8265 104.848 29.022C108.553 45.2174 99.2312 62.5956 90.4716 78.0347C98.4228 72.4363 115.866 71.7081 116.085 82.1505C116.368 95.6502 102.164 116.355 81.4156 127.767C83.3458 135.646 84.6824 139.001 86.5709 148Z" />
                                </svg>
                                <p id="msgHide">GREEN GO <br> APP</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim da Parte Novidades -->
    <br><br>
    <div class="redes">
        <br><br><br>
        <p id="post"> <strong>Último post do nosso instagram:</strong> </p>
        <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/C0nQ6hyxcoX/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
            <div style="padding:16px;"> <a href="https://www.instagram.com/p/C0nQ6hyxcoX/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                    <div style=" display: flex; flex-direction: row; align-items: center;">
                        <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                        </div>
                        <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                            </div>
                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                            </div>
                        </div>
                    </div>
                    <div style="padding: 19% 0;">
                    </div>
                    <div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
                        <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                    <g>
                                        <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div style="padding-top: 8px;">
                        <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">Ver essa foto no Instagram</div>
                    </div>
                    <div style="padding: 12.5% 0;">
                    </div>
                    <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                        <div>
                            <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                            </div>
                            <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                            </div>
                            <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                            </div>
                        </div>
                        <div style="margin-left: 8px;">
                            <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                            </div>
                            <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                            </div>
                        </div>
                        <div style="margin-left: auto;">
                            <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                            </div>
                            <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                            </div>
                            <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                    </div>
                </a>
                <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/C0nQ6hyxcoX/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Uma publicação compartilhada por Green Go (@projetogreengo)</a></p>
            </div>
        </blockquote>
        <script async src="//www.instagram.com/embed.js"></script>

    </div>

    <?php include_once("../../bootstrap/footer.php"); ?>
    <script src="../../bootstrap/bootstrap.min.js"></script>
</body>

</html>
