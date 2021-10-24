function salvarDados() {
    var tarefa = document.getElementById('tarefa').value;
    var tipo = document.getElementById('tipo').value;
    var prioridade = document.getElementById('prioridade').value;
    
    if (tarefa == "" || tipo == "" || prioridade == "") {
        document.getElementById('retorno').removeAttribute('hidden');
        document.getElementById('retorno').setAttribute('class', 'alert alert-danger');
        document.getElementById('retorno').innerHTML = "Ops! Informe todos os dados para continuar!";
    } else {
        document.getElementById('form-reminder').removeAttribute("onsubmit");
    }
}


function selecionarData() {
    var tipo = document.getElementById('tipo').value;
    if (tipo == "E") {
        document.getElementById('bloco-data').removeAttribute('hidden');
    } else {
        document.getElementById('bloco-data').setAttribute('hidden', true);
    }
}

function deletar($id) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Não será possivel reverter essa ação!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#157347',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'http://localhost/Reminder/acoes/deletar-dados.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    id: $id
                }
            }).done(function (data) {
                if (data == 1) {
                    document.getElementById('teste-' + $id).setAttribute('hidden', true);
                    Swal.fire(
                            'Sucesso!',
                            'O item foi deletado!',
                            'success'
                            )
                }
            })
        }
    })
}

function editarDados() {
    var tarefa = document.getElementById('tarefa').value;
    var tipo = document.getElementById('tipo').value;
    var prioridade = document.getElementById('prioridade').value;

    if (tarefa == "" || tipo == "" || prioridade == "") {

        document.getElementById('retorno').setAttribute('class', 'alert alert-danger');
        document.getElementById('retorno').innerHTML = "Ops! Preencha tudo para continuar!";
    } else {
        document.getElementById('form-reminder').removeAttribute("onsubmit");
    }
}