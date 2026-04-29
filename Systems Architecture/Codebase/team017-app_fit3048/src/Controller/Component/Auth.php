<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Core\Configure;
use Cake\Http\Client;

/**
 * Auth
 *
 */
class Auth
{
    public static function authorise()
    {
        // setup http client
        $http = new Client();

        // get access tokem for oauth2
        $new = $http->post('https://secure.myob.com/oauth2/v1/authorize/',
            [
                'client_id' => Configure::read('secrets.client_id'),
                'client_secret' => Configure::read('secrets.client_secret'),
                'grant_type' => 'refresh_token',
                'refresh_token' => Configure::read('secrets.refresh_token')
            ]
        );

        $accessToken = $new->getJson()['access_token'];
        $newRefreshToken = $new->getJson()['refresh_token'];

        // update refresh token in config file
        Configure::write('secret.refresh_token', $newRefreshToken);

        return $accessToken;
    }
}
