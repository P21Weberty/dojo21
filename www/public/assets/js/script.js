$("span#modal_remover").click(function(e) {
    var objectiveId = $(this).data('id');

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