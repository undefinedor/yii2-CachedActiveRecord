# CachedActiveRecord For Yii2

### Installation
The preferred way to install this extension is through [Composer](https://getcomposer.org/download/) .
```
composer require undefinedor/yii2-cached-active-record
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
It's so easy to use ,you just need to use [[undefinedor\yii2\CachedActiveRecord]]
For example,
```php
    <?php
    
    namespace common\models;
    
    use undefinedor\yii2\CachedActiveRecord;
    use yii\db\ActiveRecord;
    
    class BaseActiveRecord extends ActiveRecord
    {
        use CachedActiveRecord;
        
        //todo 
    }
```
