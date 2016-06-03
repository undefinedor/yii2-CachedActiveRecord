<?php
namespace undefinedor\yii2;

use Yii;
use yii\db\ActiveRecord;
/**
 * CachedActiveRecord is the ActiveRecord class with cache
 */
class CachedActiveRecord extends ActiveRecord
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