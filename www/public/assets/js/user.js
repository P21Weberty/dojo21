let User = (() => {
    let handleForm = () => {
        $('#user-form').submit(function (event) {
            let userForm = $(this).serialize();

            event.preventDefault();
            $.ajax({
                url: '/user/save',
                type: 'POST',
                data: userForm,
                success: function (data) {
                    window.location.href = 'index.php';
                },
                error: function (data){
                    alert("Campos inválidos")
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
   User.init();
});