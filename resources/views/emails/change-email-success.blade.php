@extends('emails.templates.letsbab-default')

@section('email-content-header')
    Email updated
@endsection

@section('email-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
        <tr>
            <td valign='top'
                style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
                <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
                    Your email has been updated.
                </p>
            </td>
        </tr>

    </table>
@endsection