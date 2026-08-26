<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

trait ProtectsAgainstSpam
{
    /**
     * Encrypted timestamp embedded in the form to measure fill time.
     */
    protected function spamFormToken(): string
    {
        return Crypt::encryptString((string) now()->timestamp);
    }

    /**
     * Detects bot submissions: filled honeypot field, missing or tampered
     * form token, or a form submitted faster than a human could fill it.
     */
    protected function isSpam(Request $request): bool
    {
        if ($request->filled('website')) {
            return true;
        }

        try {
            $issuedAt = (int) Crypt::decryptString((string) $request->input('form_token'));
        } catch (\Exception $e) {
            return true;
        }

        return now()->timestamp - $issuedAt < 3;
    }
}
