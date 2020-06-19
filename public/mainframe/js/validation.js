/**
 *   Function enables the js to run front-end validation.
 */
function enableValidation(form_name, handler = false) {

    // 1. Disable submit button action.
    var form_selector = 'form[name=' + form_name + '] ';
    var btnId = $(form_selector + ' button[type=submit]').attr('id');
    // 1.1 Change the type from submit to button so that user cannot submit form but still click the button
    $(form_selector + ' button[id=' + btnId + ']').attr('type', 'button');
    $(form_selector + ' input[name=ret]').val('json'); // 2. enable json return type

    // 3. instantiate validationEngine with some options
    $(form_selector).validationEngine({prettySelect: true, promptPosition: "topLeft", scroll: true});

    // 4. Run validation on submit button click. If all frontend validations are ok then only ajax validation will execute
    $(form_selector + ' button[id=' + btnId + ']').click(function () {
        /********************************************************************************/
        // Show all fields when CTA/Save button is clicked. And show the 'Working..' text.
        /********************************************************************************/
        $('.collapse').collapse('show'); // When save button is clicked show all collapsed accordions .
        var btnText = $(this).html();
        $(this).html('Working...');
        $(this).addClass('disabled'); // change button text during ajax call
        /********************************************************************************/

        /*****************************************/
        // On Save button click run the AJAX
        /*****************************************/
        if ($(form_selector).validationEngine('validate')) {
            $.ajax({
                datatype: 'json',
                method: "POST",
                url: $('form[name=' + form_name + ']').attr('action'),
                data: $('form[name=' + form_name + ']').serialize()
            }).done(function (ret) {
                ret = parseJson(ret); // Convert the response into a valid json object.
                /*****************************************/
                // Reflect validation result
                /*****************************************/
                if (ret.status === 'fail') { // Show validation error messages on fail.
                    showValidationAlert(ret, false); // Show validation alert on each field
                } else if (ret.status === 'success') { // On success hide all validation error messages.
                    $('form[name=' + form_name + ']').validationEngine('hideAll');
                }

                /*****************************************/
                // Log session_success, session_error etc messages in modal and show
                /*****************************************/
                loadMsg(ret); //
                $('#msgModal').modal('show');

                /*****************************************/
                // Redirection
                /*****************************************/
                if (ret.status === 'success') {
                    if (handler) {
                        handler(ret);
                    } else if (ret.hasOwnProperty('redirect') && (ret.redirect !== null && ret.redirect.length > 0)) {
                        window.location.replace(ret.redirect);
                    }
                }

                // Re-enable the save button
                $(form_selector + ' button[id=' + btnId + ']').html(btnText).removeClass('disabled');
            });
        } else {
            $(this).html(btnText).removeClass('disabled');
        }
    });
}

/**
 * show validation red boxes against each field
 * Fields are targeted based on ID. So they should have the id field that is same as the name field
 * @param ret
 * @param showAlert
 */
function showValidationAlert(ret, showAlert) {
    var str = '';
    if (ret.hasOwnProperty('validation_errors')) {
        $.each(ret.validation_errors, function (k, v) {
            str += "\n" + k + ": " + v;
            $("#label_" + k).validationEngine('showPrompt', v, 'error');
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

    if (ret.status === 'fail') {
        hasError = true;
        $('div#msgError').append('<h4 class="text-red">Error - ' + ret.message + '</h4>');
    } else if (ret.status === 'success') {
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