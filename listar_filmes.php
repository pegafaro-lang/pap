<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// 1️⃣ Ligar à base de dados
$ligacao = new mysqli("localhost", "root", "", "cinema");

// Verificar se há erro na ligação
if ($ligacao->connect_error) {
  die("Erro de ligação: " . $ligacao->connect_error);
}
// 2️⃣ Executar o comando SQL
$sql = "SELECT * FROM filmes";
$resultado = $ligacao->query($sql);

// 3️⃣ Mostrar os dados
echo "<h2>filmes</h2>";
if ($resultado->num_rows > 0) {
  echo "<table border='1' cellpadding='5'>";
  echo "<tr><th>ID</th><th>titulo</th><th>genero</th><th>duracao</th></tr>";

  while ($linha = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $linha['id'] . "</td>";
    echo "<td>" . $linha['titulo'] . "</td>";
    echo "<td>" . $linha['genero'] . "</td>";
    echo "<td>" . $linha['duracao'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "Nenhum aluno encontrado.";
}
// 4️⃣ Fechar a ligação
$ligacao->close();
?>
