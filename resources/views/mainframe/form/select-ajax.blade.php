<?php
use App\Mainframe\Features\Form\Select\SelectAjax;

$rand = \Illuminate\Support\Str::random(8);

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;

    // Check immutability
    if ($editable && isset($immutables)) {
        $var['editable'] = ! in_array($var['name'], $immutables);
    }
}

$input = new SelectAjax($var, $element ?? null);
?>

<div id="{{$rand}}"
     class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}} {{$input->uid}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    @if($input->isEditable)
        <div class="clearfix"></div>
        <div class="col-md-9 no-padding">
            {{ Form::text($input->name, $input->value(), $input->params) }}
            <input name="preload" type="hidden" value="{{$input->preload}}"/>
        </div>
        <div class="col-md-3 no-padding">
            <a id="clear_{{$input->name}}" class="btn  bg-white selectClearBtn"
               href="#">Clear</a>
        </div>
    @else
        <span class="{{$input->params['class']}} readonly">
            {{$input->print()}}
        </span>
    @endif
    <div class="clearfix"></div>
    {!! $errors->first($var['name'], '<span class="help-block">:message</span>') !!}
</div>


@section('js')
    @parent

    <script type="text/javascript">

        var divId = '{{$rand}}';
        var url = '{!! $input->url !!}';
        var inputName = '{{$input->name}}';

        initAjaxSelect(divId, url, inputName);

        // clear button
        $("#" + divId + " .selectClearBtn").click(function () {
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
                initSelection: function (element, callback) {
                    var id = element.val();
                    var text = $("#" + divId + ' input[name=preload]').val();
                    var data = {id: id, text: text};
                    callback(data);
                },
                ajax: {
                    dataType: "json",
                    url: url,
                    quietMillis: 1000,
                    data: function (term, page) {
                        return {'{{$input->nameField}}': term};
                    },
                    results: function (response) {
                        return {
                            results: $.map(response.data.items, function (item) {
                                return {
                                    text: item.{{$input->nameField}},
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }).on("change", function () {
                // callSomeFunction();
            });
        }

    </script>
@endsection

<?php unset($input) ?>
