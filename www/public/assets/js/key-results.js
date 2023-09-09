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