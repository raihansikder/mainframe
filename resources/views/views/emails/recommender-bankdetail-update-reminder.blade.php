@extends('emails.templates.letsbab-recommender-bankdetail-default')

@section('email-content-header')
@endsection

@section('email-content')
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
<tr>
<td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; ">
<p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; " >
{{ $messages }}
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
