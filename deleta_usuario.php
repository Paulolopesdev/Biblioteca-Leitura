<?php
// Conectar ao banco de dados
require('conecta.php');

// Receber o ID do usuário enviado pelo formulário
$id_user = $_POST['id_user'];

// Deletar o usuário do banco de dados
$sql = "DELETE FROM biblioteca WHERE id_user = '$id_user'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Usuário deletado com sucesso!');window.location.href='index.html';</script>";
} else {
    echo "Erro ao deletar usuário: " . $conn->error;
}

$conn->close();
?>
