@extends('emails.templates.letsbab-default')

@section('email-content-header')
Forgotten your Password?
@endsection

@section('email-content')
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
<a href="{{$password_reset_url}}" target="_blank" style="color:#fff; font-size:15px;">Click here</a> to reset your password and get back to LetsBab.
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 0px 0; text-align:center">
The LetsBab Team.
</p>

</td>
</tr>

</table>
@endsection