<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlunkService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.plunk.api_key');
        $this->baseUrl = 'https://api.useplunk.com/v1';
    }

    public function sendEmail($to, $subject, $body, $options = [])
    {
        try {
            $payload = [
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
            ];
            
            if (isset($options['from'])) {
                $payload['from'] = $options['from'];
            }
            
            if (isset($options['name'])) {
                $payload['name'] = $options['name'];
            }
            
            if (isset($options['reply'])) {
                $payload['reply'] = $options['reply'];
            }
            
            if (isset($options['subscribed'])) {
                $payload['subscribed'] = $options['subscribed'];
            }
            
            if (isset($options['headers']) && is_array($options['headers'])) {
                $payload['headers'] = $options['headers'];
            }
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/send', $payload);
            
            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Erreur API Plunk', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'payload' => $payload,
                ]);
                
                return [
                    'success' => false,
                    'error' => 'Erreur API Plunk: ' . $response->status(),
                    'message' => $response->body(),
                ];
            }
        } catch (\Exception $e) {
            Log::error('Exception lors de l\'envoi d\'email via Plunk', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return [
                'success' => false,
                'error' => 'Exception: ' . $e->getMessage(),
            ];
        }
    }
}