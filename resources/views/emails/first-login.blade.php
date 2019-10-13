@extends('emails.templates.letsbab-recommender-default')

@section('email-content-header')
    Lets Start Shopping & Sharing
@endsection

@section('email-content')
   <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
Hi {{ isset($user->first_name) ? ucfirst($user->first_name) : "" }},
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center; ">
Thanks for downloading LetsBab. Why not use the app to recommend gifts for the holiday season?
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#28a3d9; line-height:normal; padding:0px; font-weight:normal; margin:0px 0 25px 0; text-align:center; ">
 Follow the 5 steps to get started.
</p>
</td>
</tr>
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; text-align:center; ">
 <img src="https://s3.us-east-2.amazonaws.com/letsbab/cdn/lb-emails/mobiles-white.png"   alt=""  style="width:100%; border:none;">
</td>
</tr>
</table>
@endsection