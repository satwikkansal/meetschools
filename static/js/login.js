$(document).ready(function () {
    $('#login-form').submit(function (e) {
        e.preventDefault();
    }).validate({
        onfocusout: function (element) {
            this.element(element);
        },
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                minlength: 6,
                required: true
            }
        },
        highlight: function (label) {
            $(label).closest(".form-group").addClass('has-error');
            $(label).closest(".form-group").removeClass('has-success');
            $(label).closest('input').addClass('error');
            $(label).closest('input').removeClass('valid');
        },
        success: function (label) {
            $(label).closest(".form-group").addClass('has-success');
            $(label).closest(".form-group").removeClass('has-error');
            $(label).closest('input').addClass('valid');
            $(label).closest('input').removeClass('error');
        },
        submitHandler: function () {
            var data = $('#login-form').serialize();
            var url = "/login/verify_ajax/user";
           // NProgress.start();
            $('.loading_image').show();
            $.ajax(url, {
                data: data,
                success: login_success,
                error: onError,
                type: "POST"
            });
            return false;
        }
    });
});

var login_success = function (data) {
    try {
       // NProgress.done();
        data = JSON.parse(data);
        if (!data.success) {
            throw_error(data.errorThrown);
        } else {
            window.location.href = data.successPage;
        }
    } catch (e) {
        throw_error(e);
       // NProgress.done();
        $('.loading_image').hide();
    }
};

var onError = function (data) {
    
};

