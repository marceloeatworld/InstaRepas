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
            // Construction du payload de base
            $payload = [
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
            ];
            
            // Ajout des options supplémentaires si présentes
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
            
            // Envoi de la requête à l'API Plunk
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/send', $payload);
            
            // Traitement de la réponse
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