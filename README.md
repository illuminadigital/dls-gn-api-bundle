Good Neighbours API Symfony2 Bundle
========================

API Documentation /api/doc/

## Installation

Installation is a quick process:

1. Download GnApiBundle using composer
2. Enable the Bundle
3. Configure the GnApiBundle
4. Use the GnApiBundle

### Step 1: Download FOSUserBundle using composer

Add GnApiBundle in your composer.json:

```js
{
    "require": {
        "illuminadigital/dls-gn-api-bundle": "*@dev",
    }
}
```

```js
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/illuminadigital/dls-gn-api-bundle.git",
            "type": "git"
        }
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update illuminadigital/dls-gn-api-bundle
```

Composer will install the bundle to your project's `vendor/illumina` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Illumina\GnApiBundle\IlluminaGnApiBundle(),
    );
}
```

### Step 3: Configure the GnApiBundle

``` js
// app/config/parameters.yml
parameters:
    illumina.gn.base_url: 'URL'
    illumina.gn.key: 'KEY'
    illumina.gn.secret: 'SECRET
```

``` js
// app/config/config.yml
# GN API Bundle config
illumina_gn_api:
    base_url:   %illumina.gn.base_url%
    key:        %illumina.gn.key%
    secret:     %illumina.gn.secret%
```

### Step 3: Use the GnApiBundle

In a controller

``` php
<?php

// Get all the user info
$this->get('illumina.gn.retriever')->getUserInfo(USER_TOKEN,USERNAME);

//Get the current time on the API server
$this->get('illumina.gn.retriever')->getTime();
```