<?php

session_start();

//ini_set ('display_errors',0); 

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_programa       = "login.php";

$nome_banco_de_dados = "tcc2023";
$nome_tabela_1       = "g10_login";

	
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql, $nome_banco_de_dados)
        or die ("<br>falha na conexão com MySQL ou na seleção do BD");


// Definir as variáveis session

if(!isset($_SESSION['nome']))              { $_SESSION['nome']             = null; }
if(!isset($_SESSION['sobrenome']))         { $_SESSION['sobrenome']        = null; }
if(!isset($_SESSION['data_nascimento']))   { $_SESSION['data_nascimento']  = null; }
if(!isset($_SESSION['email']))             { $_SESSION['email']            = null; }
if(!isset($_SESSION['senha']))             { $_SESSION['senha']            = null; }
if(!isset($_SESSION['csenha']))            { $_SESSION['csenha']           = null; }
if(!isset($_SESSION['telefone']))          { $_SESSION['telefone']         = null; }

if(!isset($_SESSION['botao']))             { $_SESSION['botao']            = null; }
if(!isset($_SESSION['msg']))               { $_SESSION['msg']              = null; }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/373f50ec1a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="#" method="POST">
        <div class="form create">
            <h2>Cadastro</h2>

            <div class="teste1">
                <div>
                    <div class="inputBox">
                      
                        <input type="text" 
                               required="required"
                               name="nome"
                               value = "<?php echo $_SESSION['nome']; ?>">
                        <i class="fa-regular fa-user"></i>
                        <span>Nome</span>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" 
                               required="required"
                               name="sobrenome"
                               value = "<?php echo $_SESSION['sobrenome']; ?>"> 
                        <i class="fa-regular fa-user"></i>
                        <span>Sobrenome</span>
                    </div>
                </div>
                <div>
                    <div class="inputBox">
                        <input type="text" 
                               required="required"
                               name="telefone"
                               id="telefone"
                               value = "<?php echo $_SESSION['telefone']; ?>"> 
                        <i class="fa-solid fa-phone"></i>
                        <span>Telefone</span>
                    </div><br>
                    <div class="inputBox">
                        <input type="date" 
                               required="required"
                               name="data_nascimento"
                               value = "<?php echo $_SESSION['data_nascimento']; ?>">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                </div>
            </div>

            <div class="inputBox" id="email">
                <input type="email" 
                       required="required"
                       name="email"
                       value = "<?php echo $_SESSION['email']; ?>">
                <i class="fa-regular fa-envelope"></i>
                <span>E-mail</span>
            </div>

            <div class="t2">
                <div class="inputBox">
                    <input type="password" 
                           required="required"
                           name="senha"
                           id="senha"
                           value = "<?php echo $_SESSION['senha']; ?>"> 
                    <i class="fa-solid fa-lock"></i>
                    <span>Crie uma senha</span>
                    
                </div>
                <div class="inputBox">
                    <input type="password" 
                           required="required"
                           name="csenha"
                           id="csenha"
                           value = "<?php echo $_SESSION['csenha']; ?>"> 
                    <i class="fa-solid fa-lock"></i>
                    <span>Confirme sua senha</span>
                </div>
            </div>
            <div class="mostrarsenha">
            <p><input type="checkbox" id="mostrar-senha"> Mostrar Senha</p>
            </div>
            <div class="inputBox">
                <input type="submit" name="botao" value="Cadastrar">
            </div>
            <p>Já possui uma conta? <a href="#" class="login">Login</a></p>
        </div>
    </form>




    <form action="#" method="POST">
        <div class="form login">
            <h2>Login</h2>
            <div class="inputBox">
                <input type="email" 
                       required="required"
                       name="email"
                       value = "<?php echo $_SESSION['email']; ?>">
                <i class="fa-regular fa-envelope"></i>
                <span>E-mail</span>
            </div>
            <div class="inputBox">
                <input type="password" 
                       required="required"
                       name="senha"
                       id="lsenha"
                       value = "<?php echo $_SESSION['senha']; ?>"> 
                <i class="fa-solid fa-lock"></i>
                <span>Senha</span>
            </div>
            <div class="mostrarsenha">
            <p><input type="checkbox" id="mostrar-lsenha"> Mostrar Senha</p>
            </div>
            <div class="inputBox">
                <input type="submit" name="botao" value="Entrar">
            </div>
            <p>Não possui uma conta? <a href="#" class="cadastro">Cadastre-se</a></p>
        </div>
    </form>
    </div>

    <script src="js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script>
  const mostrarSenhalCheckbox = document.getElementById('mostrar-lsenha');
  const senhalInput = document.getElementById('lsenha');
  
  mostrarSenhalCheckbox.addEventListener('change', function() {
    if (mostrarSenhalCheckbox.checked) {
      senhalInput.type = 'text';
    } else {
      senhalInput.type = 'password';
    }
  });
</script>

<script>
  const mostrarSenhaCheckbox = document.getElementById('mostrar-senha');
  const senhaInput = document.getElementById('senha');
  
  mostrarSenhaCheckbox.addEventListener('change', function() {
    if (mostrarSenhaCheckbox.checked) {
      senhaInput.type = 'text';
    } else {
      senhaInput.type = 'password';
    }
  });
</script>

<script>
const mostrarCSenhaCheckbox = document.getElementById('mostrar-senha');
const csenhaInput = document.getElementById('csenha');

mostrarCSenhaCheckbox.addEventListener('change', function() {
    if (mostrarCSenhaCheckbox.checked) {
      csenhaInput.type = 'text';
    } else {
      csenhaInput.type = 'password';
    }
  });
</script>

<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>
</body>
</html>

<?php

// Pega dados do formulário
$_SESSION['nome']            = $nome = filter_input(INPUT_POST, 'nome');
$_SESSION['sobrenome']       = $sobrenome = filter_input(INPUT_POST, 'sobrenome');
$_SESSION['data_nascimento'] = $data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$_SESSION['email']           = $email = filter_input(INPUT_POST, 'email');
$_SESSION['senha']           = $senha = filter_input(INPUT_POST, 'senha');
$_SESSION['csenha']          = $csenha = filter_input(INPUT_POST, 'csenha');
$_SESSION['telefone']        = $telefone = filter_input(INPUT_POST, 'telefone');
$_SESSION['botao']           = $botao      = filter_input(INPUT_POST, 'botao');


// Cadastrar -------------------------
if ($_SESSION['botao'] == "Cadastrar")
	{

        if ($_SESSION['senha'] == $_SESSION['csenha'])
		{
           
			$inclusao = mysqli_query($conn, "INSERT INTO $nome_tabela_1 values 
			                                                    (
																 
                                                                  NULL,
																 '$nome',
																 '$sobrenome',
																 '$data_nascimento',
																 '$email',
																 '$senha',
																 '$telefone',
                                                                  NULL
																 
																 )");

		}else {
            echo "<script>window.alert('senha e confirmação de senha devem ser iguais')</script>";
        }

		$_SESSION['botao'] = "";		  
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.php'>"; 
    }

   // executa quando clica o botão Entrar
   if ($_SESSION['botao']  ==  "Entrar")     
    {
		    $_SESSION['acessar'] = "Não";

			$resultado  = mysqli_query($conn, "SELECT * FROM $nome_tabela_1 WHERE email='$email'");
			
			if ($resultado)
				{
					$rowcount=mysqli_num_rows($resultado);
					//printf("<br><center> Registros encontrados %d rows.\n",$rowcount);

					if ($rowcount)
						{ 
							$campo = mysqli_fetch_array($resultado);
							
							$_SESSION['email']       = $campo['email'];
							$_SESSION['nome']        = $campo['nome'];
							$_SESSION['sobrenome']   = $campo['sobrenome'];
							$_SESSION['telefone']    = $campo['telefone'];
							$_SESSION['data_nascimento']   = $campo['data_nascimento'];
							$_SESSION['senha']       = $campo['senha'];
							
							if ($_SESSION['senha'] == $_POST['senha'])
								{ $_SESSION['acessar'] = "Sim"; }
							else 
								{ $_SESSION['acessar'] = "Não"; }
						}

		   if ($_SESSION['acessar'] == "Sim")
				{	
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=s-login\index.php'>";
				}



					
				 } 
	}


?>