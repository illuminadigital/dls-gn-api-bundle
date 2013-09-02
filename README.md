Good Neighbours API Symfony2 Bundle
========================

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
    illumina_gn_base_url: 'http://gn.gary.illuminadev.co.uk'
    illumina_gn_key: '8405fe88e4611a2a085358c27e5b4a19'
    illumina_gn_secret: 'eaee64cee30571e4f1d806662c509a6a
```