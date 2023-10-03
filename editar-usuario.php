<h1>Editar Usuário</h1>

<?php
    // Verifica se 'ID_USUARIO' está definido antes de usá-lo
    if (isset($_GET['id'])) {
        $id_usuario = $conn->real_escape_string($_GET['id']);

        // Consulta SQL para obter os dados do usuário
        $sql = "SELECT * FROM usuario WHERE ID_USUARIO = $id_usuario";
        $resx = $conn->query($sql);

        if (!$resx) {
            die("Erro na consulta: " . $conn->error);
        }

        // Verifica se há resultados
        if ($resx->num_rows > 0) {
            // Obtém os dados do usuário
            $row = $resx->fetch_object();
?>

<!-- Formulário para edição do usuário -->
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $row->ID_USUARIO; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row->NOME; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row->EMAIL; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" value="<?php echo $row->DATA_NASC; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn-primary">Enviar</button>
    </div>
</form>

<?php
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "ID não definido";
    }
?>
