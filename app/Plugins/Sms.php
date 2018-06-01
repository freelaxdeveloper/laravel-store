<?php namespace App\Plugins;

use Config;

class Sms {

    protected $url;
    protected $username;
    protected $token;
    protected $curl;

    public function __construct(array $phones, string $message)
    {
        $this->url = Config::get('sms.url');
        $this->from = Config::get('sms.from');
        $this->username = Config::get('sms.username');
        $this->token = Config::get('sms.token');

        $message = iconv('utf-8','windows-1251', $message);
        $message = urlencode($message);
        $url_result = $this->url . 'username=' . $this->username . '&token=' . $this->token . '&from=' . urlencode($this->from) . '&to=' . implode(';', $phones) . '&text=' . $message;
        
        if ( $this->curl = curl_init() ) {
            curl_setopt($this->curl, CURLOPT_URL, $url_result);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        } else {
            throw new \Exception('Error #curl_init');
        }
    }

    static function send(array $phones, string $message) {
        $sms = new Sms($phones, $message);

        return $sms->request();
    }

    public function request()
    {
        return curl_exec($this->curl);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }
}