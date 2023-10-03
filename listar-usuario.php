<h1>Listar Usuários</h1>
<?php
    $sql = "SELECT * FROM usuario";
    
    $res = $conn->query($sql);

    if (!$res) {
        die("Erro na consulta: " . $conn->error);
    }

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome</th>";
        echo "<th>E-mail</th>";
        echo "<th>Data de Nascimento</th>";
        echo "<th>Ações</th>";
        echo "</tr>";

        while ($row = $res->fetch_object()) {
            echo "<tr>";
            echo "<td>" . (isset($row->ID_USUARIO) ? htmlspecialchars($row->ID_USUARIO) : 'N/A') . "</td>";
            echo "<td>" . (isset($row->NOME) ? htmlspecialchars($row->NOME) : 'N/A') . "</td>";
            echo "<td>" . (isset($row->EMAIL) ? htmlspecialchars($row->EMAIL) : 'N/A') . "</td>";
            echo "<td>" . (isset($row->DATA_NASC) ? htmlspecialchars($row->DATA_NASC) : 'N/A') . "</td>";
            echo "<td>
                    <button onclick=\"location.href='?page=editar&id=" . (isset($row->ID_USUARIO) ? $row->ID_USUARIO : '') . "'\" class='btn btn-success'>Editar</button>    
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . (isset($row->ID_USUARIO) ? $row->ID_USUARIO : '') . "';}else{false;}\" class='btn btn-danger'>Excluir</button>    
                    </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }
?>
