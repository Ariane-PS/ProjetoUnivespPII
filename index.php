<?php
session_start();
ob_start();
include_once 'conexao1.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image:url("images/logo2.png");
            background-size: contain;            
            
        }
        div{
            background-color: rgba(10, 9, 9, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 15px;
            border-radius: 15px;
            color: #fff;
        }
        form{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 20px;
        }
        

        h1 {
            text-align: center;
            padding: 70px;
        }
        input[type="submit"] {
        background-color: rgb(60, 63, 65);
        border: none;
        padding: 15px;
        border-radius: 10px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        width: 70%; 
        transition: background-color 0.3s;
        display: flex; 
        margin: 10px auto; 
    
        }

        input[type="submit"]:hover {
        background-color: rgb(154, 11, 11);
        }

        input[type="text"], input[type="password"] {
       padding: 10px; 
        
        }


    </style>

</head>

<body>
    <?php
    //Exemplo criptografar a senha
    // echo password_hash(123456, PASSWORD_DEFAULT);
    ?>

    <h1></h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    

    if (!empty($dados['SendLogin'])) {
       
        $query_usuario = "SELECT id, nome, usuario, senha_usuario 
                        FROM usuarios 
                        WHERE usuario =:usuario  
                        LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                header("Location: home.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000; text-align: center; margin: 10px 0;'>Erro: Usuário ou senha inválida!</p>";
            }

        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000; text-align: center; margin: 10px 0;'>Erro: Usuário ou senha inválida!</p>";
        }
    

        
     }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];       
         unset($_SESSION['msg']);  }

   
    ?>
    <div>
    <form method="POST" action="">
        <label>Usuário</label>
        
        <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>"><br><br>
        
        <label>Senha</label>
        <input type="password" name="senha_usuario" placeholder="Digite a senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br><br>
        
        <input type="submit" value="Conectar-se" name="SendLogin">
    </form>
    </div>

</body>

</html>