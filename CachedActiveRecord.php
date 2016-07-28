<?php
namespace undefinedor\yii2;

use Yii;
/**
 * CachedActiveRecord is the ActiveRecord class with cache
 */
trait CachedActiveRecord
{
    /**
     * @inheritdoc
     * @return CachedActiveQuery the newly created [[CachedActiveQuery]] instance.
     */
    public static function find()
    {
        return Yii::createObject(CachedActiveQuery::className(), [get_called_class()]);
    }
}