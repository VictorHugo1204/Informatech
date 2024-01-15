<?php

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_banco_de_dados = "TCC2023";
$nome_tabela_1       = "G10_login";
$nome_tabela_2       = "G10_cursos";

$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql) or die ("Falha na conexão com MySQL");
	
//mysqli_query($conn, "DROP DATABASE $nome_banco_de_dados") or die ("BD $nome_banco_de_dados ainda não foi criado!");

mysqli_query($conn, "CREATE DATABASE $nome_banco_de_dados") or die ("Falha na criação do BD $nome_banco_de_dados");

mysqli_select_db($conn, $nome_banco_de_dados) or die ("Falha na selecao do BD $nome_banco_de_dados");

echo "<center><h1>Processamento de criação de BD e Tabelas realizado com sucesso!</h1>";
echo "<center><h3>Banco de dados <b> $nome_banco_de_dados </b> criado </h3>";

mysqli_query($conn, "CREATE TABLE $nome_tabela_1 (

                                            id                 INT      (005) AUTO_INCREMENT,
                                            nome               VARCHAR  (050),
                                            sobrenome          VARCHAR  (100),
                                            data_nascimento    DATE          ,
                                            email              VARCHAR  (200),
                                            senha              VARCHAR  (020),
                                            telefone           VARCHAR  (015),
                                            id_cursos          INT      (005),                          
                                            
											PRIMARY KEY(id)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_1");

echo "<center><h3>Tabela(s) <b> $nome_tabela_1 </b> criada(s) </h3>";
   


mysqli_query($conn, "CREATE TABLE $nome_tabela_2 (

                                            c_id             INT       (005) AUTO_INCREMENT,
                                            c_nome           VARCHAR   (025),
                                            c_descricao      TEXT           ,
                                            c_preco          DECIMAL  (10,2),
                                            
											PRIMARY KEY(c_id)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_1");

echo "<center><h3>Tabela(s) <b> $nome_tabela_2 </b> criada(s) </h3>";


mysqli_query($conn, "ALTER TABLE G10_login
                     ADD CONSTRAINT fk_id_cursos FOREIGN KEY (id_cursos)
			         REFERENCES G10_cursos (c_id)
					 ON DELETE CASCADE
                     ON UPDATE CASCADE;")
			         or die ("Falha na criacao da chave estrangeira historico - usuários");

mysqli_query($conn, "INSERT INTO G10_cursos values 
                     (
                      
                      '1',
                      'Básico',
                      'Este curso básico abrange os fundamentos essenciais de desenvolvimento web. Aprenda HTML para estruturar páginas, CSS para estilizá-las e Bootstrap para criar designs responsivos de forma eficiente. Ideal para iniciantes, você dominará as bases para criar sites atraentes e funcionais.',
                      '0.00'
                      
                      )")
                      or die ("Falha na incluição de curso básico");

mysqli_query($conn, "INSERT INTO G10_cursos values 
                     (
                      
                      '2',
                      'Intermediário',
                      'Eleve suas habilidades de desenvolvimento web com este curso intermediário abrangente. Aprofunde-se em HTML, CSS e Bootstrap, ampliando sua capacidade de criar layouts incríveis e responsivos. Além disso, explore o poder do PHP para adicionar funcionalidades dinâmicas ao seu site e mergulhe no JavaScript para interações mais envolventes. Ideal para quem busca criar projetos web completos e atraentes.',
                      '49.90'
                      
                      )")
                      or die ("Falha na incluição de curso intermediário");

mysqli_query($conn, "INSERT INTO G10_cursos values 
                     (
                      
                      '3',
                      'Avançado',
                      'Desenvolva maestria total na criação web com este curso avançado e abrangente. Domine a arte do HTML, CSS e Bootstrap para construir layouts extraordinários e responsivos. Aprofunde-se no PHP para funcionalidades dinâmicas avançadas, explore o JavaScript para interações sofisticadas e mergulhe no mundo da programação com Python e C++. Você estará preparado para projetos ambiciosos e desafios de desenvolvimento exigentes com este curso completo.',
                      '99.90'
                      
                      )")
                      or die ("Falha na incluição de curso avançado");
?>