@extends('emails.templates.letsbab-recommender-default-simple')

@section('email-content-header')
Lets Start Shopping & Sharing
@endsection

@section('email-content')
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0;">
  Hi {{ isset($user->first_name) ? ucwords($user->first_name) : "" }},
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0;">
Click on this link to verify your email address.
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0;">
<a style="text-decoration: none;color:#4AADDD;font-family: Arial, Helvetica, sans-serif;" href="{{$email_verification_url}}" target="_blank">
 {{ URL('/').'/verify' }}
</a>
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0;">
If you receive this email by mistake or in error, delete it or get in contact with us at hello@letsbab.com
</p>

</td>
</tr>
<tr>
<td>
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0;">
Thanks,
</p>
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0;">
The LetsBab team
</p>
</td>
</tr>

</table>
@endsection
