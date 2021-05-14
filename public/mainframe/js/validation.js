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
    form.validationEngine({prettySelect: true, promptPosition: "topLeft", scroll: true});

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
        }).done(function (response) {

            response = parseJson(response); // Just in case of exception
            // Reflect validation result
            if (response.status === 'fail') { // Show validation error messages on fail.
                showFieldValidationPrompts(response, false); // Show validation alert on each field
            }

            // Load messages in modal and show.
            loadMsg(response);
            $('#msgModal').modal('show');

            // Handle success. Redirect or pass to successHandlerFunction.
            if (response.status == 'success') {
                if (successHandlerFunction) {
                    successHandlerFunction(response);
                } else if (response.hasOwnProperty('redirect') && (response.redirect !== null && response.redirect.length > 0)) {
                    window.location.replace(response.redirect);
                }
            }
        }).error(function (response, textStatus, errorThrown) { // Gracefully handle 422, 400 error responses
            console.log(response.responseJSON.message);
            showAlert(response.responseJSON.message); //
        }).always(function (ret, textStatus, errorThrown) {
            btn.html(btnText).removeClass('disabled'); // Re-enable the save button
        });

    });
}

/**
 * show validation red boxes against each field
 * Fields are targeted based on ID. So they should have the id field that is same as the name field
 * @param response
 * @param showAlert
 */
function showFieldValidationPrompts(response, showAlert) {
    var str = '';
    if (response.hasOwnProperty('validation_errors')) {
        $.each(response.validation_errors, function (k, v) {
            str += "\n" + k + ": " + v;
            // $("#label_" + k).validationEngine('showPrompt', v, 'error');
            $("*[id=" + k + "]").validationEngine('showPrompt', v, 'error');

        });
    }
    if (showAlert) {
        alert(response.status + " - " + response.message + "\n" + str);
    }
}

/**
 * Show the modal based on standard response
 * @param response
 * @param timeout milliseconds
 */
function showResponseModal(response, timeout = null) {
    loadResponseInModal(response);
    $('#msgModal').modal('show');

    if (timeout) {
        setTimeout(() => {
            $('#msgModal').modal('hide');
        }, timeout);
    }
}

/**
 * Alias function
 * @param response
 */
function loadResponseInModal(response) {
    return loadMsg(response);
}

/*
 *  Clears and loads all new error, message and success
 *  note in the  modal that shows just after ajax submit.
 */
function loadMsg(response) {
    $('.ajaxMsg').empty().hide(); // first hide all blocks

    var hasError = false;
    var hasSuccess = false;
    var hasMessage = false;

    if (response.status == 'fail') {
        hasError = true;
        $('div#msgError').append('<h4 class="text-red">Error - ' + response.message + '</h4>');
    } else if (response.status == 'success') {
        hasSuccess = true;
        $('div#msgSuccess').append('<h4 class="text-green">Success - ' + response.message + '</h4>');
    }

    if (response.hasOwnProperty('errors')) {
        $.each(response.errors, function (k, v) {
            if (v.length) {
                hasError = true;
                $('div#msgError').append(v + '<br/>');
            }
        });
    }

    if (response.hasOwnProperty('messages')) {
        $.each(response.messages, function (k, v) {
            if (v.length) {
                hasMessage = true;
                $('div#msgMessage').append(v + '<br/>');
            }
        });
    }
    if (response.hasOwnProperty('warnings')) {
        $.each(response.warnings, function (k, v) {
            if (v.length) {
                hasMessage = true;
                $('div#msgMessage').append(v + '<br/>');
            }
        });
    }
    if (response.hasOwnProperty('debug')) {
        $.each(response.debug, function (k, v) {
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
 * @param  msg string
 * @param timeout int milliseconds
 */
function showAlert(msg, timeout = null) {
    $('.ajaxMsg').empty().hide(); // first hide all blocks
    $('div#msgMessage').append(msg).show();
    $('#msgModal').modal('show');

    if (timeout) {
        setTimeout(() => {
            $('#msgModal').modal('hide');
        }, timeout);
    }
}