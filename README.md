### Cachet PHP Client

Hi there! Welcome to the Cachet PHP Client. We have built a powerful set of tools to help you manage the Cachet via API in a streamlined fashion. Hopefully, this will help you contribute data faster and more effectively than before!

## Getting Started

* This repo requires PHP 5.4 or greater. We recommend PHP 7.

* Install composer, if you haven't already. ([Composer Homepage](http://www.getcomposer.org))

* Install dependencies: `composer require "brianseitel/cachet-client"`


## Quickstart

```php
<?php

$client = new \Cachet\Cachet(1, 'YOUR_TOKEN_HERE', 'http://localhost');

$results = $client->base()->ping();

echo "Ping: " . $results->response['data'] . PHP_EOL;

```

