<?php /** @noinspection PhpUnused */

/** @noinspection AccessModifierPresentedInspection */

namespace App\Mainframe\Features\Responder;

use Illuminate\Support\Arr;
use Illuminate\Support\MessageBag;
use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Core\Traits\HasMessageBag;

class Response
{

    use Validable, HasMessageBag;

    /* All HTTP codes
     * https://gist.github.com/jeffochoa/a162fc4381d69a2d862dafa61cda0798
     */
    const HTTP_CONTINUE                                                  = 100;
    const HTTP_SWITCHING_PROTOCOLS                                       = 101;
    const HTTP_PROCESSING                                                = 102; // RFC2518
    const HTTP_OK                                                        = 200;
    const HTTP_CREATED                                                   = 201;
    const HTTP_ACCEPTED                                                  = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION                             = 203;
    const HTTP_NO_CONTENT                                                = 204;
    const HTTP_RESET_CONTENT                                             = 205;
    const HTTP_PARTIAL_CONTENT                                           = 206;
    const HTTP_MULTI_STATUS                                              = 207; // RFC4918
    const HTTP_ALREADY_REPORTED                                          = 208; // RFC5842
    const HTTP_IM_USED                                                   = 226; // RFC3229
    const HTTP_MULTIPLE_CHOICES                                          = 300;
    const HTTP_MOVED_PERMANENTLY                                         = 301;
    const HTTP_FOUND                                                     = 302;
    const HTTP_SEE_OTHER                                                 = 303;
    const HTTP_NOT_MODIFIED                                              = 304;
    const HTTP_USE_PROXY                                                 = 305;
    const HTTP_RESERVED                                                  = 306;
    const HTTP_TEMPORARY_REDIRECT                                        = 307;
    const HTTP_PERMANENTLY_REDIRECT                                      = 308; // RFC7238
    const HTTP_BAD_REQUEST                                               = 400;
    const HTTP_UNAUTHORIZED                                              = 401;
    const HTTP_PAYMENT_REQUIRED                                          = 402;
    const HTTP_FORBIDDEN                                                 = 403;
    const HTTP_NOT_FOUND                                                 = 404;
    const HTTP_METHOD_NOT_ALLOWED                                        = 405;
    const HTTP_NOT_ACCEPTABLE                                            = 406;
    const HTTP_PROXY_AUTHENTICATION_REQUIRED                             = 407;
    const HTTP_REQUEST_TIMEOUT                                           = 408;
    const HTTP_CONFLICT                                                  = 409;
    const HTTP_GONE                                                      = 410;
    const HTTP_LENGTH_REQUIRED                                           = 411;
    const HTTP_PRECONDITION_FAILED                                       = 412;
    const HTTP_REQUEST_ENTITY_TOO_LARGE                                  = 413;
    const HTTP_REQUEST_URI_TOO_LONG                                      = 414;
    const HTTP_UNSUPPORTED_MEDIA_TYPE                                    = 415;
    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE                           = 416;
    const HTTP_EXPECTATION_FAILED                                        = 417;
    const HTTP_I_AM_A_TEAPOT                                             = 418; // RFC2324
    const HTTP_MISDIRECTED_REQUEST                                       = 421; // RFC7540
    const HTTP_UNPROCESSABLE_ENTITY                                      = 422; // RFC4918
    const HTTP_LOCKED                                                    = 423; // RFC4918
    const HTTP_FAILED_DEPENDENCY                                         = 424; // RFC4918
    const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425; // RFC2817
    const HTTP_UPGRADE_REQUIRED                                          = 426; // RFC2817
    const HTTP_PRECONDITION_REQUIRED                                     = 428; // RFC6585
    const HTTP_TOO_MANY_REQUESTS                                         = 429; // RFC6585
    const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE                           = 431; // RFC6585
    const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS                             = 451;
    const HTTP_INTERNAL_SERVER_ERROR                                     = 500;
    const HTTP_NOT_IMPLEMENTED                                           = 501;
    const HTTP_BAD_GATEWAY                                               = 502;
    const HTTP_SERVICE_UNAVAILABLE                                       = 503;
    const HTTP_GATEWAY_TIMEOUT                                           = 504;
    const HTTP_VERSION_NOT_SUPPORTED                                     = 505;
    const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL                      = 506; // RFC2295
    const HTTP_INSUFFICIENT_STORAGE                                      = 507; // RFC4918
    const HTTP_LOOP_DETECTED                                             = 508; // RFC5842
    const HTTP_NOT_EXTENDED                                              = 510; // RFC2774
    const HTTP_NETWORK_AUTHENTICATION_REQUIRED                           = 511; // RFC6585
    public static $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC7238
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',                                               // RFC2324
        421 => 'Misdirected Request',                                         // RFC7540
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        451 => 'Unavailable For Legal Reasons',                               // RFC7725
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',                                     // RFC2295
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
    ];

    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /** @var MessageBag */
    public $messageBag;

    /** @var int Success/Error codes 200.400 etc */
    public $code = Response::HTTP_OK;

    /** @var string success|fail */
    public $status;

    /** @var string Single line of message */
    public $message;

    /** @var mixed API payload, usually it is a list of a model */
    public $payload;

    /** @var string URL */
    public $redirectTo;

    /** @var \Illuminate\View\View|\Illuminate\Contracts\View\Factory */
    public $viewPath;

    /** @var array */
    public $viewVars = [];

    /*
    |--------------------------------------------------------------------------
    | Output functions
    |--------------------------------------------------------------------------
    |
    | These functions are responsible for dispatching the final response
    |
    */

    public function setValidator($validator)
    {
        $this->validator = $validator;

        return $this;
    }

    public function setMessageBag($messageBag)
    {
        $this->messageBag = $messageBag;

        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

    public function setRedirectTo($redirectTo)
    {
        $this->redirectTo = $redirectTo;

        return $this;
    }

    public function setViewPath($viewPath)
    {
        $this->viewPath = $viewPath;

        return $this;
    }

    public function setViewVars($viewVars)
    {
        $this->viewVars = $viewVars;

        return $this;
    }

    /**
     * View
     *
     * @param string $viewPath
     * @param array $viewVars
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($viewPath = null, $viewVars = null)
    {
        $this->viewPath = $viewPath ?: $this->viewPath;
        $this->viewVars = $viewVars ?: $this->viewPath;

        $view = view($this->viewPath)->with($this->defaultViewVars())->with($this->viewVars);

        if ($this->validator) {
            $view->withErrors($this->validator);
        }

        return $view;
    }

    /**
     * Redirect
     *
     * @param string $to
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($to = null)
    {
        if ($to) {
            $redirect = redirect($to);
        } elseif ($this->redirectTo) {
            $redirect = redirect($this->redirectTo);
        } else {
            $redirect = redirect()->back();
        }

        // Only load input if operation failed.
        if ($this->isFail()) {
            $redirect = $redirect->withInput();
        }

        return $redirect->with($this->defaultViewVars())
            ->withErrors($this->validator);
    }

    /**
     * Json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function json()
    {
        // Load Generic response
        $data = [
            'code'    => $this->code,
            'status'  => $this->status ?: 'success',
            'message' => $this->message,
            'data'    => null,
        ];
        // Load payload
        if ($this->payload) {
            $data['data'] = $this->payload;
        }

        // Load validation errors
        if (! $this->isValid()) {
            $data['validation_errors'] = $this->validator()->messages()->toArray();
        }

        // Load different messages
        $keys = ['errors', 'messages', 'warnings', 'debug'];
        foreach ($keys as $key) {
            if ($items = $this->getMessages($key)) {
                $data['errors'] = Arr::flatten($items); // One dimensional array of errors.
            }
        }
        /*-------------------------------*/

        // Add redirect to
        if ($this->redirectTo) {
            $data['redirect'] = $this->redirectTo;
        }

        return \Response::json($data);
    }

    /**
     * Json or abort
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function failed($message = null, $code = null)
    {
        $this->fail($message, $code);

        if ($this->viewPath) {
            return $this->view();
        }

        if ($this->expectsJson()) {
            return $this->json();
        }

        if ($this->redirectTo) {
            return $this->redirect();
        }

        return abort($code, $message);
    }

    /**
     * Json or succeeded
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function succeeded($message = null, $code = null)
    {
        $this->success($message, $code);

        if ($this->viewPath) {
            return $this->view();
        }

        if ($this->expectsJson()) {
            return $this->json();
        }

        return $this->redirect();

    }

    /**
     * Determine what needs to be dispatched.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function dispatch()
    {
        if (! $this->isValid()) {
            $this->failValidation();
        }

        if ($this->isFail()) {
            return $this->failed($this->message, $this->code);
        }

        return $this->succeeded($this->message);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function send()
    {
        return $this->dispatch();
    }

    /**
     * Abort on permission denial
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function permissionDenied($message = null, $code = null)
    {
        $message = $message ?: $this->message ?: 'Permission denied';
        $code    = $code ?: Response::HTTP_FORBIDDEN;

        return abort($code, $message);
    }

    /**
     * Abort on resource not found
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function notFound($message = null, $code = null)
    {
        $message = $message ?: $this->message ?: 'Not found';
        $code    = $code ?: Response::HTTP_NOT_FOUND;

        return abort($code, $message);
    }

    /*
    |--------------------------------------------------------------------------
    | Response builder
    |--------------------------------------------------------------------------
    |
    | These functions prepares the final response before dispatching.
    |
    */

    /**
     * Set response as success
     *
     * @param string $message
     * @param int $code
     * @return $this
     */
    public function success($message = null, $code = null)
    {
        if ($this->status !== 'fail') {
            $this->status  = 'success';
            $this->code    = $code ?: Response::HTTP_OK;
            $this->message = $message ?: $this->message;
        }

        return $this;
    }

    /**
     * Set response as fail
     *
     * @param string $message
     * @param int $code
     * @return $this
     */
    public function fail($message = null, $code = null)
    {
        $this->status  = 'fail';
        $this->code    = $code ?: Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->message = $message ?: $this->message;

        return $this;
    }

    /**
     * Set response as fail
     *
     * @param string $message
     * @param int $code
     * @return $this
     */
    public function failValidation($message = null)
    {
        $this->message = $message ?: $this->message ?: 'Validation failed';
        $this->code    = Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->fail();

        return $this;
    }

    /**
     * Load a payload to be sent with the response
     *
     * @param null $payload
     * @return $this
     */
    public function load($payload = null)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @param null $redirectTo
     * @return $this
     */
    public function to($redirectTo = null)
    {
        return $this->setRedirectTo($redirectTo);
    }


    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    | Helper functions that takes care of some auxiliary features of the class
    |
    */

    /**
     * Check if response is success
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->status == 'success'
            && $this->isValid()
            && ! $this->hasMessages('errors');
    }

    /**
     * Check if response is fail
     *
     * @return bool
     */
    public function isFail()
    {
        return ! $this->isSuccess();
    }

    /**
     * Checks if the response expects JSON
     *
     * @return bool
     */
    public function expectsJson()
    {
        if (request()->expectsJson()) {
            return true;
        }

        return request('ret') == 'json';
    }

    /**
     * Additional values to be passed to view through view composer or redirect.
     * In redirect the value has to be accessed via session.
     *
     * @return array
     */
    public function defaultViewVars()
    {
        return [
            'response' => [
                // Load from session so that when redirected the values are retained
                'status'     => session('response.status') ?? $this->status,
                'message'    => session('response.message') ?? $this->message,
                'messageBag' => session('response.messageBag') ?? $this->messageBag(),
            ],
        ];
    }
}