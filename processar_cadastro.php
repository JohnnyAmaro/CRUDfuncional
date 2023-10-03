<?php
// Inclua o arquivo onde você definiu a conexão
include('conexao.php');



	switch($_REQUEST["acao"]){
    case 'cadastrar':

        

        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $curso = intval($_POST['curso']);
        $tipo_usuario = $_POST['tipo_usuario'];
        $senha = md5($_POST['senha']);
        

        // Verificando se o email já existe no banco de dados
        $sql ="SELECT * FROM usuario WHERE email='$email'";
        $res =  mysqli_query($conn,$sql); //$conn->query($sql);
        
        if(mysqli_num_rows($res)>=1){
            print "<script>alert('Este email já está em uso. Tente novamente com outro email.');</script>";
            print "<script>location.href='?page=listar';</script>";
        }else{

        	// Inserindo no banco de dados
            $teste ="INSERT INTO usuario(nome, data_nasc, matricula, email, curso, tipo_usuario, senha) VALUES ('$nome', '$data_nasc', '$matricula', '$email', '$curso', '$tipo_usuario', '$senha')";

            $ress=mysqli_query($conn,$teste); //$conn->query($teste);

            if($ress==true){
                print "<script>alert('Obrigado! Seu cadastro foi recebido com êxito!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível cadastar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
        }
        break;
        	// Editando o cadastro
    case 'editar':
        $id = $_REQUEST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data_nasc = $_POST['data_nasc'];
        //$tipo_usuario = $_POST['tipo_de_usuario'];

        $sqlup ="UPDATE usuario SET NOME='$nome', EMAIL='$email', senha='$senha', data_nasc='$data_nasc'  WHERE id_usuario='$id' ";

        $resss = mysqli_query($conn,$sqlup);

        var_dump($resss);

        if($resss==true){
            print "<script>alert('Seu cadastro foi atualizado com êxito!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possível editar!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

// Excluindo o cadastro
case 'excluir':
    // Verifica se 'id' está definido antes de usá-lo
    if (isset($_REQUEST["id"])) {
        $id_usuario = $conn->real_escape_string($_REQUEST["id"]);

        $sqldel = "DELETE FROM usuario WHERE ID_USUARIO = $id_usuario";

        $res1 = mysqli_query($conn, $sqldel);

        if ($res1 == true) {
            print "<script>alert('O cadastro foi excluído com êxito!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir o cadastro!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
    } else {
        print "<script>alert('ID não definido!');</script>";
        print "<script>location.href='?page=listar';</script>";
    }
    break;

}
