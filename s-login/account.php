<?php

session_start();

$servidor = "localhost";
$usuario_mysql = "root";
$senha_mysql = "";

$nome_banco_de_dados = "TCC2023";
$nome_tabela_1 = "G10_login";
$nome_tabela_2 = "G10_cursos";

$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql, $nome_banco_de_dados) or die("Falha na conexão com MySQL");

$resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_1 ");

$rowcount = mysqli_num_rows($resultado);

if ($rowcount) {
    $campo = mysqli_fetch_array($resultado);

    $_SESSION['id']               = $id               = $campo['id'];
    $_SESSION['nome']             = $nome             = $campo['nome'];
    $_SESSION['sobrenome']        = $sobrenome        = $campo['sobrenome'];
    $_SESSION['data_nascimento']  = $data_nascimento  = $campo['data_nascimento'];
    $_SESSION['email']            = $email            = $campo['email'];
    $_SESSION['senha']            = $senha            = $campo['senha'];
    $_SESSION['telefone']         = $telefone         = $campo['telefone'];
    $_SESSION['id_cursos']        = $id_cursos        = $campo['id_cursos'];


    $_SESSION['consulta'] = "s";
} else {
    $_SESSION['msg'] = "Registro não cadastrado!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Informatech | Sua Conta</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="https://kit.fontawesome.com/373f50ec1a.js" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/account.css">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>R. Octávio Rodrigues de
                        Souza, 350 - Parque Paduan, Taubaté - SP, 12070-790</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>(12) 9999-9999</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>Informatech@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://instagram.com/informa_tech100?igshid=MzRlODBiNWFlZA==" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 py-3 py-lg-0 sticky-top shadow-sm">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"><img src="img/logo.png" alt="">Informatech</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Início</a>
                    <a href="about.php" class="nav-item nav-link">Sobre</a>
                    <a href="service.php" class="nav-item nav-link">Serviços</a>

                    <a href="contact.php" class="nav-item nav-link">Contato</a>
                </div>
                <img src="img/perfil.png" class="user-pic" onclick="toggleMenu()">

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="img/perfil.png" alt="">
                            <h4 style="margin-bottom: -2px;">
                                <?php if ($_SESSION['nome'] != "") {
                                    echo $_SESSION['nome'];
                                } ?>
                            </h4>
                        </div>
                        <hr>
                        <a href="account.php" class="sub-menu-link">
                            <i class="fa-solid fa-user"></i>
                            <p>Editar Perfil</p>
                            <span>></span>
                        </a>
                        <a href="account.php" class="sub-menu-link">
                            <i class="fa-solid fa-gear"></i>
                            <p>Configurações & Privacidade</p>
                            <span>></span>
                        </a>
                        <a href="contact.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-question"></i>
                            <p>Ajuda & Suporte</p>
                            <span>></span>
                        </a>
                        <hr>
                        <a href="../index.php" class="sub-menu-link" id="logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Sair</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <section class="py-5 my-5">
        <div class="container">
            <h1 class="mb-5">Seu Perfil</h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right" style="
                padding-bottom: 90px;">
                    <div class="p-4">
                        <div class="img-circle text-center mb-3">
                            <img src="img/perfil.png" alt="Image" class="shadow">
                        </div>
                        <h4 class="text-center">
                            <?php echo $_SESSION['nome']; ?>
                        </h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i>
                            Perfil
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            Senha
                        </a>
                        <a class="nav-link" id="application-tab" data-toggle="pill" href="#assinatura" role="tab" aria-controls="application" aria-selected="false">
                            <i class="fa fa-tv text-center mr-1"></i>
                            Assinatura
                        </a>

                    </div>
                </div>
                <form action="#" method="POST">
                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h3 class="mb-4">Configurações da Conta</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['nome']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['sobrenome']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['telefone']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control" value="<?php echo $_SESSION['data_nascimento']; ?>">
                                    </div>
                                </div>


                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" name="botao" value="Atualizar">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <h3 class="mb-4">Configurações de Senha</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha antiga</label>
                                        <input type="password" class="form-control" value="<?php echo $_SESSION['senha']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nova senha</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirmar nova senha</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Atualizar</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="assinatura" role="tabpanel" aria-labelledby="application-tab">
                            <h3 class="mb-4">Sua Assinatura</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="display: flex;">

                                        <?php
                                        if ($_SESSION['id_cursos'] == 1) {
                                            $resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_2 WHERE c_id = 1 ");

                                            $rowcount  = mysqli_num_rows($resultado);

                                            if ($rowcount) {
                                                $campo = mysqli_fetch_array($resultado);

                                                $_SESSION['c_id']        = $c_id         = $campo['c_id'];
                                                $_SESSION['c_nome']      = $c_nome       = $campo['c_nome'];
                                                $_SESSION['c_descricao'] = $c_descricao  = $campo['c_descricao'];
                                                $_SESSION['c_preco']     = $c_preco      = $campo['c_preco'];

                                                $_SESSION['consulta']  = "s";
                                            } else {
                                                $_SESSION['msg'] = "Registro não cadastrado!";
                                            }
                                        } else if ($_SESSION['id_cursos'] == 2) {
                                            $resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_2 WHERE c_id = 2 ");

                                            $rowcount  = mysqli_num_rows($resultado);

                                            if ($rowcount) {
                                                $campo = mysqli_fetch_array($resultado);

                                                $_SESSION['c_id']        = $c_id         = $campo['c_id'];
                                                $_SESSION['c_nome']      = $c_nome       = $campo['c_nome'];
                                                $_SESSION['c_descricao'] = $c_descricao  = $campo['c_descricao'];
                                                $_SESSION['c_preco']     = $c_preco      = $campo['c_preco'];

                                                $_SESSION['consulta']  = "s";
                                            } else {
                                                $_SESSION['msg'] = "Registro não cadastrado!";
                                            }
                                        } else if ($_SESSION['id_cursos'] == 3) {
                                            $resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_2 WHERE c_id = 3 ");

                                            $rowcount  = mysqli_num_rows($resultado);

                                            if ($rowcount) {
                                                $campo = mysqli_fetch_array($resultado);

                                                $_SESSION['c_id']        = $c_id         = $campo['c_id'];
                                                $_SESSION['c_nome']      = $c_nome       = $campo['c_nome'];
                                                $_SESSION['c_descricao'] = $c_descricao  = $campo['c_descricao'];
                                                $_SESSION['c_preco']     = $c_preco      = $campo['c_preco'];

                                                $_SESSION['consulta']  = "s";
                                            } else {
                                                $_SESSION['msg'] = "Registro não cadastrado!";
                                            }
                                        }
                                        ?>

                                        <?php
                                        if ($_SESSION['id_cursos'] == 1) {
                                            echo '<img src="img\BASICO.jpg" style="margin: 20px;">';
                                        } else if ($_SESSION['id_cursos'] == 2) {
                                            echo '<img src="img\INTERMEDIARIO-.jpg" style="margin: 20px;">';
                                        } else if ($_SESSION['id_cursos'] == 3) {
                                            echo '<img src="img\AVANçADO.jpg" style="margin: 20px;">';
                                        }
                                        ?>

                                        <?php if ($_SESSION['id_cursos'] == "") {
                                            echo '<div style="display: block;"><h4 class="mb-4" style="width: max-content;">Você não possui assinatura.</h4>
                                                  <a href="index.php#planos" class="btn btn-primary py-md-1 px-md-3 me-3 animated slideInLeft">Assine</a></div>';
                                            echo '<link rel="stylesheet" type="text/css" href="css/teste.css">';
                                        } ?>
                                        <div class="teste">
                                            <form action="#" method="POST">
                                                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                                        <h3 class="mb-4" style="width: max-content;">Informações do Plano</h3>
                                                        <div class="row">
                                                            <div class="col-md-6" style="width: auto;">
                                                                <div class="form-group">
                                                                    <label>Curso</label>
                                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['c_nome']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" style="width: auto;">
                                                                <div class="form-group">
                                                                    <label>Preço</label>
                                                                    <input type="text" class="form-control" value="R$ <?php echo $_SESSION['c_preco']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Descrição</label>
                                                                    <textarea class="form-control" rows="4" style="width: 200%; height: 130%;"><?php echo $_SESSION['c_descricao']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.php" class="navbar-brand">
                            <h1 class="m-0 text-white"><img src="img/logo.png" alt="">Informatech</h1>
                        </a>
                        <p class="mt-3 mb-4">Um ótimo curso para sua proficionalização da área</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Seu Email">
                                <button class="btn btn-dark">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Entrar em contato</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">R. Octávio Rodrigues de Souza, 350 - Parque Paduan, Taubaté - SP,
                                    12070-790</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">Informatech@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">(12) 9999-9999</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Entradas rápidas</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Início</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre nós</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Serviços</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Conheça a equipe</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contate-nos</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Informatech</a>. Todos
                            direitos reservados.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>

</body>

</html>

<?php

?>