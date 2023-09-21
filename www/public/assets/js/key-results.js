let KeyResult = (() => {
    let handleForm = () => {
        $("span#modal-add").click(function (e) {
            $('#key_modal').modal('show');

            $("span.close_modal").click(function () {
                document.getElementById("key_modal").style.display = "none";
            });

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
        });
    }

    let handleEdit = (key_result_id) => {
        $('#key_modal').modal('show');

        $("span.close_modal").click(function () {
            document.getElementById("key_modal").style.display = "none";
        });

        $('#update').submit(function (event) {
            let keyForm = $(this).serialize();
            keyForm =  keyForm + ("&&id=" + key_result_id);
            alert("AQUI")

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

    let handleRemove = (objectiveId) => {
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

    return {
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