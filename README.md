# CachedActiveRecord For Yii2

### Installation
The preferred way to install this extension is through [Composer](https://getcomposer.org/download/) .
```
php composer.phar require undefinedor/yii2-CachedActiveRecord
```

### Configuration
In order to use CachedActiveRecord, a valid cache component must be enabled.
For Example:
```php
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
```
### Usage
It's so easy to use ,you just need to extend [[undefinedor\yii2\CachedActiveRecord]]
For example,
```php
    class XXX extends undefinedor\yii2\CachedActiveRecord
```
