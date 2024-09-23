<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Leiturinha - Usuários Cadastrados</title>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #6b2a0a;
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto 30px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6b2a0a;
            color: white;
            font-weight: bold;
        }

        td {
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #6b2a0a;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #cb6532;
        }

        button:focus {
            outline: none;
        }

    </style>
</head>
<body>

    <h1>Usuários Cadastrados</h1>

    <table>
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOME</th>
                <th>TELEFONE</th>
                <th>EMAIL</th>
                <th>CONTATO VIA</th>
                <th>CATEGORIA DE PREFERÊNCIAS</th>
                <th>OBSERVAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT ID_USER, NOME, TELEFONE, EMAIL, PREFERENCIA_CONTATO, CATEGORIAS, OBSERVACAO FROM BIBLIOTECA");

                while($dado = mysqli_fetch_array($dados_select)) {
                    echo '<tr>';
                    echo '<td>'.$dado[0].'</td>';
                    echo '<td>'.$dado[1].'</td>';
                    echo '<td>'.$dado[2].'</td>';
                    echo '<td>'.$dado[3].'</td>';
                    echo '<td>'.$dado[4].'</td>';
                    echo '<td>'.$dado[5].'</td>';
                    echo '<td>'.$dado[6].'</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>

    <button onclick="window.location.href='index.html'">Voltar ao Início</button>

</body>
</html>
