let Login = (() => {

    let handleForm = () => {
        $('#login-form').submit(function (event) {
            event.preventDefault();
            let loginForm = $(this).serialize();

            $.ajax({
                url: '/user/login',
                type: 'POST',
                data: loginForm,
                success: function (data) {
                    window.location.href = "tela_inicial.php";
                },
                error: function (data){
                    alert("Dados incorretos!")
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
   Login.init();
});