# Hisms
Sending sms using [Hisms](https://www.hisms.ws/) provider for Laravel 5

## Introduction
Still Working on it, any feedbacks are appreciated.

## Installation 
First, you'll need to require the package with Composer: 
```sh
composer require shreifelagamy/hisms:"dev-master"
```

Then, update config/app.php by adding an entry for the service provider
```sh
'providers' => [
	// ...
	Shreifelagamy\Hisms\HiSmsServiceProvider::class
];
```

Then, register class alias by adding an entry in aliases section
```sh
'aliases' => [
	// ...
  'Hisms' => Shreifelagamy\Hisms\HismsFacade::class
];
```

Finally create config file named `hisms.php` in `config` directory or you can use 
```sh
php artisan vendor:publish --tag=config
```

## Configuration
You need to fill in `hisms.php` file with the proper credentials
```sh
return array(
    /*
    |--------------------------------------------------------------------------
    | hisms App Credentials
    |--------------------------------------------------------------------------
    |
    |
    */
    'Username' => 'USERNAME',
    'Password' => 'PASSWORD',
    'SenderName' => 'SENDERNAME',
);
```

## Usage
You can send to specific number or multiple numbers in once using this function, but always remember to include the country code
with the number EX: 9665xxxxxx

### Sending to specific number
```sh
\Hisms::sendSMS('message', '96653xxxxxxx');
```
### Sending to multiple numbers
```sh
\Hisms::sendSMS('message', ['96653xxxxxxx', '96653xxxxxxx']);
```
