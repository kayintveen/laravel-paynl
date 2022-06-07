# Laravel PayNL
Laravel wrapper for Pay.nl PHP SDK

[![Latest Stable Version](https://poser.pugx.org/deniztezcan/laravel-paynl/v/stable)](https://packagist.org/packages/deniztezcan/laravel-paynl) 
[![Total Downloads](https://poser.pugx.org/deniztezcan/laravel-paynl/downloads)](https://packagist.org/packages/deniztezcan/laravel-paynl) 
![StyleCI](https://github.styleci.io/repos/500751845/shield?branch=master)
[![License](https://poser.pugx.org/deniztezcan/laravel-paynl/license)](https://packagist.org/packages/deniztezcan/laravel-paynl)

### Instalation
```
composer require deniztezcan/laravel-paynl
```

Add a ServiceProvider to your providers array in `config/app.php`:
```php
    'providers' => [
    	//other things here
    	DenizTezcan\LaravelPayNL\PayNLServiceProvider::class,
    ];
```

Add the facade to the facades array:
```php
    'aliases' => [
    	//other things here
    	'PayNL' => DenizTezcan\LaravelPayNL\Facades\PayNL::class,
    ];
```

Finally, publish the configuration files:
```
php artisan vendor:publish --provider="DenizTezcan\LaravelPayNL\PayNLServiceProvider"
```

### Configuration
Please set the `PAYNL_TOKENCODE`, `PAYNL_APITOKEN`, `PAYNL_SERVICEID` and `PAYNL_TESTMODE` key in your .env file.