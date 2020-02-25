/****************************************************************************************
 * CKEditor configuration variable that is commonly called for all CKEditor instances
 ****************************************************************************************/
var editor_config_basic = {
    toolbarGroups: [
        {"name": "basicstyles", "groups": ["basicstyles"]}
    ],
    removeButtons: 'CreateDiv,Styles,Format,Font',
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode: CKEDITOR.ENTER_P,
    autoParagraph: false // stop from automatically adding <p></p> tag
};

/**
 * This function instantiates a text area so that it it compatible with ajax based form submission
 * This function checks for any change in the editor and when changes is found it updates
 * the hidden input with the changed value in the editor
 *
 * @param id
 * @param config
 */
function initEditor(id, config) {
    if ($('textarea#' + id).length) {
        CKEDITOR.replace(id, config);
        // update textarea as soon as something is updated in CKEditor
        CKEDITOR.instances[id].on('change', function () {
            CKEDITOR.instances[id].updateElement()
        });
    }
}

/****************************************************************************************/
/*
 *   This function binds a link with a popup action. If a link has class .popup then it will open up
 *   in a pop up window of the configuration defined below.
 * */
$('.popup').click(function () {

    var height = 600;
    var width = 800;
    var NWin = window.open($(this).prop('href'), '', 'scrollbars=1,height=' + height + ',width=' + width);
    if (window.focus) {
        NWin.focus();
    }
    return false;
});

// jquery function to get outerHTML
jQuery.fn.outerHTML = function (s) {
    return s ? this.before(s).remove() : jQuery("<p>").append(this.eq(0).clone()).html();
};

// for tooltip popover
$('[data-toggle="popover"]').popover();

$('.datepicker').datepicker(
    {
        format: 'yyyy-mm-dd',
        autoclose: true,
        clearBtn: true
    }
);

/**
 * Get selected values as array from a multi-select select
 * @param selector
 * @returns {Array}
 */
function getMultiSelectAsArray(selector) {
    var arr = [];
    $(selector + ' :selected').each(function (i, selected) {
        arr[i] = $(selected).val();
    });
    return arr;
}

/****************************************************************************************
 *   Make delete button responsive to context. Click on delete button loads a modal
 *   and a form with relevant values required for delete. These values include
 *   the route that will trigger the delete. Also determines the redirect
 *   path on successful delete and delete failure.
 ****************************************************************************************/

/**
 *   Function to prepare the for that will POST to delete route.
 */
function initGenericDeleteBtn() {

    $('button[name=genericDeleteBtn]').click(function () {
        var route = $(this).attr('data-route');
        var redirect_success = $(this).attr('data-redirect_success');
        var redirect_fail = $(this).attr('data-redirect_fail');

        $('form[name=deleteForm]').attr('action', route);
        $('form[name=deleteForm] input[name=redirect_success]').val(redirect_success);
        $('form[name=deleteForm] input[name=redirect_fail]').val(redirect_fail);

    });

    $('#deleteSubmit').click(function () {
        $('#deleteModal').modal('hide');
    });
}

// call the funtion
initGenericDeleteBtn();
/********************** delete end *******************************/

// enable slim scroll for all HTML element with class 'slim scroll'
$('.slimscroll').slimScroll({
    alwaysVisible: true
});

/******************************************************************
 * Checks if returns json is valid json
 * @param val
 * @returns {*}
 */
function parseJson(val) {
    if (typeof val === 'object') {
        // if it is already a json object do nothing.
    } else {
        // else convert to json object
        val = JSON.parse(val);
    }
    return val;
}

$('.datatable-min').dataTable({
    "bPagination": false,
    "bFilter": false,
    //"bPaginate": false,
    "bLengthChange": false,
    "bInfo": false,
    "bPageLength": 10,
    "aaSorting": [[0, "desc"]]
});

$('.datatable-min-no-pagination').dataTable({
    "bPagination": false,
    "bFilter": false,
    "bPaginate": false,
    "bLengthChange": false,
    "bInfo": false,
    "bPageLength": 10,
    "aaSorting": [[0, "desc"]]
});

// make all select selct2
$('select').select2();

// noinspection JSUnusedGlobalSymbols
/**
 * disable all input
 */
function makeAllInputReadonly() {
    $('input, textarea, select').attr('readonly', 'readonly'); // make everything readonly
    $('button[name=genericDeleteBtn]').hide(); // hide delete buttons
    $('option:not(:selected)').attr('disabled', true).remove(); // remove all options that are not selected
    $("select").prop("disabled", true);

}

// hide messages/notifications
setTimeout(function () {
    $('div#showMsg').fadeOut('slow');
}, 3500);


//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
});

/**
 * function is called in app/views/spyr/form/input-checkbox.blade.php
 * a checkbox and associative hidden input field is instantiated
 * based on existing value of the hidden input box.
 */
function initCheckbox() {

    /**
     * Go through each checkbox input field and if checkbox value is
     * equal to checked_val mark as checked(ticket). Otherwise
     * uncheck.the checkbox.
     */
    $('.spyr-checkbox').each(function () {

        var checkbox = $(this);
        var checked_val = checkbox.attr('data-checked-val');
        var unchecked_val = checkbox.attr('data-unchecked-val');
        var name = checkbox.attr('data-checkbox-name');

        if (checkbox.val() == checked_val) {
            checkbox.prop('checked', true);
            $('input[name=' + name + ']').val(checked_val);
        } else {
            checkbox.prop('checked', false);
            checkbox.val(unchecked_val);
            $('input[name=' + name + ']').val(unchecked_val);
        }
    });

    $('.spyr-checkbox').change(function () {
        var checkbox = $(this);
        var checked_val = checkbox.attr('data-checked-val');
        var unchecked_val = checkbox.attr('data-unchecked-val');
        var name = $(this).attr('data-checkbox-name');

        if (checkbox.is(':checked')) {
            $('input[name=' + name + ']').val(checked_val);
            checkbox.val(checked_val);
        } else {
            $('input[name=' + name + ']').val(unchecked_val);
            checkbox.val(unchecked_val);
        }
    });
}

initCheckbox(); // Run while page load
/**************************************************************************/

/**
 * initUploader function initiates the generic uploader used commonly in modules
 *
 * documentations http://hayageek.com/docs/jquery-upload-file.php#doc
 * @param id : root div container of the uploader
 * @param url : url where uploader will post the data
 */
function initUploader(id, url) {
    $("#" + id + " .file-uploader").uploadFile({
        dragDropStr: "<span style='margin-left: 5px'> -OR- Drop files here</span>",
        url: url,
        method: "POST",
        //allowedTypes: "",
        fileName: "file",
        showStatusAfterSuccess: true,
        autoSubmit: true,
        dragDrop: true,
        dragdropWidth: '70%',
        //maxFileSize: 8,
            //maxFileCount: 1,
        //acceptFiles: "audio/*",
        multiple: true,
        statusBarWidth: '70%',
        uploadButtonClass: 'btn btn-default btn-sm btn-flat',
        returnType: 'json',
        showPreview: true,
        showDone: true,
        doneStr: '100% complete',
        // dynamicFormData: function () {                   // old implementation
        //     return {
        //         "ret": "json",
        //         //"tenant_id": $("#" + id + " form input[name=tenant_id]").val(),
        //         //"module_id": $("#" + id + " form input[name=module_id]").val(),
        //         //"element_id": $("#" + id + " form input[name=element_id]").val(),
        //         //"element_uuid": $("#" + id + " form input[name=element_uuid]").val()
        //     };
        // },
        dynamicFormData: function () {                      // New implementation using serialization
            return $('#' + id + ' form').serialize();
        },
        //onSuccess: function (files, ret, xhr){};
        onSuccess: function (files, ret) {
            loadMsg(parseJson(ret));
            $('#msgModal').modal('show');
            //console.log(ret);
            // var path = ret.message.path;
        },
        onError: function (files, status, errMsg) {
            $("#status").html("<span style='color: red;'>Something Wrong." + errMsg + "</span>");
        }
    });
}


/**
 * Function to check if a key exists in a tested json return.
 * https://stackoverflow.com/questions/2631001/javascript-test-for-existence-of-nested-object-key
 *
 * var test = {level1:{level2:{level3:'level3'}} };
 * checkNested(test, 'level1', 'level2', 'level3'); // true
 * checkNested(test, 'level1', 'level2', 'foo'); // false
 *
 * @param obj
 * @returns {boolean}
 */
function hasNestedKey(obj /*, level1, level2, ... levelN*/) {
    var args = Array.prototype.slice.call(arguments, 1);

    for (var i = 0; i < args.length; i++) {
        if (!obj || !obj.hasOwnProperty(args[i])) {
            return false;
        }
        obj = obj[args[i]];
    }
    return true;
}



