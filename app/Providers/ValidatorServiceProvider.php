<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \Validator::extend('validMailDomain', function($attribute, $value, $parameters, $validator) {
            // 禁止ドメインの配列
            $deny_domains = [
                '/@test1.com/',
                '/@test2.com/',
                '/@test3.com/',
            ];
            
            // 禁止ドメインの正規表現マッチしたらエラーとする
            foreach ($deny_domains as $deny_domain) {
                if (preg_match($deny_domain, $value)) {
                    return false;
                }
            }

            return true;
        });

        \Validator::extend('reservedUrl', function($attribute, $value, $parameters, $validator) {
            // 予約済みブログURLの配列
            $reserved_urls = [
                '/^aclog$/',
                '/^ad0a$/',
                '/^admin$/',
            ];

            // 予約済みブログURLの正規表現マッチしたらエラーとする
            foreach ($reserved_urls as $reserved_url) {
                if (preg_match($reserved_url, $value)) {
                    return false;
                }
            }

            return true;
        });

    }

    public function register()
    {
        //
    }
}
