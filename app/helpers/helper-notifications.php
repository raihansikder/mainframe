<?php

use Carbon\Carbon;

/**
 * Function to render a HTML that is wrapped with a default blade template.
 *
 * @param $content
 * @return string
 */
function wrapContent($content) {
    $template = "emails.layouts.notificationtemplate";
    return View::make($template)->with('content', $content)->render();
}

/**
 * Function to return an array of notification contents where codes are replaced with actual content.
 *
 * @param Notificationtemplate $template
 * @param array $subject_replaces
 * @param array $email_replaces
 * @param array $sms_replaces
 * @return array
 */
function loadNotificationContents(Notificationtemplate $template, $subject_replaces = [], $email_replaces = [], $sms_replaces = []) {
    return ['subject' => multipleStrReplace($template->subject, $subject_replaces),
        'email_content' => wrapContent(multipleStrReplace($template->email_content, $email_replaces)),
        'sms_content' => multipleStrReplace($template->sms_content, $sms_replaces)
    ];

}

/**
 * @param Newsarchive $newsarchive
 * @return array
 */
// function notificationNewsarchiveCreated(Newsarchive $newsarchive) {
//
//     $notificationtemplate_id = 1; // Define notification template
//     $ret = ['subject' => null, 'email_content' => null, 'sms_content' => null];
//
//     if ($template = Notificationtemplate::remember(cacheTime('notification-template'))->find($notificationtemplate_id)) {
//
//         /*********************************************
//          *  Prepare subject
//          ********************************************/
//         $subject_replaces = [ // Leave an empty array if no string replace is required.
//             "{{#ID}}" => $newsarchive->id,
//         ];
//
//         /*********************************************
//          *  Prepare HTML
//          ********************************************/
//         $email_replaces = [ // Leave an empty array if no string replace is required.
//             "{{#NAME}}" => $newsarchive->name,
//             "{{#NEWSPAPER}}" => isset($newsarchive->newspaper->name) ? $newsarchive->newspaper->name : '',
//             "{{#PUBLISH_DATE}}" => $newsarchive->publish_date,
//             "{{#FACILITY_LIST}}" => trim($newsarchive->facility_id_1_name . "," . $newsarchive->facility_id_2_name . "," . $newsarchive->facility_id_3_name, ", "),
//             "{{#NEWS_TYPE}}" => $newsarchive->news_type,
//             "{{#NEWS_CATEGORY}}" => $newsarchive->news_category,
//             "{{#TAGS}}" => trim($newsarchive->tag_words, ', '),
//             "{{#VIEW_URL}}" => route('newsarchives.details', $newsarchive->id),
//             "{{#EDIT_URL}}" => route('newsarchives.edit', $newsarchive->id),
//         ];
//
//         /*********************************************
//          *  Prepare SMS
//          ********************************************/
//         $sms_replaces = [  // Leave an empty array if no string replace is required.
//             "{{#ID}}" => $newsarchive->id,
//         ];
//
//         $ret = loadNotificationContents($template, $subject_replaces, $email_replaces, $sms_replaces);
//
//     }
//     return $ret;
// }

/**
 * Send email notification to user when registers.
 *
 * @param $user \App\Mainframe\Modules\Users\User
 */
function userRegistrationWithVerificationNotification($user) {
    // Data to be used on the email
    $email_verification_url = URL::temporarySignedRoute('verification.verify', Carbon::now()->addMinutes(60), ['id' => $user->getKey()]);
    $data = [
        'user' => $user,
        'email_verification_url' => $email_verification_url
    ];

    $template = 'emails.registration-email-default';
    if ($user->inGroupIds([8])) { // 8 = User(Recommender)
        $template = 'emails.registration-email-recommender';
    } else if ($user->inGroupIds([2, 3])) { // 2= Brand admin 3= Brand user
        //$template = 'emails.registration-email-recommender';
    } else if ($user->inGroupIds([5, 6])) { // 5 = Charity admin 6=Charity user
        //$template = 'emails.registration-email-recommender';
    }

    // Trigger email send.
    Mail::send($template, $data, function ($mail) use ($user) {
        /** @var \Illuminate\Mail\Message $mail */
        $mail->subject('LetsBab | Verify your email');
        $mail->to($user->email);
    });
}

/**
 * Send email notification to partner admin user when registers.
 *
 * @param $user \App\Mainframe\Modules\Users\User
 */
function partnerUserRegistrationEmailWithVerification($user) {
    // Data to be used on the email
    $email_verification_url = URL::temporarySignedRoute('verification.verify', Carbon::now()->addMinutes(60), ['id' => $user->getKey()]);
    $data = [
        'user' => $user,
        'email_verification_url' => $email_verification_url
    ];

    // Trigger email send.
    Mail::send('emails.registration-email-partner', $data, function ($mail) use ($user) {
        /** @var \Illuminate\Mail\Message $mail */
        $mail->subject('LetsBab | Brand Registration');
        $mail->to($user->email);
    });
}

/**
 * Send email notification to user when he logs in for the first time.
 *
 * @param $user \App\Mainframe\Modules\Users\User
 */
function userFirstLoginNotification($user) {
    // Data to be used on the email
    $data = [
        'user' => $user,
    ];
    // Trigger email send.
    if (!is_null($user->social_account_id)) {
        Mail::send('emails.user-post-verification-email', $data, function ($mail) use ($user) {
            /** @var \Illuminate\Mail\Message $mail */
            $mail->subject('LetsBab | Lets Get Started');
            $mail->to($user->email);
        });
    } else {
        Mail::send('emails.first-login', $data, function ($mail) use ($user) {
            /** @var \Illuminate\Mail\Message $mail */
            $mail->subject('LetsBab | Welcome');
            $mail->to($user->email);
        });
    }
}

/**
 * Send email notification to user when he logs in for the first time.
 *
 * @param $user \App\Mainframe\Modules\Users\User
 */
function userChangedPasswordNotification($user) {
    // Data to be used on the email
    $data = [
        'user' => $user,
    ];

    // Trigger email send.
    Mail::send('emails.changed-password', $data, function ($mail) use ($user) {
        /** @var \Illuminate\Mail\Message $mail */
        $mail->subject('LetsBab | Reset Password');
        $mail->to($user->email);
    });
}

/**
 * Send email notification to user with a password reset link.
 *
 * @param $user \App\Mainframe\Modules\Users\User
 * @param $token
 */
function resetPasswordNotification($user, $token) {
    // Data to be used on the email
    $data = [
        'user' => $user,
        'password_reset_url' => route('password.reset', $token)
    ];

    // Trigger email send.
    Mail::send('emails.reset-password', $data, function ($mail) use ($user) {
        /** @var \Illuminate\Mail\Message $mail */
        $mail->subject('LetsBab | Forgot Password');
        $mail->to($user->email);
    });
}

/**
 * Send email notification to user with a password reset link.
 *
 * @param $user \App\Mainframe\Modules\Users\User
 */
function emailVerificationNotification($user) {
    // Data to be used on the email
    $email_verification_url = URL::temporarySignedRoute('verification.verify', Carbon::now()->addMinutes(60), ['id' => $user->getKey()]);
    $data = [
        'user' => $user,
        'email_verification_url' => $email_verification_url
    ];

    // Trigger email send.
    Mail::send('emails.verify-email', $data, function ($mail) use ($user) {
        /** @var \Illuminate\Mail\Message $mail */
        $mail->subject('LetsBab | Verify email');
        $mail->to($user->email);
    });
}

