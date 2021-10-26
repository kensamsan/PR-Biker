<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Log;
class SocialAccountService
{
	public function createOrGetUserFacebook(ProviderUser $providerUser)
	{
		 $account = SocialAccount::whereProvider('facebook')
			->whereProviderUserId($providerUser->getId())
			->first();

		if ($account) {
			return $account->user;
		} else {

			$account = new SocialAccount([
				'provider_user_id' => $providerUser->getId(),
				'provider' => 'facebook'
			]);

			$user = User::whereEmail($providerUser->getEmail())->first();
	
			if (!$user) {
				$name = explode(" ", $providerUser->getName());
				$user = User::create([
					'username' => $providerUser->getEmail(),
					'email' => $providerUser->getEmail(),
					'first_name' => $name[0],
					'last_name' => $name[count($name)-1],
					'photo' => $providerUser->getAvatar(),
					'customer' => 'customer',
				]);
			}

			$account->user()->associate($user);
			$account->save();
			
			return $user;
		

		}
	}

	public function createOrGetUserGoogle(ProviderUser $providerUser)
	{

		Log::info('createOrGetUserGoogle');
				
        // Log::info($providerUser->id);
        // Log::info($providerUser->email);
        // Log::info($providerUser->avatar);


		 $account = SocialAccount::whereProvider('google')
			->whereProviderUserId($providerUser->getId())
			->first();

		if ($account) {
			// Log::info('account True');
			return $account->user;
		} else {
			// Log::info('account false');
			Log::info($providerUser->getId());
			Log::info($providerUser->getEmail());
			Log::info($providerUser->getEmail());
			Log::info($providerUser->getAvatar());
			Log::info($providerUser);
			Log::info($providerUser->user['last_name']);
			$account = new SocialAccount([
				'provider_user_id' => $providerUser->getId(),
				'provider' => 'google'
			]);

			$user = User::whereEmail($providerUser->getEmail())->first();
	
			if (!$user) {
				$name = explode(" ", $providerUser->getName());
				$user = User::create([
					'username' => $providerUser->getEmail(),
					'email' => $providerUser->getEmail(),
					'first_name' => $name[0],
					'last_name' => $name[count($name)-1],
					'photo' => $providerUser->getAvatar(),
					'customer' => 'customer',
				]);
			}

			$account->user()->associate($user);
			$account->save();
			
			return $user;
		

		}
	}



}