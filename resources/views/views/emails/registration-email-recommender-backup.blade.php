@extends('emails.templates.letsbab-recommender-default')

@section('email-content-header')
Lets Start Shopping & Sharing
@endsection

@section('email-content')
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
  Hi {{ isset($user->first_name) ? ucwords($user->first_name) : "" }},
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
Thanks for downloading LetsBab. You're nearly there!
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
We just need to verify your email address to complete your LetsBab signup.
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center">
<a style="text-decoration: none;background-color: #00aeef;background-image:url(https://s3.us-east-2.amazonaws.com/letsbab/cdn/lb-emails/background-bg-1.jpg);background-repeat:no-repeat;
background-position:center center;background-size:cover;padding: 12px 15px;border-radius: 20px;display: inline-block;color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 15px;
line-height: normal;"  href="{{$email_verification_url}}" target="_blank">
 Verify your email address
</a>
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
 Follow the 5 steps to get started.
</p>
</td>
</tr>
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; text-align:center; ">
 <img src="https://s3.us-east-2.amazonaws.com/letsbab/cdn/lb-emails/mobiles-white-email.png"  alt=""  style="width:100%; border:none;">
</td>
</tr>

</table>
@endsection
