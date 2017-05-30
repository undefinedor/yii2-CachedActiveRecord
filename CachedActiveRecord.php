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
        return Yii::createObject([
            'class'      => CachedActiveQuery::className(),
            'duration'   => null,
            'dependency' => null
        ], [get_called_class()]);
    }
}