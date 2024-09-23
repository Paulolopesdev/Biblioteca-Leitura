<?php
require("conecta.php");

echo "<!DOCTYPE html>
<html lang='pt'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Atualização de Usuário</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        body {
             background-color: #f3f3f3;
            font-family: sans-serif;
            font-size: 1em;
            color: #693e17;
            margin: 0 auto;
            max-width: 1200px; /* Limita a largura máxima do formulário */
            padding: 2%;
        }
        
        #titulo {
            font-family: sans-serif;
            color: #6b2a0a;
            text-align: center;
            font-size: 35px;
        } 
        
        #subtitulo {
            font-family: sans-serif;
            color: #6b2a0a;
            text-align: center;
            font-size: 25px;
            margin: 25px;
        } 
        
        fieldset {
            align-items: center;
            border: 1px solid #ccc; /* Borda cinza clara */
            padding: 10px; /* Espaçamento interno */
            border-radius: 5px; /* Bordas arredondadas */
            background-color: white; /* Fundo branco para destacar o formulário */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        label {
            display: block;
            margin-bottom: 0.2em;
            color: #6b2a0a;
        }
        
        input, select, textarea, button {
            font-family: sans-serif;
            font-size: 1em;
            color: #6b2a0a;
            border-radius: 5px;
        }
        
        input[type='text'], input[type='email'], input[type='tel'], input[type='number'], select, textarea {
            padding: 0.2em;
            border: 1px solid #6b2a0a;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            display: block;
            width: 100%;
            box-sizing: border-box; /* Inclui padding e borda na largura total */
        }
        
        .botao {
            font-size: 1.2em;
            background: #6b2a0a;
            border: 0;
            color: #ffffff;
            padding: 0.5em 1em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
            display: block;
            margin: 2em auto 0; /* Centraliza o botão e adiciona margem superior */
        }
        
        .botao:hover {
            background: #cb6532;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: none;
        }
        
        input:focus, select:focus, textarea:focus {
            background: #fad5c1;
        }
    </style>
</head>
<body>";

// Verificar se todos os campos obrigatórios foram enviados
if (isset($_POST['id_user']) && isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email'])) {
    $id_user = $_POST['id_user'];  // ID do usuário a ser atualizado
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    // Atualizando o registro
    $sql = "UPDATE biblioteca SET 
            nome = '$nome', 
            telefone = '$telefone', 
            email = '$email'
            WHERE id_user = '$id_user'";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Registro Atualizado com Sucesso</h1>";
        echo "<a href='index.html'><input type='button' class='botao' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>" . $conn->error;
    }

    $conn->close();
} else {
    echo "<center><h3>Alguns campos obrigatórios estão faltando.</h3>";
    echo "<a href='index.html'><input type='button' class='botao' value='Voltar'></a></center>";
}

echo "</body></html>";
?>
