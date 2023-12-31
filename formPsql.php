    <?php 
   
    if(isset($_POST['acao'])){
    // criando as variáveis:
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cpf = $_POST['cpf'];
        $sexo = $_POST['sexo'];
        //conexão com o banco de dados usando o PDO:

        if ($pdo = new PDO('pgsql:host=localhost;port=5432;dbname=#####;user=postgres;password=******')){
            echo "Conexão feita com sucesso!";
        }else{
            echo "Não conectado.";
        };

    // preparando o objeto com o método prepare no postgres 

    $sql = 'INSERT INTO pessoa (nome, endereco, cpf, sexo) VALUES (?, ?, ?, ?)';

    $sth = $pdo->prepare($sql);
    $sth->execute(array($nome,
                        $endereco,
                        $cpf,
                        $sexo));
    };
    echo 'Cliente inserido com sucesso!';
    ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro com o Banco de Dados mysql com o PDO</title>
</head>
<body>
<form action="formPsql.php" method="post">
    <input type="text" name="nome" id="nome" required>
    <input type="text" name="endereco" id="endereco" required>
    <input type="text" name="cpf" id="cpf" required>
    <input type="text" name="sexo" id="sexo" required>
    <input type="submit" name="acao" value="Enviar">
</form>

</body>
</html>