<?php

namespace App\Mainframe\Features\Responder;

use App\Mainframe\Features\Core\Traits\Validable;
use Illuminate\Support\Arr;

class Response
{

    use Validable;

    /* All HTTP codes */
    public const HTTP_CONTINUE                                                  = 100;
    public const HTTP_SWITCHING_PROTOCOLS                                       = 101;
    public const HTTP_PROCESSING                                                = 102; // RFC2518
    public const HTTP_OK                                                        = 200;
    public const HTTP_CREATED                                                   = 201;
    public const HTTP_ACCEPTED                                                  = 202;
    public const HTTP_NON_AUTHORITATIVE_INFORMATION                             = 203;
    public const HTTP_NO_CONTENT                                                = 204;
    public const HTTP_RESET_CONTENT                                             = 205;
    public const HTTP_PARTIAL_CONTENT                                           = 206;
    public const HTTP_MULTI_STATUS                                              = 207; // RFC4918
    public const HTTP_ALREADY_REPORTED                                          = 208; // RFC5842
    public const HTTP_IM_USED                                                   = 226; // RFC3229
    public const HTTP_MULTIPLE_CHOICES                                          = 300;
    public const HTTP_MOVED_PERMANENTLY                                         = 301;
    public const HTTP_FOUND                                                     = 302;
    public const HTTP_SEE_OTHER                                                 = 303;
    public const HTTP_NOT_MODIFIED                                              = 304;
    public const HTTP_USE_PROXY                                                 = 305;
    public const HTTP_RESERVED                                                  = 306;
    public const HTTP_TEMPORARY_REDIRECT                                        = 307;
    public const HTTP_PERMANENTLY_REDIRECT                                      = 308; // RFC7238
    public const HTTP_BAD_REQUEST                                               = 400;
    public const HTTP_UNAUTHORIZED                                              = 401;
    public const HTTP_PAYMENT_REQUIRED                                          = 402;
    public const HTTP_FORBIDDEN                                                 = 403;
    public const HTTP_NOT_FOUND                                                 = 404;
    public const HTTP_METHOD_NOT_ALLOWED                                        = 405;
    public const HTTP_NOT_ACCEPTABLE                                            = 406;
    public const HTTP_PROXY_AUTHENTICATION_REQUIRED                             = 407;
    public const HTTP_REQUEST_TIMEOUT                                           = 408;
    public const HTTP_CONFLICT                                                  = 409;
    public const HTTP_GONE                                                      = 410;
    public const HTTP_LENGTH_REQUIRED                                           = 411;
    public const HTTP_PRECONDITION_FAILED                                       = 412;
    public const HTTP_REQUEST_ENTITY_TOO_LARGE                                  = 413;
    public const HTTP_REQUEST_URI_TOO_LONG                                      = 414;
    public const HTTP_UNSUPPORTED_MEDIA_TYPE                                    = 415;
    public const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE                           = 416;
    public const HTTP_EXPECTATION_FAILED                                        = 417;
    public const HTTP_I_AM_A_TEAPOT                                             = 418; // RFC2324
    public const HTTP_MISDIRECTED_REQUEST                                       = 421; // RFC7540
    public const HTTP_UNPROCESSABLE_ENTITY                                      = 422; // RFC4918
    public const HTTP_LOCKED                                                    = 423; // RFC4918
    public const HTTP_FAILED_DEPENDENCY                                         = 424; // RFC4918
    public const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425; // RFC2817
    public const HTTP_UPGRADE_REQUIRED                                          = 426; // RFC2817
    public const HTTP_PRECONDITION_REQUIRED                                     = 428; // RFC6585
    public const HTTP_TOO_MANY_REQUESTS                                         = 429; // RFC6585
    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE                           = 431; // RFC6585
    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS                             = 451;
    public const HTTP_INTERNAL_SERVER_ERROR                                     = 500;
    public const HTTP_NOT_IMPLEMENTED                                           = 501;
    public const HTTP_BAD_GATEWAY                                               = 502;
    public const HTTP_SERVICE_UNAVAILABLE                                       = 503;
    public const HTTP_GATEWAY_TIMEOUT                                           = 504;
    public const HTTP_VERSION_NOT_SUPPORTED                                     = 505;
    public const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL                      = 506; // RFC2295
    public const HTTP_INSUFFICIENT_STORAGE                                      = 507; // RFC4918
    public const HTTP_LOOP_DETECTED                                             = 508; // RFC5842
    public const HTTP_NOT_EXTENDED                                              = 510; // RFC2774
    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED                           = 511; // RFC6585

    /**
     * Status text
     *
     * @var string[]
     */
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
    // public $validator;
    //
    // /** @var MessageBag */
    // public $messageBag;

    /** @var int Success/Error codes 200.400 etc */
    public $code = Response::HTTP_OK;

    /** @var string success|fail */
    public $status = 'success';

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

    /**
     * Convert json array response keys to a specific case.
     *
     * @var string|bool
     */
    public $convertJsonKeys = 'SNAKE_CASE';

    public function __construct()
    {
        // Load messageBag errors in to validator.
        if ($this->hasErrors()) {
            $this->validator()->messages()->merge($this->getErrors());
        }
    }

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
        $this->setPayload($viewVars);

        return $this;
    }

    /**
     * Resolve singleton response
     *
     * @return \App\Mainframe\Features\Responder\Response|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function resolve()
    {
        return resolve(Response::class);
    }

    /**
     * View Object
     *
     * @param  string  $viewPath
     * @param  array  $viewVars
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($viewPath = null, $viewVars = null)
    {
        if ($viewPath) {
            $this->setViewPath($viewPath);
        }

        if ($viewVars) {
            $this->setViewVars($viewVars);
        }

        $view = view($this->viewPath)->with($this->defaultViewVars())->with($this->viewVars);

        if ($this->validator) {
            $view->withErrors($this->validator);
        }

        return $view;
    }

    /**
     * Redirect
     *
     * @param  string  $to
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

    public function prepareResponse()
    {
        // Load Generic response
        $data = [
            'code' => $this->code,
            'status' => $this->status ?: 'success',
            'message' => $this->message,
            'data' => null,
        ];
        // Load payload
        if ($this->payload) {
            $data['data'] = $this->payload;
        }

        // Load validation errors
        if (!$this->isValid()) {
            $data['validation_errors'] = $this->validator()->messages()->toArray();
        }

        // Load different messages
        $keys = ['errors', 'messages', 'warnings', 'debug'];
        foreach ($keys as $key) {
            if ($items = $this->getMessages($key)) {
                $data[$key] = array_unique(Arr::flatten($items)); // One dimensional array of errors.
            }
        }

        // Show validation errors in errors array
        if (isset($data['validation_errors'])) {
            $data['errors'] = $data['errors'] ?? [];
            $data['errors'] = array_unique(array_merge($data['errors'], Arr::flatten($data['validation_errors'])));
        }
        /*-------------------------------*/

        // Add redirect to
        if ($this->redirectTo) {
            $data['redirect'] = $this->redirectTo;
        }

        return $data;
    }

    /**
     * Convert an array keys to snake_case
     *
     * @param $array
     * @return array
     */
    public function snakeCaseKeys($array)
    {
        return snakeCaseKeys($array);
    }

    /**
     * Convert the json payload. Change structure, key naming convetion etc.
     *
     * @param $data
     * @return array
     */
    public function convert($data)
    {
        if ($this->convertJsonKeys == 'SNAKE_CASE') {
            return $this->snakeCaseKeys($data);
        }

        return $data;
    }

    /**
     * Json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function json()
    {
        $data = $this->prepareResponse();
        $data = $this->convert($data); // Change array keys to snake case.

        return \Response::json($data); // Note : Should send 200 OK always.  422 Can not be handled by browser.
    }

    /**
     * Json or abort
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function failed($message = null, $code = null)
    {
        $this->fail($message, $code);

        // Higher precedence than view,redirect
        if ($this->expectsJson()) {
            return $this->json();
        }

        if ($this->viewPath) {
            return $this->view();
        }

        if ($this->redirectTo) {
            return $this->redirect();
        }

        return abort($code, $message);
    }

    /**
     * Json or succeeded
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function succeeded($message = null, $code = null)
    {
        $this->success($message, $code);

        // Higher precedence than view,redirect
        if ($this->expectsJson()) {
            return $this->json();
        }

        if ($this->viewPath) {
            return $this->view();
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
        if (!$this->isValid()) {
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
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function permissionDenied($message = null, $code = null)
    {
        $message = $message ?: $this->message ?: 'Permission denied';
        $code = $code ?: Response::HTTP_FORBIDDEN;

        if ($this->expectsJson()) {
            // return response()->json(['message' => $message], 404);
            return $this->fail($message, $code)->json();
        }

        return abort($code, $message);
    }

    /**
     * Abort on resource not found
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function notFound($message = null, $code = null)
    {
        $message = $message ?: $this->message ?: 'Not found';
        $code = $code ?: Response::HTTP_NOT_FOUND;

        if ($this->expectsJson()) {
            return $this->fail($message, $code)->json();
        }

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
     * @param  string  $message
     * @param  int  $code
     * @return $this
     */
    public function success($message = null, $code = null)
    {
        if ($this->status !== 'fail') {
            $this->status = 'success';
            $this->code = $code ?: Response::HTTP_OK;
            $this->message = $message ?: $this->message;
        }

        return $this;
    }

    /**
     * Set response as fail
     *
     * @param  string  $message
     * @param  int  $code
     * @return $this
     */
    public function fail($message = null, $code = null)
    {
        $this->status = 'fail';
        $this->code = $code ?: Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->message = $message ?: $this->message;

        return $this;
    }

    /**
     * Set response as fail
     *
     * @param  string  $message
     * @return $this
     */
    public function failValidation($message = null)
    {
        $this->message = $message ?: $this->message ?: 'Validation failed';
        $this->code = Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->fail();

        return $this;
    }

    /**
     * Load a payload to be sent with the response
     *
     * @param  null  $payload
     * @return $this
     */
    public function load($payload = null)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @param  null  $redirectTo
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
            && !$this->hasMessages('errors');
    }

    /**
     * Check if response is fail
     *
     * @return bool
     */
    public function isFail()
    {
        return !$this->isSuccess();
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
                'status' => session('response.status') ?? $this->status,
                'message' => session('response.message') ?? $this->message,
                'messageBag' => session('response.messageBag') ?? $this->messageBag(),
            ],
        ];
    }
}