<?php

namespace Class\Http;

class HttpClient
{
    public function get(string $url): ?string {
        $response = @file_get_contents($url);
        if($response === false) {
            throw new \RuntimeException(error_get_last());
        }
        return $response;
    }

    public function getCurl(string $url): ?string {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $result = curl_exec($curl);

        if(curl_error($curl)){
            throw new \RuntimeException(curl_error($curl));
        }
        curl_close($curl);

        return $result;
    }
}