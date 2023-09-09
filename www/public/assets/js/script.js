$("span#modal_ver").click(function(e) {
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
        document.getElementById("modal").style.display = "none";
    });
});

$("span#modal_remover").click(function(e) {
    let objectiveId = $(this).data('id');

    $.ajax({
        url: '/objective/delete',
        type: 'POST',
        data: 'post_id=' + objectiveId,
        success: function (response) {
            document.location.reload()
        },
        error: function (error) {
            alert(error);
        }
    });
});