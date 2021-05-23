/*
|--------------------------------------------------------------------------
| After loader js
|--------------------------------------------------------------------------
| This js loads once all the scrips have been loaded. This usually
| handles common js features that needs to be activated through
| the application.
|
*/


/*
|--------------------------------------------------------------------------
| Activate pop ups for links that has 'popup' class
|--------------------------------------------------------------------------
|
| This function binds a link with a popup action. If a link has class .
| popup then it will open up in a pop up window of the configuration
| defined below.
|
*/
$('.popup').click(function () {

    var height = 600;
    var width = 800;
    var NWin = window.open($(this).prop('href'), ''
        , 'scrollbars=1,height=' + height + ',width=' + width);
    if (window.focus) {
        NWin.focus();
    }
    return false;
});


/*
|--------------------------------------------------------------------------
| Activate pop-over tooltip
|--------------------------------------------------------------------------
| https://getbootstrap.com/docs/4.0/components/popovers/
|
*/

$('[data-toggle="popover"]').popover();

/*
|--------------------------------------------------------------------------
| Enable date-picker for fields with 'datepicker' class
|--------------------------------------------------------------------------
|
|
*/
$('.datepicker').datepicker(
    {
        format: 'yyyy-mm-dd',
        autoclose: true,
        clearBtn: true
    }
);

/*
|--------------------------------------------------------------------------
| Init generic delete button
|--------------------------------------------------------------------------
| Clicking Delete button shows up a confirmation modal.
|
*/
initGenericDeleteBtn();


/*
|--------------------------------------------------------------------------
| Enable slim scroller
|--------------------------------------------------------------------------
| enable slim scroll for all HTML element with class 'slimscroll'
|
*/
$('.slimscroll').slimScroll({
    alwaysVisible: true
});

/*
|--------------------------------------------------------------------------
| Init datatables
|--------------------------------------------------------------------------
| Instantiate datatable for tables with following class. These
| datatables have pre-defined configurations
| .datatable-min
| .datatable-min-no-pagination
|
*/
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

/*
|--------------------------------------------------------------------------
| Activate select2
|--------------------------------------------------------------------------
|
| Activate select2 for all <select>
| Not a good idea to activate select
*/
$('.select2').select2(); // Causes issue with vue

/*
|--------------------------------------------------------------------------
| Activate iCheck checkbox style
|--------------------------------------------------------------------------
|
*/
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
});

// init mainframe checkbox with checked_val and unchecked_val
initCheckbox();

/*---------------------------------
| Auto resize all text area
|---------------------------------*/
autosize(document.querySelectorAll('textarea'));