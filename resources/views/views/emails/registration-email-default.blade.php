@extends('emails.templates.letsbab-default')

@section('email-content-header')
    Default Registration email
@endsection

@section('email-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center ">
Update contents here
</p>

<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 0px 0; text-align:center">
<a style="text-decoration:none; background-color:#00aeef; padding:12px 15px; border-radius:8px; display:inline-block; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:normal;" href="{{$email_verification_url}}" target="_blank">
{{$email_verification_url}}
</a>
</p>

</td>
</tr>

</table>
@endsection