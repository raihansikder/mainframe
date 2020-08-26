<div class="clearfix"></div>
{{--Contact--}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#terms-conditions">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    &nbsp;Terms & Conditions
                </a>
            </h5>
        </div>
        <div id="terms-conditions" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                {{--@include('form.textarea',['var'=>['name'=>'terms','label'=>'Terms & Conditions']])--}}
                @include('form.textarea',['var'=>['name'=>'terms','label'=>'Terms & Conditions','editorConfig'=>'','params'=>['class'=>'ckeditor']]])
                @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>