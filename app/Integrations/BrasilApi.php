<?php
namespace App\Integrations;

use Illuminate\Support\Facades\Http;

class BrasilApi {

    public static function getCepV2($cep = null) {
        $result = [];
        if (!empty($cep)) {
            $url = "https://brasilapi.com.br/api/cep/v2/{$cep}";
            $response = Http::get($url);

            if ($response->successful()) {
                $result = $response;
            }
        }
        return $result;
    }
}