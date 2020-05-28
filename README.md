# R8: Reviews, Ratings and Recomendations

Laravel has always being missing a package like this, that supports dynamic rating with multiple Rating Types (ex. Like in Amazon or any ecommerce platform, Quality Rating, Customer Service Experience Ratings, etc.) with Integrated Reviews and Recomend Functionality.

The main Ideology behind this package is to make it easily adaptable for everyone for everyone's use case.

Reviews & Ratings system for laravel 7. You can rate any of your models.
- Custom Rating Types (ex: Product Quality, Delivery Speed, Pricing, etc.) without any limitations.
- Display Overall and Average Ratings
- Method Chaining
- You can set whether the model being rated is recommended.

## Installation

First, pull in the package through Composer.

```
composer require secrethash/r8
```
**NOTE: ONLY DEV-MASTER IS AVAILABLE. THIS PACKAGE IS NOT STABLE.**

***UNDER HEAVY DEVELOPMENT***


You will need to publish and run the migrations.
```
php artisan vendor:publish --provider="Secrethash\R8\R8ServiceProvider" --tag="migrations"
```

Run the migration
```
php artisan migrate
```

-----

### Setup a Model
```php
<?php

namespace App;

use Secrethash\R8\Contracts\R8;
use Secrethash\R8\Traits\R8Trait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements R8
{
    use R8Trait;
}
```

## Contributions

Contributions are welcomed and appreciated.

### Note

> This repository has been forked from [codebyray/laravel-review-rateable](https://github.com/codebyray/laravel-review-rateable.git)

It was forked initially for a headstart and a lot has been changed since then. The whole concept and methodology has been changed.

Please note that the orignal code does not matches the code from this repository as a lot has been changed.
