var is_showing_toast = false;

$(document).ready(function () {
    $("#page_loading_notification").hide();

    validate();
    additional_validations();

    var footer_height = $('#footer').outerHeight();
    $('#content').css('padding-bottom', footer_height);

    var window_height = window.innerHeight;
    $('#wrapper').css('min-height', footer_height + window_height - 40);

    $(".close_action").click(function () {
        hide_modals();
    });

    $(document).on('click', '.image_ad', function () {
        var id = $(this).attr('id');
        var url = "/cms/ad_clicks/" + id;
        $.ajax(url, {
            type: "POST"
        });
    });

    $(document).on('click', '.fa-question-circle', function () {
        if (window.innerWidth < 768) {
            $('.toast-content').text($(this).attr("title"));
            if (!is_showing_toast) {
                is_showing_toast = true;
                $('.toast').fadeIn(400).delay(3000).fadeOut(400, function () {
                    is_showing_toast = false;
                });
            }
        }
    });

    if (window.innerWidth > 768) {
        $('.phone_number').css('color', '#333');
        $('.phone_number').css('text-decoration', 'none');
        $('.phone_number').removeAttr('href');
    }
});

$(function () {
    $(".dropdown-hover").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).show();
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).hide();
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");
            });
});

$(window).resize(function () {
    var height = $('#footer').outerHeight();
    $('#content').css('padding-bottom', height);
});

function hide_modals() {
    $("#error").hide();
    $("#semi_error_modal").hide();
    $("#error_modal").hide();
    $("#semi_success_modal").hide();
    $("#success_modal").hide();
    $("#alert_modal").hide();
    $('.loading_image').hide();
}

var onError = function () {
    NProgress.done();
    $('.loading_image').hide();
    show_error("Oops! Sorry, something went wrong. Please try again and if the problem persists, please write to support@internshala.com and we'd be happy to assist.");
};

function show_error(errorThrown) {
    $('.loading_image').hide();
    var content = "<div> <a title='Close' id='close' class='close_error'>X</a>" + errorThrown + "</div>"
    $("#error").show().html(content).slideDown(500);
    $('.close_error').click(function () {
        $("#error").slideUp(500);
    });
}

function failure_notification(errorThrown) {
    $('.loading_image').hide();
    var content = "<div>" + errorThrown + "</div>";
    $("#failure_notification").show().html(content).slideDown(500);
    var delay = 6000;
    setTimeout(function () {
        $("#failure_notification").slideUp(500);
        //your code to be executed after 1 seconds
    }, delay);
}

function success_notification(message) {
    $('.loading_image').hide();
    var content = "<div>" + message + "</div>";
    $("#success_notification").show().html(content).slideDown(500);
    var delay = 6000;
    setTimeout(function () {
        $("#success_notification").slideUp(500);
    }, delay);
}

function general_notification(message) {
    var content = "<div>" + message + "</div>";
    $("#general_notification").show().html(content).slideDown(500);
}

function throw_validation_error(validationError) {
    $.each(validationError, function (index, value) {
        if (index === "no_input") {
            show_error(value);
            $('.loading_image').hide();
            return true;
        }
        var label = $("<label>").text(value);
        if (index === "selected_categories_for_user_preference") {
            var id = "multiselect_category";
        } else {
            var id = $("[name=" + index + ']').closest('input').attr('id');
            if (typeof id == 'undefined') {
                var id = $("[name=" + index + ']').closest('textarea').attr('id');
            }
            if (typeof id == 'undefined') {
                var id = $("[name=" + index + ']').closest('select').attr('id');
            }
        }

        label.attr({class: 'help-block form-error', id: id + '-error', for : id});
        if (index === "toc") {
            label.insertAfter("#label_toc");
        } else if (index === "phone_primary" || index === "country_code") {
            label.insertAfter("#phone_primary");
        } else {
            label.insertAfter("#" + id + "");
        }
        $(label).parent().addClass('has-error');
        $(label).parent().removeClass('has-success');
        $(label).closest('input').addClass('error');
        $(label).closest('input').removeClass('valid');
        $('.loading_image').hide();
    });

}

function throw_semi_error(errorThrown) {
    if (errorThrown.validationError) {
        throw_validation_error(errorThrown.validationError);
        return;
    }

    $("#semi_error_modal .text-message").html(errorThrown);
    $("#semi_error_modal").show();

}

function throw_error(errorThrown, errorPage) {
    if (!errorPage) {
        throw_semi_error(errorThrown);
        return;
    }

    $("#error_modal .text-message").html(errorThrown);
    $("#error_modal .btn").attr("href", errorPage);
    $("#error_modal").show();
}

function throw_semi_success(successMsg) {
    $("#semi_success_modal .text-message").html(successMsg);
    $("#semi_success_modal").show();
}

function throw_success(successMsg, successPage) {
    if (!successPage) {
        throw_semi_success(successMsg);
        return;
    }
    $("#success_modal .text-message").html(successMsg);
    $("#success_modal a").attr("href", successPage);
    $("#success_modal").show();
}

function internshala_alert(message, page) {
    $("#alert_modal .text-message").html(message);
    $("#alert_modal a").attr("href", page);
    if (page) {
        $("#alert_modal_backdrop").show();
    }
    $("#alert_modal").show();
}

function call_autocomplete(id, request_for, multiselect, log_id, is_approved_companies) {
    var selected = [];

    $("#" + id)
            .bind("keydown", function (event) {
                if (event.keyCode === $.ui.keyCode.TAB &&
                        $(this).data("ui-autocomplete").menu.active) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                source: function (request, response) {
                    var where_condition = $("#" + id).attr("where_condition");
                    if (typeof where_condition !== 'undefined') {
                        where_condition = "/" + where_condition;
                    } else {
                        where_condition = "/0";
                    }
                    var where_params = $("#" + id).attr("where_params");
                    if (typeof where_params !== 'undefined') {
                        where_params = "/" + where_params;
                    } else {
                        where_params = "/0";
                    }

                    if (is_approved_companies) {
                        is_approved_companies = "/" + is_approved_companies;
                    } else {
                        is_approved_companies = "";
                    }
                    var term = extractLast(request.term);
                    $.ajax({
                        type: "POST",
                        contentType: "application/json; charset=utf-8",
                        url: "/autocomplete/" + request_for + "/" + term + where_condition + where_params + is_approved_companies,
                        dataType: "json",
                        success: function (data) {
                            console.log(data.result);
                            response(data.result);
                        }
                    });
                },
                minLength: 3,
                focus: function () {
                    return false;
                },
                select: function (event, ui) {
                    if (multiselect) {
                        var terms = split(this.value);
                        terms.pop();
                        terms.push(ui.item.value);
                        terms.push("");
                        this.value = terms.join(",");
                        return false;
                    }
                }
            });

    function extractLast(term) {
        return split(term).pop();
    }

    function split(val) {
        return val.split(/,\s*/);
    }

    function log(message) {
        $("<div>").text(message).prependTo("#" + log_id);
        $("#" + log_id).scrollTop(0);
    }

    function diff(A, B) {
        return A.filter(function (a) {
            return B.indexOf(a) == -1;
        });
    }

    return selected;
}

function call_autocomplete_without_ajax(id, array, multiselect, log_id, result_id) {
    var cache = [];
    var temp = [];
    var temp1 = [];
    var selected = [];

    $("#" + id)
            .bind("keydown", function (event) {
                if (event.keyCode === $.ui.keyCode.TAB &&
                        $(this).data("ui-autocomplete").menu.active) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                source: function (request, response) {
                    var term = extractLast(request.term);
                    response($.ui.autocomplete.filter(array, term).slice(0, 10));
                },
                focus: function () {
                    return false;
                },
                select: function (event, ui) {
                    if (multiselect) {
                        var terms = split(this.value);
                        terms.pop();
                        terms.push(ui.item.value);
                        terms.push("");
                        this.value = terms.join(",");
                        return false;
                    }
                }
            });

    function extractLast(term) {
        return split(term).pop();
    }

    function split(val) {
        return val.split(/,\s*/);
    }

    function log(message) {
        $("<div>").text(message).prependTo("#" + log_id);
        $("#" + log_id).scrollTop(0);
    }

    function diff(A, B) {
        return A.filter(function (a) {
            return B.indexOf(a) == -1;
        });
    }

    return selected;
}

function validate() {
    $.validator.addMethod("email", function (email, element) {
        return this.optional(element) || (email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/));
    }, "Please enter a valid email address");

    $.validator.addMethod("countrycode", function (country_code, element) {
        return this.optional(element) || (country_code.match(/^[/\s+/][0-9]+$/) && country_code.length <= 5);
    }, "Please specify a valid country code starting with +");

    $.validator.addMethod("mobilenumber", function (mobile_number, element) {
        return this.optional(element) || mobile_number.match(/^[789][0-9]{9}$/);
    }, "Please specify a valid phone number");

    $.validator.addMethod("onlynumbers", function (only_numbers, element) {
        return this.optional(element) || only_numbers.match(/^[0-9]+$/);
    }, "Please enter only numbers");

    $.validator.addMethod("nonumbers", function (no_numbers, element) {
        return this.optional(element) || no_numbers.match(/^[^0-9]+$/);
    }, "Please do not enter any number");

    $.validator.addMethod("onlyalpha", function (only_alpha, element) {
        return this.optional(element) || (only_alpha.match(/^[a-zA-Z ]+$/));
    }, "Please enter only alphabets");

    $.validator.addMethod("decimalnumbers", function (decimal_numbers, element) {
        return this.optional(element) || (decimal_numbers.match(/^[0-9]+[.]+[0-9]+$/) || decimal_numbers.match(/^[0-9]+$/));
    }, "Please enter only number or decimal number");

    $.validator.addMethod("basicstring", function (basic_string, element) {
        return this.optional(element) || basic_string.match(/^[a-zA-Z]+[a-zA-Z .(),&']*$/) || basic_string === "10th" || basic_string === "12th" || basic_string.indexOf("5 Years") !== -1;
    }, "Please enter only valid characters");

    $.validator.addMethod("valid_degree", function (degree, element) {
        return this.optional(element) || degree.match(/^[a-zA-Z]+[a-zA-Z .(),&']*$/) || degree === "10th" || degree === "12th" || degree.indexOf("5 Years") !== -1;
    }, "Please enter only valid characters");

    $.validator.addMethod("valid_stream", function (stream, element) {
        return this.optional(element) || stream.match(/^[a-zA-Z]+[a-zA-Z .(),&']*$/);
    }, "Please enter only valid characters");

    $.validator.addMethod("valid_institute", function (institute, element) {
        return this.optional(element) || institute.match(/^[a-zA-Z]+[a-zA-Z .(),&']*$/);
    }, "Please enter only valid characters");

    $.validator.addMethod("valid_city", function (city, element) {
        return this.optional(element) || city.match(/^[a-zA-Z]+[a-zA-Z ,]*$/);
    }, "Please enter only valid characters");

    $.validator.addMethod('mindate', function (v, element, min_date) {
        var selected = $(element).datepicker('getDate');
        return this.optional(element) || min_date <= selected;
    }, 'Please specify a date greater than today');

    $.validator.addMethod('maxdate', function (v, element, max_date) {
        var selected = $(element).datepicker('getDate');
        return this.optional(element) || max_date >= selected;
    }, 'Please specify a date within range');

    $.validator.addMethod("valid_external_link", function (external_link, element) {
        return this.optional(element) || external_link.match(/^http/);
    }, "Please enter valid a url (url must start with http://)");

    $.validator.addMethod('filesize', function (value, element, param) {
        // param = size (en bytes)
        // element = element to validate (<input>)
        // value = value of the element (file name)
        return this.optional(element) || (element.files[0].size <= param)
    }, "Please obey the file size");
}

/*----------------------------------------------File validation---------------------------------------------*/

function checkLogoExtension()
{
    var fileTypes = new Array('.jpeg', '.jpg', '.png', '.gif', '.bmp'); // valid filetypes
    var fileName = document.getElementById('logo').value;
    var extension = fileName.substr(fileName.lastIndexOf('.'), fileName.length);

    if (fileName)
    {
        var valid_image = 0;
        for (var i in fileTypes)
        {
            if (fileTypes[i] == extension)
            {
                valid_image = 1;
                break;
            }
        }
        if (valid_image != 1)
        {
            throw_semi_error('Please upload a file with a valid extension.');
            return false;
        }

        var size = ($("#logo")[0].files[0].size / 1024);
        size = size / 1024;
        if (size > 1)
        {
            throw_semi_error("File should be less than 1MB!");
            return false;
        }
    }
    return true;
}


function checkAttachmentValidation()
{
    var fileTypes = new Array('.zip', '.pdf', '.doc', '.docx', '.jpeg', '.jpg', '.png'); // valid filetypes
    var fileName = document.getElementById('mail_attachment').value;
    var extension = fileName.substr(fileName.lastIndexOf('.'), fileName.length);

    if (fileName)
    {
        var valid = 0;
        for (var i in fileTypes)
        {
            if (fileTypes[i] == extension)
            {
                valid = 1;
                break;
            }
        }
        if (valid != 1)
        {
            throw_semi_error('This extension is not allowed!');
            return;
        }

        var size = ($("#mail_attachment")[0].files[0].size / 1024);
        size = size / 1024;
        if (size > 1)
        {
            throw_semi_error("File should be less than 1MB!");
            return;
        }
    }
}


function countdown_timer(id_display) {
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    document.getElementById(id_display).innerHTML = seconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById(id_display).innerHTML = "0";
    } else {
        seconds--;
    }
}

function additional_validations() {
    // Accept a value from a file input based on a required mimetype
    $.validator.addMethod("accept", function (value, element, param) {
        // Split mime on commas in case we have multiple types we can accept
        var typeParam = typeof param === "string" ? param.replace(/\s/g, "").replace(/,/g, "|") : "image/*",
                optionalValue = this.optional(element),
                i, file;

        // Element is optional
        if (optionalValue) {
            return optionalValue;
        }

        if ($(element).attr("type") === "file") {
            // If we are using a wildcard, make it regex friendly
            typeParam = typeParam.replace(/\*/g, ".*");

            // Check if the element has a FileList before checking each file
            if (element.files && element.files.length) {
                for (i = 0; i < element.files.length; i++) {
                    file = element.files[i];

                    // Grab the mimetype from the loaded file, verify it matches
                    if (!file.type.match(new RegExp(".?(" + typeParam + ")$", "i"))) {
                        return false;
                    }
                }
            }
        }

        // Either return true because we've validated each file, or because the
        // browser does not support element.files and the FileList feature
        return true;
    }, $.validator.format("Please enter a value with a valid Filetype."));


    // Older "accept" file extension method. Old docs: http://docs.jquery.com/Plugins/Validation/Methods/accept
    $.validator.addMethod("extension", function (value, element, param) {
        param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
        return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
    }, $.validator.format("Please enter a value with a valid extension."));
}

function make_field_readonly(id) {
    $(document).on("focusin", id, function (event) {
        $(this).prop('readonly', true);
    });

    $(document).on("focusout", id, function (event) {
        $(this).prop('readonly', false);
    });
}

function reset_form_validations(form_id) {
    $("#" + form_id).validate().resetForm();
    $('.form-control').removeClass('error');
    $('.form-control').removeClass('valid');
    $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-success');
}

function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    if (elem.length) {
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return (elemTop <= docViewBottom);
    } else {
        return false;
    }
}

function get_cookie(Name) {
    var search = Name + "=";
    var returnvalue = "";
    if (document.cookie.length > 0) {
        offset = document.cookie.indexOf(search);
        // if cookie exists
        if (offset != -1) {
            offset += search.length;
            // set index of beginning of value
            end = document.cookie.indexOf(";", offset);
            // set index of end of cookie value
            if (end == -1)
                end = document.cookie.length;
            returnvalue = unescape(document.cookie.substring(offset, end));
        }
    }
    return returnvalue;
}