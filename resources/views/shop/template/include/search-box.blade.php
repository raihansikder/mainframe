<!-------Header Search Box-------->
<?php
use App\Country;
use App\Partnercategory;
/** @noinspection PhpUndefinedMethodInspection */

$primary_categories = Partnercategory::select(['id', 'name'])
    ->where('is_active', 1)->where('parent_id', 0)->orderBy('order')
    ->remember(cacheTime('very-long'))->get();

?>

<div class="headersearchbox">
    <a class=" searchbtn searchClose" href="javascript:;">
        <img src="{{asset('letsbab/shop/images/close-icon.png')}}" alt="close"></a>
    <form action="{{route('shop.search')}}" method="get" id="partner-search-form" class="partner-search-form-top">
        <div class="input-group">


            {{--  Search Text field --}}
            <input type="text" name="name" class="form-control pull-left" placeholder="Search for the brands you love"
                   value="{{Request::get('name')}}">

            <button type="button" class="popupsearchSubmit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="10.5" cy="10.5" r="7.5"></circle>
                    <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                </svg>
            </button>

            {{--<div class="input-group-append">--}}
            <div style="display: flex">
                <button class="btn btn-filter dropdown-toggle pull-right" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="filtertype">
                        <div class="row">
                            @foreach($primary_categories as $category)
                                <?php
                                $checked = '';
                                if (Request::has('partnercategory_id') && Request::get('partnercategory_id') == $category->id) {
                                    $checked = 'checked';
                                }
                                ?>
                                <div class="form-check  col-3">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input main_partnercategory_id_checkbox"
                                               type="radio"
                                               name="main_partnercategory_id" id="inlineRadio{{$category->id}}"
                                               value="{{$category->id}}" {{$checked}}/>
                                        <label class="form-check-label custom-control-label"
                                               for="inlineRadio{{$category->id}}">{{$category->name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        /** @noinspection PhpUndefinedMethodInspection */
                        $partnercategories = Partnercategory::select(['id', 'name', 'parent_id', 'name_ext'])
                            ->where('is_active', 1)
                            // ->where('parent_id', '!=', 0)
                            ->orderBy('parent_id')->orderBy('order')
                            ->remember(cacheTime('very-long'))
                            ->get();
                        ?>
                        <select name="partnercategory_id" id="partnercategory_id" class="form-control">
                            <option value="" disabled selected>Choose your option</option>
                            @foreach($partnercategories as $partnercategory)
                                <?php
                                $selected = '';
                                /** @var Partnercategory $partnercategory */
                                if (Request::has('partnercategory_id') && Request::get('partnercategory_id') == $partnercategory->id) {
                                    $selected = 'selected';
                                }

                                // If there is a parent then set that parent id otherwise assign the item-id as parent id.
                                $parent_id = $partnercategory->parent_id == 0 ? $partnercategory->parent_id : $partnercategory->id;
                                ?>
                                <option value="{{$partnercategory->id}}"
                                        data-parent_id="{{$partnercategory->parent_id}}" {{$selected}}>{{$partnercategory->name_ext}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        /** @var  $countries */
                        $countries = Country::select(['id', 'name'])
                            ->where('is_active', 1)
                            ->orderBy('code')
                            ->remember(cacheTime('very-long'))
                            ->get();
                        ?>
                        <select name="country_id" id="country_id" class="form-control">
                            <option value="" disabled selected>Shop Location</option>
                            @foreach($countries as $country)
                                <?php
                                $selected = '';
                                /** @var Country $country */
                                if (Request::has('country_id') && Request::get('country_id') == $country->id) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filterSubmit">
                        <button type="button" id="search-reset" class="btn btn-primary"> Reset</button>
                        <button type="submit" class="btn btn-primary pull-right"> Apply Filter</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
<!-------/Header Search Box-------->
<div class="search-overlay"></div>

@section('js')
    @parent
    <script>
        $("select[name=partnercategory_id]").empty().attr('disabled', false).append("<option value=''>Choose your option</option>");
        /**
         *
         */
        $(".main_partnercategory_id_checkbox").click(function (e) {
            //alert($(this).val());
            var parent_id = $(this).val();
            console.log(parent_id);
            if (parent_id) {
                $("select[name=partnercategory_id]").empty().attr('disabled', false).append("<option value=''>Choose your option</option>");
                $.ajax({
                    type: "get",
                    datatype: 'json',
                    url: '{{route('partnercategories.list-options')}}?is_active=1&parent_id=' + $(this).val(),
                    data: {parent_id: parent_id},
                    success: function (response) {
                        //console.log(response.data);
                        if ((response.data)) {
                            $.each(response.data, function (i, obj) {
                                console.log(obj);
                                $("select[name=partnercategory_id]").append(
                                    "<option value=" + obj.id + " data-parent_id= " + obj.parent_id + ">" + obj.name_ext + "</option>");
                            });
                        }
                    },
                });
            }
        });
        //If a user is logged in by default have his country selected
                @if(user() && user()->country_id)
        var country = {{user()->country_id}}
                // console.log(country);
                $('#country_id option[value=' + country + ']').attr('selected', true);
        @endif

        /**
         * Enable reset button
         */
        $('button#search-reset').click(function (e) {
            console.log('Search reset');
            $('#partner-search-form').trigger("reset");
            $('select[name=country_id]').prop("selectedIndex", 0);
            $("select[name=partnercategory_id]").empty().attr('disabled', false).append("<option value=''>Choose your option</option>");
            {{--$.ajax({--}}
            {{--type: "get",--}}
            {{--datatype: 'json',--}}
            {{--url: '{{route('partnercategories.list-json')}}?is_active=1&sort_by=order&sort_order=asc',--}}
            {{--success: function (response) {--}}
            {{--//console.log(response.data);--}}
            {{--if ((response.data)) {--}}
            {{--$.each(response.data, function (i, obj) {--}}
            {{--console.log(obj);--}}
            {{--$("select[name=partnercategory_id]").append(--}}
            {{--"<option value=" + obj.id + " data-parent_id= " + obj.parent_id + ">" + obj.name_ext + "</option>");--}}
            {{--});--}}
            {{--}--}}
            {{--},--}}
            {{--});--}}
        });

    </script>
@stop