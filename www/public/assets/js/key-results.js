let KeyResult = (() => {
    let handleForm = (objective_id) => {
        $("span#modal-add").click(function (e) {
            $('#key-add-modal').modal('show');

            $("span.close_add_modal").click(function () {
                document.getElementById("key-add-modal").style.display = "none";
            });

            $('#key-result-form').submit(function (event) {
                let keyResultForm = $(this).serialize();
                alert(keyResultForm)
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
        });
    }

    let handleStatus = (key_result_id) => {
        $.ajax({
            url: '/key-results/status',
            type: 'POST',
            data: 'key_result_id=' + key_result_id,
            success: function (response) {
                document.location.href = "tela_inicial.php"
            },
            error: function (error) {
                document.location.href = "tela_inicial.php"
            }
        });
    }

    let handleEdit = (key_result_id) => {
        $('#key-update-modal').modal('show');

        $("span.close_update_modal").click(function () {
            document.getElementById("key-update-modal").style.display = "none";
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

    let handleRemove = (key_result_id) => {
        $.ajax({
            url: '/key-results/delete',
            type: 'POST',
            data: 'key_result_id=' + key_result_id,
            success: function (response) {
                document.location.href = "tela_inicial.php"
            },
            error: function (error) {
                alert(error);
            }
        });
    }

    return {
        handleStatus:handleStatus,
        handleEdit:handleEdit,
        handleRemove:handleRemove,
        init: () => {
            handleForm();
        }
    }
})();

$(document).ready(function (e) {
    KeyResult.init();
});