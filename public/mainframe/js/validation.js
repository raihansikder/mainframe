/**
 *   Function enables the js to run front-end validation.
 */
function enableValidation(form_name, successHandlerFunction = false) {

    var form = $('form[name=' + form_name + '] ');
    var btn = form.find(' button[type=submit]');

    // Change the button type from submit to button and inject ret=json input
    btn.attr('type', 'button');
    form.find('input[name=ret]').val('json');

    // Instantiate validationEngine
    form.validationEngine({prettySelect: true, promptPosition: "topLeft", scroll: true,});

    // Run validation on submit button click.
    btn.click(function () {
        $('.collapse').collapse('show'); // Un-collapse all accordion .
        var btnText = $(this).html();    // Preserve initial button
        $(this).html('Working...').addClass('disabled');
        /********************************************************************************/

        // Check front-end validations first
        if (form.validationEngine('validate') == false) {
            $(this).html(btnText).removeClass('disabled');
            return; // Note: exits validation logic here.
        }

        // If all frontend validations are ok then only ajax validation will execute
        form.validationEngine('hideAll');
        $.ajax({
            datatype: 'json',
            method: "POST",
            url: form.attr('action'),
            data: form.serialize()
        }).done(function (ret) {

            ret = parseJson(ret); // Just in case of exception
            // Reflect validation result
            if (ret.status === 'fail') { // Show validation error messages on fail.
                showFieldValidationPrompts(ret, false); // Show validation alert on each field
            }

            // Load messages in modal and show.
            loadMsg(ret);
            $('#msgModal').modal('show');

            // Handle success. Redirect or pass to successHandlerFunction.
            if (ret.status == 'success') {
                if (successHandlerFunction) {
                    successHandlerFunction(ret);
                } else if (ret.hasOwnProperty('redirect') && (ret.redirect !== null && ret.redirect.length > 0)) {
                    window.location.replace(ret.redirect);
                }
            }
        }).error(function (ret, textStatus, errorThrown) { // Gracefully handle 422, 400 error responses
            showFieldValidationPrompts(ret.responseJSON, false); // Show validation alert on each field
            loadMsg(ret.responseJSON); //
            $('#msgModal').modal('show');


        }).always(function (ret, textStatus, errorThrown) {
            btn.html(btnText).removeClass('disabled'); // Re-enable the save button

        });

    });
}

/**
 * show validation red boxes against each field
 * Fields are targeted based on ID. So they should have the id field that is same as the name field
 * @param ret
 * @param showAlert
 */
function showFieldValidationPrompts(ret, showAlert) {
    var str = '';
    if (ret.hasOwnProperty('validation_errors')) {
        $.each(ret.validation_errors, function (k, v) {
            str += "\n" + k + ": " + v;
            // $("#label_" + k).validationEngine('showPrompt', v, 'error');
            $("*[id=" + k + "]").validationEngine('showPrompt', v, 'error');

        });
    }
    if (showAlert) {
        alert(ret.status + " - " + ret.message + "\n" + str);
    }
}

/*
 *  loadMsg clears and loads all new error, message and success note in the  modal that shows just after ajax submit.
 */
function loadMsg(ret) {
    $('.ajaxMsg').empty().hide(); // first hide all blocks

    var hasError = false;
    var hasSuccess = false;
    var hasMessage = false;

    if (ret.status == 'fail') {
        hasError = true;
        $('div#msgError').append('<h4 class="text-red">Error - ' + ret.message + '</h4>');
    } else if (ret.status == 'success') {
        hasSuccess = true;
        // $('div#msgSuccess').append('<h4>Success</h4>');
        $('div#msgSuccess').append('<h4 class="text-green">Success - ' + ret.message + '</h4>');
    }

    if (ret.hasOwnProperty('errors')) {
        $.each(ret.errors, function (k, v) {
            if (v.length) {
                hasError = true;
                $('div#msgError').append(v + '<br/>');
            }
        });
    }

    // Get both validation and business error messages from session and append in error msg div
    // if (ret.hasOwnProperty('validation_errors')) {
    //     $.each(ret.validation_errors, function (k, v) {
    //         if (v.length) {
    //             hasError = true;
    //             $('div#msgError').append(k + ': ' + v + '<br/>');
    //         }
    //     });
    // }

    // Get success messages from session and append in success msg div
    // if (ret.hasOwnProperty('session_success')) {
    //     $.each(ret.session_success, function (k, v) {
    //         if (v.length) {
    //             hasSuccess = true;
    //             $('div#msgSuccess').append(v + '<br/>');
    //         }
    //     });
    // }


    // Get success messages from session and append in success msg div
    // $('div#msgMessage').append('<h4>Message</h4>');

    if (ret.hasOwnProperty('messages')) {
        $.each(ret.messages, function (k, v) {
            if (v.length) {
                hasMessage = true;
                $('div#msgMessage').append(v + '<br/>');
            }
        });
    }
    if (ret.hasOwnProperty('warnings')) {
        $.each(ret.warnings, function (k, v) {
            if (v.length) {
                hasMessage = true;
                $('div#msgMessage').append(v + '<br/>');
            }
        });
    }
    if (ret.hasOwnProperty('debug')) {
        $.each(ret.debug, function (k, v) {
            if (v.length) {
                hasMessage = true;
                $('div#msgMessage').append(v + '<br/>');
            }
        });
    }


    //$('div#msgSuccess, div#msgError,div#msgMessage').show();
    if (hasError) $('div#msgError').show()
    if (hasSuccess) $('div#msgSuccess').show()
    if (hasMessage) $('div#msgMessage').show()
}

/**
 * Show message in modal. Thi is helpful to notify users
 * @param msg
 */
function showAlert(msg) {
    $('.ajaxMsg').empty().hide(); // first hide all blocks
    $('div#msgMessage').append(msg).show();
    $('#msgModal').modal('show');
}