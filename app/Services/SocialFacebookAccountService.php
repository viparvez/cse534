<?php
namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Page;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
                'access_token' => $providerUser->token
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();

            $this->grabPages($providerUser->getId(),$user->id);

            return $user;
        }
    }

    public function grabPages($fbuserid,$userid){

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, "https://graph.facebook.com/".$fbuserid."?fields=id,name,accounts&access_token=EAAILHSBzbqsBAKqrYQTUOgeMd39IDAJmomwhSP6YuYj1toamwUWZBoAJM2t6uZCyfIUFklG7YosYXJ0ZA18HoGwQK457axEZA9PWPI7VCmk6NRoSgeYZAw0NPJBNFFjQtSU6JFCDcdRcUgR4OZBMQBMQBY8LhitnY6asovt5TeJIajvWKSZBWCV");
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
                    'createdby' => $userid,
                    'updatedby' => $userid,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]);
            }
        }

    }



}