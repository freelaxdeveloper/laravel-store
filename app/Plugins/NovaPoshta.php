<?php namespace App\Plugins;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class NovaPoshta {

    private $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    /**
     * список городов
     * @param regionRef Ref области
     */
    public function getCities(string $regionRef)
    {
        $options = [
            "apiKey" => env('NOVAPOSHTA_KEY'),
            "modelName" => "Address",
            "calledMethod" => "getCities",
            "methodProperties" => ['RegionRef' => $regionRef],
        ];
        return $this->getData($this->request($options), 'cities');
    }

    /**
     * список отделений
     * @param cityRef Ref города
     */
    public function getOffices(string $cityRef)
    {
        $options = [
            "apiKey" => env('NOVAPOSHTA_KEY'),
            "modelName" => "AddressGeneral",
            "calledMethod" => "getWarehouses",
            "methodProperties" => ['CityRef' => $cityRef],
        ];
        return $this->getData($this->request($options));
    }

    /**
     * список областей
     */
    public function getRegions()
    {
        $options = [
            "apiKey" => env('NOVAPOSHTA_KEY'),
            "modelName" => "Address",
            "calledMethod" => "getAreas",
        ];
        return $this->getData($this->request($options), 'regions');
    }

    /**
     * декодируем полученный json и отдаем данные в коллекции
     * данные кешируются и обновляются один раз в сутки
     */
    private function getData($request, ?string $name_cache = null): Collection
    {
        if ( !$name_cache ) {
            return collect(json_decode($request)->data);
        }

        $data = Cache::remember('NOVAPOSHTA_' . $name_cache, 60 * 24, function () use ($request) {
            return json_decode($request)->data;
        });
        return collect($data);
    }

    private function request(array $options)
    {
        curl_setopt_array($this->curl, [
            CURLOPT_URL => env('NOVAPOSHTA_URL'),
            CURLOPT_RETURNTRANSFER => True,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($options),
            CURLOPT_HTTPHEADER => ["content-type: application/json"],
        ]);
        return curl_exec($this->curl);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }
}