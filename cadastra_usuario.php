<?php
require("conecta.php");

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Editar Usuário</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f3f3f3;;
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
            margin-bottom: 20px;
        }

        fieldset {
            align-items: center;
            border: 1px solid #ccc; /* Borda cinza clara */
            padding: 10px; /* Espaçamento interno */
            border-radius: 5px; /* Bordas arredondadas */
            background-color: white; /* Fundo branco para destacar o formulário */
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
            color: #6b2a0a;
        }

        input[type='text'], input[type='email'], input[type='tel'], input[type='number'], select, textarea {
            padding: 0.5em;
            border: 1px solid #6b2a0a;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            display: block;
            width: 100%;
            box-sizing: border-box; /* Inclui padding e borda na largura total */
            margin-bottom: 1em;
        }

        button {
            font-size: 1.2em;
            background: #6b2a0a;
            border: 0;
            color: #ffffff;
            padding: 0.5em 1em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
            cursor: pointer;
            display: block;
            margin: 1em auto;
        }

        button:hover {
            background: #cb6532;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: none;
        }

        .botao-voltar {
            font-size: 1.2em;
            background: #6b2a0a;
            border: 0;
            color: #ffffff;
            padding: 0.5em 1em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
            cursor: pointer;
            display: block;
            margin: 1em auto;
            text-align: center;
            text-decoration: none;
        }

        .botao-voltar:hover {
            background: #cb6532;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: none;
        }
    </style>
</head>
<body>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone =  $_POST['telefone'];
    $email = $_POST['email'];
    $escola = $_POST['escola'];
    $preferencia_contato = $_POST['preferencia_contato'];
    $categorias = isset($_POST['categorias']) ? implode(",", $_POST['categorias']) : '';
    $observacao = $_POST['observacao'];

    $sql = "INSERT INTO biblioteca (nome, telefone, email, escola, preferencia_contato, categorias, observacao)
    VALUES ('$nome', '$telefone', '$email', '$escola', '$preferencia_contato', '$categorias', '$observacao')";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Registro Inserido com Sucesso</h1>";
        echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
        
    }
}
?>




