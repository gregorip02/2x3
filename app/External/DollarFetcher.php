<?php

namespace App\External;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

final class DollarFetcher
{
    /**
     * [fetch description]
     * @return [type] [description]
     */
    public function get()
    {
        return Cache::has('clp_usd') ? Cache::get('clp_usd') : $this->fetch();
    }


    /**
     * [http description]
     * @return [type] [description]
     */
    protected function fetch()
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://mindicador.cl/api/'
        ]);

        $response = $client->get('dolar');

        $data = (array) json_decode($response->getBody()->getContents());

        $last = collect($data['serie'])->first();

        Cache::put('clp_usd', $last->valor, now()->addHours(6));

        return $last->valor;
    }
}
