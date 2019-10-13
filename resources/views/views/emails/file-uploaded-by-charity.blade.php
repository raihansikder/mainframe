@extends('emails.templates.letsbab-default')
<?php
/** @var $partner \App\Partner */
?>

@section('email-content-header')
    File uploaded!
@endsection
<?php
$upload = $charity->uploads()->where('type', 'Charity-uploads')->orderBy('created_by', 'desc')->first();
?>
@section('email-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
        <tr>
            <td valign='top'
                style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
                <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
                    A file- <span class="info-box-text"><a href="{{ route('uploads.edit', $upload->id) }}">{{$upload->name}}</a></span> has been
                    uploaded by <a href="{{ route('charities.edit', $charity->id) }}">{{$charity->name}}</a> <br>

                </p>
            </td>
        </tr>
    </table>
@endsection