<?php

/*
|--------------------------------------------------------------------------
| Vars
|--------------------------------------------------------------------------
|
| This view partial can be included with a config variable $var.
| $var is an array and can have following keys.
| if a $var is not set the default value will be use.
|
*/
/**
 *      $var['div'] ?? 'col-md-3';
 *      $var['label']           ?? null;
 *      $var['label_class']     ?? null;
 *      $var['type']            ?? null;
 *      $var['value']           ?? null;
 *      $var['name']            ?? Str::random(8);
 *      $var['params']          ?? [];  // These are the html attributes like css, id etc for the field.
 *      $var['editable']        ?? true;
 *
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 * @var bool $editable
 * @var array $immutables
 */


$var = \App\Mainframe\Features\Form\Form::setUpVar($var, $errors ?? null, $element ?? null, $editable ?? null, $immutables ?? null);
$input = new \App\Mainframe\Features\Form\Select\SelectAjax($var);
?>
@if($input->isHidden)
    {{ Form::hidden($input->name, $input->value()) }}
@else
    <div class="{{$input->containerClasses()}}" id="{{$input->uid}}">

        {{-- label --}}
        @include('mainframe.form.includes.label')

        {{-- input --}}
        <div class="clearfix"></div>
        @php
            $span = $input->isEditable ? '10' : '12'
        @endphp
        <div class="col-md-{{$span}} no-padding">
            {{ Form::text($input->name, $input->value(), $input->params) }}
            <input name="preload" type="hidden" value="{{$input->preload}}"/>
        </div>

        {{--clear button--}}
        @if($input->isEditable)
            <div class="col-md-2 no-padding">
                <a id="clear_{{$input->name}}" class="btn  bg-white selectClearBtn"
                   data-target="{{$input->uid}}"
                   href="#">Clear</a>
            </div>
        @endif

        <div class="clearfix"></div>

        {{-- Error --}}
        @include('mainframe.form.includes.show-error')
    </div>
@endif


@section('js')

    @if(!$input->isHidden)

        <script type="text/javascript">

            var divId = '{{$input->uid}}';
            var url = '{!! $input->url !!}';
            var inputName = '{{$input->name}}';

            initAjaxSelect(divId, url, inputName);

            // clear button
            $("#" + divId + " .selectClearBtn").click(function () {
                divId = $(this).data('target');
                $("#" + divId + " input.ajax").select2("val", "");
            });

            /**
             * Function to instantiate the ajax based selector.
             * @param divId
             * @param url
             * @param inputName
             */
            function initAjaxSelect(divId, url, inputName) {

                var select2 = $("#" + divId + " input.ajax").select2({
                    minimumInputLength: 2,
                    allowClear: true,
                    initSelection: function (element, callback) {
                        var id = element.val();
                        var text = $("#" + divId + ' input[name=preload]').val();
                        var data = {id: id, text: text};
                        callback(data);
                    },
                    ajax: {
                        dataType: "json",
                        url: url,
                        quietMillis: 500,
                        data: function (term, page) {
                            return {
                                '{{$input->nameField}}': term,
                                page: page
                            }
                        },
                        results: function (response, page) {
                            var more = (page * 20) < response.data.total; // whether or not there are more results available
                            return {
                                results: $.map(response.data.items, function (item) {
                                    return {
                                        text: item.{{$input->nameField}},
                                        id: item.id
                                    }
                                }),
                                more: more
                            };
                        }
                    }
                }).on("change", function () {
                    // callSomeFunction();
                });
            }

        </script>
    @endif
    @parent

@endsection

<?php unset($input) ?>
