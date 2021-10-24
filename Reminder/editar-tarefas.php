<?php
require('includes/conexao.php');
$id = $_GET['id'];

$sql = "SELECT * FROM tarefas WHERE id=$id";

$resultado = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    $tarefa = $row['tarefa'];
    $tipo = $row['tipo'];
    $prioridade = $row['prioridade'];
    $id = $row['id'];
}
require('includes/header.php');
?>
<body>
    <div class="container">
        <div class="row margin-top-50">
            <div class="offset-md-3 col-md-8">
                <div class="row">

                    <?php
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == 'salvo') {
                            echo "<div class='col-md-8 alert alert-success'>
                                    Tarefa salva com sucesso!
                                  </div>";
                        } else if ($_GET['msg'] == 'edit') {
                            echo "<div class='col-md-8 alert alert-info'>
                                    Tarefa editada com sucesso!
                                  </div>";
                        } else {
                            echo "<div class='col-md-8 alert alert-danger'>
                                    Erro ao salvar tarefa!
                                  </div>";
                        }
                    }
                    ?>

                    <div class="col-md-10" id="retorno">
                        <div class="col-md-6" id="retorno"></div>

                        <form onsubmit="return false" method="POST" action="acoes/salvar-dados.php" id="form-reminder">
                    </div>

                    <div class="col-md-10" style="margin-top: 50px">
                        <label class="form-label">TAREFA</label>
                        <input type="text" id="tarefa" name="tarefa" class="form-control" value='<?php echo $tarefa ?>'>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="col-md-5">
                            <label class="form-label">TIPO</label>
                            <select class="form-select" id="tipo" name="tipo" onchange="selecionarData()">
                                <?php
                                if ($tipo == "A") {
                                    echo "<option value='A' selected>Atividade</option>
                                              <option value='E'>Evento</option>";
                                } else {
                                    echo "<option value='E' selected>Evento</option>
                                              <option value='A'>Atividade</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-5" style="margin-left: 20px">
                            <label class="form-label">PRIORIDADE</label>
                            <select class="form-select" id="prioridade" name="prioridade">
                                <?php
                                if ($prioridade == "baixa") {
                                    echo "<option value='baixa' selected>Baixa</option>
                                              <option value='regular'>Regular</option>
                                              <option value='alta'>Alta</option>
                                              <option value='importante'>Extremamente Importante</option>";
                                } else if ($prioridade == "regular") {
                                    echo "<option value='regular' selected>Regular</option>
                                              <option value='alta'>Alta</option>
                                              <option value='importante'>Extremamente Importante</option>
                                              <option value='baixa'>Baixa</option>";
                                } else if ($prioridade == "alta") {
                                    echo "<option value='alta' selected>Alta</option>
                                              <option value='importante'>Extremamente Importante</option>
                                              <option value='baixa'>Baixa</option>
                                              <option value='regular'>Regular</option>";
                                } else  {
                                    echo "<option value='importante'selected>Extremamente Importante</option>
                                              <option value='alta'>Alta</option>
                                              <option value='baixa'>Baixa</option>
                                              <option value='regular'>Regular</option>";
                                }
                                ?>} 
                            </select>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px" id="bloco-data" hidden>
                        <div class="col-md-5">
                            <label class="form-label">DATA INÍCIO</label>
                            <input type="date" id="dInicio" name="dInicio" class="form-control">
                        </div>

                        <div class="col-md-5" style="margin-left: 20px">
                            <label class="form-label">DATA FIM</label>
                            <input type="date" id="dFim" name="dFim" class="form-control">
                        </div>
                    </div>

                    <div class="offset-md-3 col-md-4" style="margin-top: 30px">
                        <button class="btn btn-success col-md-12" onclick="editarDados()">Salvar Edição</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
</body>
