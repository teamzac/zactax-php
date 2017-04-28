# ZacTax PHP Client

This is the official PHP client for the [ZacTax](https://www.zactax.com) API. Although it's in 1.0 release, there are likely to be some major (possibly breaking) changes to the library. See the roadmap below for more information.

## Installation

The recommended method is to install via Composer:

```
composer require teamzac/zactax-php
```

## Usage

The main entry point is the ```TeamZac\ZacTax\ZacTax``` object. The constructor accepts an array of options, some of which can be set fluently if you need to set them after instantiation:

```php
$zactax = new TeamZac\ZacTax\ZacTax([
    'apiToken' => 'YOUR-API-TOKEN-HERE',
    'jurisdictionId' => 'JURISDICTION-ID*',
    'debug' => false, // set to true to debug HTTP calls
]);
```

Notes: * The Jurisdiction ID is recommended, but not strictly necessary when the API Token being used only has access to a single jurisdiction. Some users, however, will have access to multiple jurisdictions, in which case it is highly recommended that you set this option to ensure that you're receiving the correct data.

### Fluently setting options

You can also fluently set some of the options if you need to do so after instantiation:

```php
$zactax->setApiToken('1234')
    ->setJurisdictionId('jurisdiction-id')
    ->debug();
```

## Accessing resources

You can as properties on the ```TeamZac\ZacTax\ZacTax``` instance:

```php
$zactax->industries;
$zactax->jurisdictions;
$zactax->regions;
$zactax->taxpayers;
$zactax->users;
```

These resources provide a similar interface, although not necessarily identical as they do not all have the same information or level of detail. Common endpoints to these resources are:

```php
$resource->all(); // fetch all records
$resource->find($id); // fetch a specific record
```

What follows is a quick list of endpoints for each resource.

#### Industries

```php
$zactax->industries->payments($industryId, $options);
$zactax->industries->topTaxpayers($industryId);
```


#### Regions

```php
$zactax->regions->payments($regionId, $options);
$zactax->regions->outlets($regionId);
```

#### Taxpayers

```php
$zactax->taxpayers->payments($taxpayerId, $options);
$zactax->taxpayers->search($query, $options);
```

#### Users

```php
$zactax->industries->me();
$zactax->industries->myJurisdictions();
```

We'll continue to flesh out the entire API over time, as this covers only a subset of the available data provided by ZacTax.

## Roadmap

* Continue filling out the rest of the available endpoints to provide 100% coverage
* Return resources and collections from API calls that are more than the simple objects and arrays currently returned. For example, a taxpayers->find() call should return a Taxpayer instance, which can have things like ->getPayments() and ->updateName() methods on it.
* Improve test coverage

## Issues

If you notice any issues or problems, please report them. For security problems, please email support[at]zactax.com.