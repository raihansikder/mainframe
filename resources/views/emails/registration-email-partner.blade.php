@extends('emails.templates.letsbab-default')

@section('email-content-header')
    Welcome to LetsBab!
@endsection

@section('email-content')
   <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
  Hi {{ isset($user->first_name) ? ucwords($user->first_name) : "" }},
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
 To complete your registration please verify your email address below.
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 20px 0; text-align:center">
<a style="text-decoration:none; background-color:#00aeef; padding:12px 15px; border-radius:8px; display:inline-block; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:normal;" href="{{$email_verification_url}}" target="_blank">
Verify your email address
</a>
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0px 0; text-align:center ">
If this wasn't you, please ignore this email. Your email address cannot be used unless verified.
</p>	

</td>
</tr>

</table>
@endsection