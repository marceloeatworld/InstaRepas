<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * An expired session (CSRF 419) sends visitors back to the form with a
     * clear message instead of the bare "Page expirée" error screen.
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof TokenMismatchException || $e->getPrevious() instanceof TokenMismatchException) {
            return redirect()
                ->back()
                ->withInput($request->except('_token', 'password', 'password_confirmation'))
                ->with('session_expired', 'Votre session a expiré. Vos choix ont été conservés, cliquez à nouveau sur le bouton.');
        }

        return parent::render($request, $e);
    }
}
