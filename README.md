# Suspicion

....


## Install

Via Composer

``` bash
$ composer require orchid/suspicion
```

## Usage

``` php
$history = new History();
$history->setUserAgent('Opera/9.80 (Windows NT 6.0; U; Distribution 00; ru) Presto/2.10.289 Version/12.02');
$history->setIp('82.254.254.196');
$history->setLastLogin('2018-11-21 23:19:18');


$suspicion = new Suspicion();
echo $suspicion->analyze($history); //The higher the value, the more suspicious the input.
```


## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email bliz48rus@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
