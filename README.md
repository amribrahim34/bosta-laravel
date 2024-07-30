# Laravel Bosta Egypt

## Description

A Laravel package for integrating with Bosta shipping services in Egypt

## Installation

1. Install the package via composer:
   ```
   composer require amribrahim34/laravel-bosta-egypt
   ```

## Configuration

1. Publish the config file:
   ```
   php artisan vendor:publish --provider="YourNamespace\BostaEgypt\BostaEgyptServiceProvider"
   ```
2. Add your Bosta API key to your .env file:
   ```
   BOSTA_API_KEY=your_api_key_here
   ```

## Usage

### Basic Usage

```php
use YourNamespace\BostaEgypt\BostaEgypt;

$bosta = new BostaEgypt(config('bosta-egypt.api_key'));
```

### Examples

#### Calculate Shipment Price

```php
$result = $bosta->pricing->calculateShipment([
    'dropOffCity' => 'cairo',
    'pickupCity' => 'cairo',
    'cod' => 500,
    'size' => 'Normal'
]);
```

#### Create Delivery

```php
$deliveryData = [
    'type' => 10,
    'specs' => [
        'packageType' => 'Parcel',
        'size' => 'MEDIUM',
        'packageDetails' => [
            'itemsCount' => 2,
            'description' => 'Desc.'
        ]
    ],
    // ... other delivery details
];

$result = $bosta->deliveries->create($deliveryData);
```

## Available Methods

### Pricing

- calculateShipment

### Deliveries

- create

## DeliveryBuilder Usage

The `DeliveryBuilder` class provides a fluent interface to build delivery data for Bosta Egypt.

### Example

```php
<?php

use amribrahim34\BostaEgypt\DeliveryBuilder;
use amribrahim34\BostaEgypt\BostaEgypt;

$bosta = new BostaEgypt('your-api-key-here');

$deliveryData = (new DeliveryBuilder())
    ->setType(10)
    ->setSpecs('Parcel', 'MEDIUM', 2, 'Desc.')
    ->setNotes('Welcome Note')
    ->setCod(50)
    ->setDropOffAddress('Helwan', 'NQz5sDOeG', 'aiJudRHeOt', 'Helwan street x', 'Near to Bosta school', '123', '4', '2')
    ->setPickupAddress('Helwan', 'NQz5sDOeG', 'aiJudRHeOt', 'Helwan street x', 'Near to Bosta school', '123', '4', '2')
    ->setReturnAddress('Helwan', 'NQz5sDOeG', 'aiJudRHeOt', 'Maadi', 'Nasr City', '123', '4', '2')
    ->setBusinessReference('43535252')
    ->setReceiver('Sasuke', 'Uchiha', '01065685435', 'ahmed@ahmed.com')
    ->setWebhookUrl('https://www.google.com/')
    ->build();

$result = $bosta->deliveries->create($deliveryData);


## Testing

Run the following command to execute tests:

```

vendor/bin/phpunit

```

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

MIT

## Authors

- Amr Ibrahim (amramr3434@gmail.com)
```
