<?php

namespace App;

use Illuminate\Support\Facades\Http;

class RandomUser
{
    protected $baseUrl = 'https://randomuser.me/api/';

    public function fetch()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
