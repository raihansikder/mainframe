@extends('emails.templates.letsbab-default')

@section('email-content-header')
    Email Updated
@endsection

@section('email-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="text-align:center;">
        <tr>
            <td valign='top' style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; ">
                <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:left ">
                    You updated your email to {{ $new_email }}<br/>
                    One more step...<br/>
                    Please verify your email address below:
                </p>

                <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#000; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:center">
               <a style="text-decoration: none;background-color: #00aeef;background-image:url(https://s3.us-east-2.amazonaws.com/letsbab/cdn/lb-emails/background-bg-1.jpg);background-repeat:no-repeat;background-position:center center;background-size:cover;padding: 12px 15px;border-radius: 20px;display: inline-block;color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 15px;line-height: normal;"  href="{{$email_verification_url}}" target="_blank">
 Verify your email address
</a>
                </p>
                <p style="font-family:Arial, Helvetica, sans-serif;  font-size:15px; color:#fff; line-height:25px; padding:0px; font-weight:normal; margin:0px 0 15px 0; text-align:left ">
                    <br/>If you did not make this change or you believe an unauthorised person has <br/>
                    access your account, please contact at letshelp@letsbab.com<br/><br/>
                    The LetsBab Team
                </p>
            </td>
        </tr>

    </table>
@endsection