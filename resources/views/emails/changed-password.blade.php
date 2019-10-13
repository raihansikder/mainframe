@extends('emails.templates.letsbab-default')

@section('email-content-header')
Your password has been reset.
@endsection

@section('email-content')
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:left;">
  <tr>
    <td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
    <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; "> 
    Dear {{ isset($user->first_name) ? ucwords($user->first_name) : "" }}, 
    </p>
    
      <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; "> 
      Your LetsBab password has been successfully reset. 
      </p>
      
      <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; "> 
      If you did not make this change or you believe an unauthorised person has accessed your account, go to <a href="{{ route('password.request') }}" target="_blank" style="color:#fff;">{{ route('password.request') }}</a> to reset your password without delay. If you need additional help, please contact <a style="text-decoration:none;  color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:normal;" href="mailto:hello@letsbab.com">hello@letsbab.com</a>. 
      </p>
      
      <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 0px 0; "> 
      LetsBab Community 
      </p>
      
      </td>
  </tr>
</table>
@endsection