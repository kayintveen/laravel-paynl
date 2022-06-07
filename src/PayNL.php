<?php

namespace DenizTezcan\LaravelPayNL;

use Paynl\Config;
use Paynl\Error\Error;
use Paynl\Paymentmethods;
use Paynl\Result\Result\Status;
use Paynl\Transaction;

class PayNL
{
    private $testMode = 0;

    public function __construct()
    {
        Config::setTokenCode(config('paynl.tokenCode'));
        Config::setApiToken(config('paynl.apiToken'));
        Config::setServiceId(config('paynl.serviceId'));
        $this->testMode = config('paynl.testMode');
    }

    public function setServiceId(string $serviceId): void
    {
        Config::setServiceId($serviceId);
    }

    public function getPaymentMethods(): array
    {
        return Paymentmethods::getList();
    }

    public function minimumTransaction(float $amount, string $returnUrl): array|string
    {
        $options = [
            'amount'	   => $amount,
            'returnUrl'	=> $returnUrl,
        ];

        return $this->startTransaction($options);
    }

    public function transaction(float $amount, string $returnUrl, array $options): array|string
    {
        $options['amount'] = $amount;
        $options['returnUrl'] = $returnUrl;

        return $this->startTransaction($options);
    }

    private function startTransaction(array $options): array|string
    {
        try {
            $options['testmode'] = $this->testMode;
            $transaction = Transaction::start($options);

            return [
                'transactionId' => $transaction->getTransactionId(),
                'redirectUrl' 	 => $transaction->getRedirectUrl(),
            ];
        } catch (Error $e) {
            echo 'Fout: '.$e->getMessage();
        }
    }

    public function getStatus($transactionId): Status
    {
        return Transaction::status($transactionId);
    }
}
