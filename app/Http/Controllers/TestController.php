<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Page;

class TestController extends Controller
{
    public function grabPages($userid){

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, "https://graph.facebook.com/".$userid."?fields=id,name,accounts&access_token=EAAILHSBzbqsBAKqrYQTUOgeMd39IDAJmomwhSP6YuYj1toamwUWZBoAJM2t6uZCyfIUFklG7YosYXJ0ZA18HoGwQK457axEZA9PWPI7VCmk6NRoSgeYZAw0NPJBNFFjQtSU6JFCDcdRcUgR4OZBMQBMQBY8LhitnY6asovt5TeJIajvWKSZBWCV");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $pageList = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $accdetails = json_decode($pageList,true);

        if (count($accdetails['accounts']['data']) > 0) {
            
            foreach ($accdetails['accounts']['data'] as $key => $value) {
                Page::create([
                    'category' => $value['category'],
                    'pagename' => $value['name'],
                    'pageaccid' => $value['id'],
                    'createdby' => '1',
                    'updatedby' => '1',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]);
            }
        }

    }
}
