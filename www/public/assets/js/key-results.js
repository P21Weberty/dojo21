let KeyResult = (() => {
    let handleForm = () => {
        $('#key-result-form').submit(function (event) {
            let keyResultForm = $(this).serialize();
            event.preventDefault();
            $.ajax({
                url: '/key-results/save',
                type: 'POST',
                data: keyResultForm,
                success: function (data) {
                    document.location.href = "tela_inicial.php"
                },
                error: function (data) {
                    alert(data)
                }
            });
        });
    }

    return {
        init: () => {
            handleForm();
        }
    }
})();
$(document).ready(() => {
    KeyResult.init();
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