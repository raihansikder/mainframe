<?php

namespace Tests;

use Illuminate\Support\Arr;
use Swift_Message;

/**
 * Trait MailTracking
 *
 * @package Tests
 */

/**
 * Trait MailTracking
 *
 * @package Tests
 * @see  https://github.com/spinen/laravel-mail-assertions/blob/develop/src/MailTracking.php
 * @see     https://gist.github.com/JeffreyWay/b501c53d958b07b8a332
 * @tutorial https://laracasts.com/series/phpunit-testing-in-laravel/episodes/12
 */
trait MailTracking
{
    // TODO: Add check for attachments (number of & name)
    // TODO: Add check for header
    // TODO: Add check for message type
    // TODO: Allow checking specific message not just most recent one

    /**
     * Delivered emails
     *
     * @var Swift_Message[]|array
     */
    protected $emails = [];

    /**
     * @before
     */
    protected function setUpMailTracking(): void
    {
        parent::setUp();

        \Mail::getSwiftMailer()->registerPlugin(new TestingMailEventListener($this));

    }

    /**
     * At least one email was sent
     *
     * @return $this
     */
    public function seeEmailWasSent()
    {
        $this->assertNotEmpty($this->emails, 'No emails have been sent');

        return $this;
    }

    /**
     * No email was sent
     *
     * @return $this
     */
    public function seeEmailWasNotSent()
    {
        $this->assertEmpty($this->emails, 'Emails sent though none was expected to be sent');

        return $this;
    }

    /**
     * Email was sent to the given recipients
     *
     * @param  array|string  $recipients
     * @param  \Swift_Message|null  $message  If null then the latest email will be retrieved.
     * @return $this
     */
    public function seeEmailTo($recipients, Swift_Message $message = null)
    {
        $recipients = \Arr::wrap($recipients);

        foreach ($recipients as $recipient) {
            $this->assertArrayHasKey($recipient, $this->getEmail($message)->getTo(), "No email was sent to {$recipient}");
        }

        return $this;
    }

    /**
     * Email was Bcc'ed to the given recipients
     *
     * @param  array|string  $recipients
     * @param  \Swift_Message|null  $message  If null then the latest email will be retrieved.
     * @return $this
     */
    public function seeEmailBcc($recipients, Swift_Message $message = null)
    {
        $recipients = \Arr::wrap($recipients);

        foreach ($recipients as $recipient) {
            $this->assertArrayHasKey($recipient, $this->getEmail($message)->getBcc(), "No email was Bcc'd to $recipient");
        }

        return $this;
    }

    /**
     * Email was CC'ed to the given recipients
     *
     * @param  array|string  $recipients
     * @param  \Swift_Message|null  $message  If null then the latest email will be retrieved.
     * @return $this
     */
    public function seeEmailCc($recipients, Swift_Message $message = null)
    {
        $recipients = \Arr::wrap($recipients);

        foreach ($recipients as $recipient) {
            $this->assertArrayHasKey($recipient, $this->getEmail($message)->getCc(), "No email was Cc'd to $recipient");
        }

        return $this;
    }

    /**
     * Email was sent from the given sender
     *
     * @param  string  $sender
     * @param  \Swift_Message|null  $message  If null then the latest email will be retrieved.
     * @return $this
     */
    public function seeEmailFrom($sender, Swift_Message $message = null)
    {
        $this->assertArrayHasKey($sender, $this->getEmail($message)->getFrom(), "No email was sent from $sender");

        return $this;
    }

    /**
     * Assert that the last email's body does not contain the given text.
     *
     * @param  string  $excerpt
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailDoesNotContain($excerpt, Swift_Message $message = null)
    {
        $this->assertStringNotContainsString($excerpt, $this->getEmail($message)
            ->getBody(), "The last email sent contained the provided text in its body.");

        return $this;
    }

    /**
     * Assert that the last email's body equals the given text.
     *
     * @param  string  $body
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailEquals($body, Swift_Message $message = null)
    {
        $this->assertEquals($body, $this->getEmail($message)
            ->getBody(), "The last email sent did not match the given email.");

        return $this;
    }

    /**
     * Assert that the last email had the given priority level.
     * The value is an integer where 1 is the highest priority and 5 is the lowest.
     *
     * @param  integer  $priority
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailPriorityEquals($priority, Swift_Message $message = null)
    {
        $actual_priority = $this->getEmail($message)
            ->getPriority();

        $this->assertEquals($priority, $actual_priority,
            "The last email sent had a priority of $actual_priority but expected $priority.");

        return $this;
    }

    /**
     * Assert that the last email was set to reply to the given address.
     *
     * @param  string  $reply_to
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailReplyTo($reply_to, Swift_Message $message = null)
    {
        $this->assertArrayHasKey($reply_to, (array) $this->getEmail($message)
            ->getReplyTo(),
            "The last email sent was not set to reply to $reply_to.");

        return $this;
    }

    /**
     * Assert that the given number of emails were sent.
     *
     * @param  integer  $count
     * @return MailTracking $this
     * @deprecated in favor of seeEmailCountEquals
     */
    protected function seeEmailsSent($count)
    {
        return $this->seeEmailCountEquals($count);
    }

    /**
     * Assert that the given number of emails were sent.
     *
     * @param  integer  $count
     * @return $this
     */
    protected function seeEmailCountEquals($count)
    {

        $sent = count($this->emails);
        $this->assertEquals($count, $sent, "{$sent}/{$count} emails were sent");

        return $this;
    }

    /**
     * Assert that the last email's subject matches the given string.
     *
     * @param  string  $subject
     * @param  Swift_Message|null  $message
     * @return MailTracking $this
     * @deprecated in favor of seeEmailSubjectEquals
     */
    protected function seeEmailSubject($subject, Swift_Message $message = null)
    {
        return $this->seeEmailSubjectEquals($subject, $message);
    }

    /**
     * Assert that the last email's subject contains the given string.
     *
     * @param  string  $excerpt
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailSubjectContains($excerpt, Swift_Message $message = null)
    {
        $this->assertStringContainsString($excerpt, $this->getEmail($message)
            ->getSubject(), "The last email sent did not contain the provided subject.");

        return $this;
    }

    /**
     * Assert that the last email's subject does not contain the given string.
     *
     * @param  string  $excerpt
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailSubjectDoesNotContain($excerpt, Swift_Message $message = null)
    {
        $this->assertStringNotContainsString($excerpt, $this->getEmail($message)
            ->getSubject(), "The last email sent contained the provided text in its subject.");

        return $this;
    }

    /**
     * Assert that the last email's subject matches the given string.
     *
     * @param  string  $subject
     * @param  Swift_Message|null  $message
     * @return $this
     */
    protected function seeEmailSubjectEquals($subject, Swift_Message $message = null)
    {
        $this->assertEquals($subject, $this->getEmail($message)
            ->getSubject(), "The last email sent did not contain a subject of $subject.");

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    */
    public function addEmail(Swift_Message $email)
    {
        $this->emails[] = $email;
    }

    public function getEmail(Swift_Message $message = null)
    {
        $this->seeEmailWasSent();

        return $message ?: $this->lastEmail();
    }

    public function lastEmail()
    {
        return end($this->emails);
    }

}

class TestingMailEventListener implements \Swift_Events_EventListener
{

    public $test;

    public function __construct($test)
    {
        $this->test = $test;
    }

    public function beforeSendPerformed($event)
    {
        /** @var \Swift_Message $message */
        $message = $event->getMessage();
        $this->test->addEmail($message);
    }
}