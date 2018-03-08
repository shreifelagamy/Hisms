<?php
namespace Shreifelagamy\Hisms;

use GuzzleHttp\Client;

class HismsClient
{
    const API_URL = "http://www.hisms.ws/api.php";

    private $client;
    private $headers;
    private $username ;
    private $password ;
    private $senderName;
    private $additionalParams;
    public $configs;

    public function __construct()
    {
        $this->configs = \Config::get('hisms');
        $this->client = new Client();
        $this->headers = ['headers' => []];
        $this->additionalParams = [];
    }

    /**
     * Send sms
     * @param  String $message
     * @param  Array|String $to Number wit key
     * @return Guzzle/Client
     */
    public function sendSMS(string $message, string $to)
    {
        $this->username   = $this->configs["Username"];
        $this->password   = $this->configs["Password"];
        $this->senderName = $this->configs["SenderName"];

        if (is_null($message) or !isset($message) or is_null($to) or !isset($to)) {
            throw new \Exception('MESSAGE And TO Number are Require');
        }

        // handle to variable
        if (is_array($to)) {
            $to = implode(',', $to);
        }

        return $this->client->request(
            'GET',
            self::API_URL,
            [
                'query' => [
                    'send_sms' => '1',
                    'username' => $this->username,
                    'password' => $this->password,
                    'numbers' => $to,
                    'sender' => $this->senderName,
                    'message' => $message
                ]
            ]
        );
    }
}
