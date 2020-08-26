<?php
/**
 * @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $module
 * @var \App\User $user
 * @var \App\User $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
?>

<script>
    linePriceEditable();

    $('#unit_price, #margin_percent').on('input', function () {
        $('input#line_price').val('');
        $('span#line_price').html('');
        setLinePrice();
        linePriceEditable();
    });


    function linePriceEditable() {
        if ($('input#margin_percent').val()) {
            $('input#line_price').attr('readonly', 'readonly');
            return;
        }
        $('input#line_price').attr('readonly', false);
    }

    function setLinePrice() {
        var unit_price = $('input#unit_price').val();
        var margin_percent = $('input#margin_percent').val();
        var line_price = parseFloat(unit_price - (unit_price * (margin_percent / 100))).toFixed(2);
        $('input#line_price').val(line_price);
        $('span#line_price').html(line_price);
    }

</script>
