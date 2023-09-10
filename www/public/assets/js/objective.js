let Objective = (() => {
    let handleForm = () => {
        $('#objective-form').submit(function (event) {
            let userForm = $(this).serialize();
            event.preventDefault();
            $.ajax({
                url: '/objective/save',
                type: 'POST',
                data: userForm,
                success: function (data) {
                    document.location.href = "tela_inicial.php"
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
    Objective.init();
});

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