<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);
    $experiencias = $_POST["experiencia"];
    $formacoes = $_POST["formacao"];

    $conteudo = "==============================\n";
    $conteudo .= "Nome: $nome\n";
    $conteudo .= "E-mail: $email\n";
    $conteudo .= "Telefone: $telefone\n";
    $conteudo .= "Experiências:\n";
    foreach ($experiencias as $exp) {
        $conteudo .= "- $exp\n";
    }
    $conteudo .= "Formações:\n";
    foreach ($formacoes as $form) {
        $conteudo .= "- $form\n";
    }
    $conteudo .= "Enviado em: " . date("d/m/Y H:i:s") . "\n\n";

    file_put_contents("envios.txt", $conteudo, FILE_APPEND);

    // Redireciona para a página de geração de PDF
    session_start();
    $_SESSION['curriculo'] = [
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'experiencias' => $experiencias,
        'formacoes' => $formacoes
    ];

    header("Location: gera_pdf.php");
    exit;
}
?>
