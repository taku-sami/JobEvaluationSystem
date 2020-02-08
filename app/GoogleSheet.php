<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleSheet extends Model
{
    public static function instance() {

        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        try {
            $client->setAuthConfig($credentials_path);
        } catch (\Google_Exception $e) {
        }
        return new \Google_Service_Sheets($client);

    }
}
