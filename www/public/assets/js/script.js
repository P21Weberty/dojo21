$("span#modal_ver").click(function (e) {
    let objectiveId = $(this).data('id');

    $.ajax({
        url: "/objective/lista",
        type: 'post',
        data: 'objective_id=' + objectiveId,
        success: function (response) {
            $('.close').after(response);
            document.getElementById("modal").style.display = "block";
        },
        error: function (response) {
            alert("Não há resultados chaves cadastrados!")
        }
    });

    $("span.close").click(function () {
        $('.modaltable').remove()
        document.getElementById("modal").style.display = "none";
    });
});

$("span#modal_remover").click(function (e) {
    let objectiveId = $(this).data('id');

    $.ajax({
        url: '/objective/delete',
        type: 'POST',
        data: 'post_id=' + objectiveId,
        success: function (response) {
            document.location.href = "tela_inicial.php"
        },
        error: function (error) {
            alert(error);
        }
    });
});

$("span#modal_add").click(function (e) {
    $('#key_add_modal').modal('show');

    $("span.close_add_modal").click(function () {
        document.getElementById("key_add_modal").style.display = "none";
    });
});

function modal_editar(key_result_id) {
    $('#key_update_modal').modal('show');

    $("span.close_update_modal").click(function () {
        document.getElementById("key_update_modal").style.display = "none";
    });

    $('#key-result-form-update').submit(function (event) {
        let keyForm = $(this).serialize();
        keyForm =  keyForm + ("&&id=" + key_result_id);

        event.preventDefault();
        $.ajax({
            url: '/key-results/edit',
            type: 'POST',
            data: keyForm,
            success: function (response) {
                document.location.href = "tela_inicial.php"
            },
            error: function (error) {
                document.location.href = "tela_inicial.php"
            }
        });
    });
}

function remover(objectiveId) {

    $.ajax({
        url: '/key-results/delete',
        type: 'POST',
        data: 'key_result_id=' + objectiveId,
        success: function (response) {
            document.location.href = "tela_inicial.php"
        },
        error: function (error) {
            alert(error);
        }
    });
}