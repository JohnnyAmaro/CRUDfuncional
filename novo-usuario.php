<!DOCTYPE html>
<html>
<head>
    <title>Novo Usuário</title>
</head>
<body>
    <h1>Novo Usuário</h1>
    <form action="processar_cadastro.php" method="POST">

        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Data de Nascimento</label>
            <input type="date" name="data_nasc" class="form-control">
        </div>

        <div class="mb-3">
            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="curso">Curso:</label>
            <select id="curso" name="curso" class="form-control" required>
                <option value="1">D.S. (Desenvolvimento de Software)</option>
                <option value="2">Logística</option>
                <option value="3">Administração</option>
                <option value="4">Recursos Humanos</option>
                <option value="5">Contabilidade</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_de_usuario">Tipo de Usuário:</label>
            <select id="tipo_usuario" name="tipo_usuario" class="form-control" required>
                <option value="1">Usuário</option>
                <option value="2">Administrador</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn-primary">Enviar</button>
        </div>
    </form>
</body>
</html>
