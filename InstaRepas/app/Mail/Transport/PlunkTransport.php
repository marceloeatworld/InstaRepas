<?php

namespace App\Mail\Transport;

use App\Services\PlunkService;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\MessageConverter;

class PlunkTransport extends AbstractTransport
{
    protected $plunkService;

    public function __construct(PlunkService $plunkService)
    {
        parent::__construct();
        $this->plunkService = $plunkService;
    }

    protected function doSend(SentMessage $message): void
    {
        // Convertir le message Symfony en Email
        $email = MessageConverter::toEmail($message->getOriginalMessage());
        
        // Extraire les destinataires
        $to = array_map(function (Address $address) {
            return $address->getAddress();
        }, $email->getTo());
        
        // Si un seul destinataire, le transformer en string plutôt qu'un tableau
        $to = count($to) === 1 ? $to[0] : $to;
        
        // Extraire l'expéditeur
        $fromAddresses = $email->getFrom();
        $from = null;
        $name = null;
        
        if (count($fromAddresses) > 0) {
            $fromAddress = $fromAddresses[0];
            $from = $fromAddress->getAddress();
            $name = $fromAddress->getName();
        }
        
        // Extraire l'adresse de réponse
        $replyToAddresses = $email->getReplyTo();
        $replyTo = null;
        
        if (count($replyToAddresses) > 0) {
            $replyToAddress = $replyToAddresses[0];
            $replyTo = $replyToAddress->getAddress();
        }
        
        // Extraire les en-têtes personnalisés
        $headers = [];
        foreach ($email->getHeaders()->all() as $header) {
            // Ignorer certains en-têtes standard
            if (!in_array(strtolower($header->getName()), ['from', 'to', 'subject', 'cc', 'bcc'])) {
                $headers[$header->getName()] = $header->getBodyAsString();
            }
        }
        
        // Préparer les options pour Plunk
        $options = [];
        if ($from) $options['from'] = $from;
        if ($name) $options['name'] = $name;
        if ($replyTo) $options['reply'] = $replyTo;
        if (!empty($headers)) $options['headers'] = $headers;
        
        // Déterminer le corps du message (HTML ou texte)
        $body = $email->getHtmlBody();
        if (empty($body)) {
            $body = $email->getTextBody();
        }
        
        // Envoyer l'email via le service Plunk
        $result = $this->plunkService->sendEmail(
            $to,
            $email->getSubject(),
            $body,
            $options
        );
        
        // Si l'envoi échoue, générer une exception
        if (isset($result['success']) && $result['success'] === false) {
            throw new \RuntimeException('Erreur lors de l\'envoi via Plunk: ' . ($result['error'] ?? 'Erreur inconnue'));
        }
    }

    public function __toString(): string
    {
        return 'plunk';
    }
}