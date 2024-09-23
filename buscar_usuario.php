<?php
// Conectar ao banco de dados
require('conecta.php');

// Receber o nome enviado pelo formulário
$nome = $_POST['nome'];

// Buscar o usuário no banco de dados
$sql = "SELECT id_user, nome, telefone, email FROM biblioteca WHERE nome = '$nome'";
$result = $conn->query($sql);

// Cabeçalho HTML com estilo
echo "<!DOCTYPE html>
<html lang='pt'>
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
            border-radius: 5px;
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
            display: table;
            font-size: 1.2em;
            border-radius: 5px;
            background: #6b2a0a;
            border: 0;
            color: #ffffff;
            padding: 0.5em 1em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
            cursor: pointer;           
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

// Verificar se encontrou o usuário
if ($result->num_rows > 0) {
    // Exibir o ID e os outros dados
    while ($row = $result->fetch_assoc()) {
        $id_user = $row['id_user'];
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];

        // Exibir o formulário com o ID e os dados do usuário
        echo "<fieldset>
                <h3>Editar Usuário</h3>
                <form method='POST' action='atualiza_usuario.php'>
                    <input type='hidden' name='id_user' value='$id_user'>
                    <label>ID: $id_user</label>
                    <label>Nome Completo:</label>
                    <input type='text' name='nome' value='$nome' required>
                    <label>Telefone:</label>
                    <input type='text' name='telefone' value='$telefone' required>
                    <label>Email:</label>
                    <input type='email' name='email' value='$email' required>
                    <button type='submit'>Atualizar</button>
                </form>
                <form method='POST' action='deleta_usuario.php' onsubmit='return confirm(\"Tem certeza que deseja deletar este usuário?\");'>
                    <input type='hidden' name='id_user' value='$id_user'>
                    <button type='submit'>Deletar</button>
                </form>
                <a href='index.html' class='botao-voltar'>Voltar</a>
              </fieldset>";
    }
} else {
    echo "<fieldset>
            <h3>Resultado da Busca</h3>
            <h4>Usuário não encontrado.</h4>
            <a href='index.html' class='botao-voltar'>Voltar</a>
          </fieldset>";
}

echo "</body></html>";

$conn->close();
?>
