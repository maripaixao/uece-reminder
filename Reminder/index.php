<!DOCTYPE html>
<html>
    <?php require('includes/header.php') ?>

    <body>
        <style>
            
        </style>
        <div class="container">
            <div class="row margin-top-20">
                <div class="offset-md-3 col-md-8">
                    <div class="row">

                        <?php
                        if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == 'salvo') {
                                echo "<div class='col-md-10 alert alert-success'>
                                    Tarefa salva com sucesso!
                                  </div>";
                            } else if ($_GET['msg'] == 'edit') {
                                echo "<div class='col-md-10 alert alert-info'>
                                    Tarefa editada com sucesso!
                                  </div>";
                            } else {
                                echo "<div class='col-md-10 alert alert-danger'>
                                    Erro ao salvar tarefa!
                                  </div>";
                            }
                        }
                        ?>

                        <div class="row col-md-10" id="retorno">
                            <div class="col-md-6" id="retorno"></div>

                            <form onsubmit="return false" method="POST" action="acoes/salvar-dados.php" id="form-reminder">
                        </div>
                        
                        <div class="col-md-10" style="margin-top: 20px">
                            <label class="form-label">TAREFA</label>
                            <input type="text" id="tarefa" name="tarefa" class="form-control">
                        </div>

                        <div class="row" style="margin-top:25px">
                            <div class="col-md-5">
                                <label class="form-label">TIPO</label>
                                <select class="form-select" id="tipo" name="tipo" onchange="selecionarData()">
                                    <option value="">Selecione...</option>
                                    <option value="A">Atividade</option>
                                    <option value="E">Evento</option>
                                </select>
                            </div>

                            <div class="col-md-5" style="margin-left: 20px">
                                <label class="form-label">PRIORIDADE</label>
                                <select class="form-select" id="prioridade" name="prioridade">
                                    <option value="">Selecione...</option>
                                    <option value="baixa">Baixa</option>
                                    <option value="regular">Regular</option>
                                    <option value="alta">Alta</option>
                                    <option value="importante">Extremamente Importante</option>
                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin-top:25px" id="bloco-data" hidden>
                            <div class="col-md-5">
                                <label class="form-label">DATA INÍCIO</label>
                                <input type="date" id="dInicio" name="dInicio" class="form-control">
                            </div>

                            <div class="col-md-5" style="margin-left: 20px">
                                <label class="form-label">DATA FIM</label>
                                <input type="date" id="dFim" name="dFim" class="form-control">
                            </div>
                        </div>

                        <div class="offset-md-3 col-md-4" style="margin-top: 25px">
                            <button class="btn btn-success col-md-12" onclick="salvarDados()">Salvar</button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="row info" style="margin-top: 10px">
                <div class="offset-md-1 col-md-10 margin-top-50">
                    <h3>Tarefas Cadastradas</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TAREFA</th>
                                <th>TIPO</th>
                                <th>PRIORIDADE</th>
                                <th>AÇÕES</th>
                        </thead>
                        <tbody class="info">
                            <?php
                            require('includes/conexao.php');
                            $sql = "SELECT * FROM tarefas ORDER BY id DESC";
                            $resultado = mysqli_query($conexao, $sql);
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                ?>

                                <tr id="teste-<?php echo $row['id'] ?>">
                                    <th><?php echo $row['id'] ?></th>
                                    <th><?php echo $row['tarefa'] ?></th>
                                    <th><?php echo $row['tipo'] ?></th>
                                    <th><?php echo $row['prioridade'] ?></th>
                                    <th>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="deletar('<?php echo $row['id'] ?>')">Excluir</button>
                                        <a href="editar-tarefas.php?id=<?php echo $row['id'] ?>">
                                            <button class="btn btn-info btn-sm">Editar</button>
                                        </a>
                                    </th>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </body>
</html>
