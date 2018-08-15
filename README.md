# zoom-api-php-client
Zoom.us API v2 client for PHP

### Installation

Add the following repository source to your composer.json:

```
{
      "type": "composer",
      "url": "https://repository.usabilitydynamics.com"
}
```

Require via composer:

```
composer require usabilitydynamics/zoom-api-php-client:0.0.3
```

Initialize:

```
use UDX\Zoom\Zoom;
$zoom = new Zoom( <api_key>, <secret_key> );
```

Use:

```
$meetings = $zoom->meetings->list( <user_id> );
```
