<?php
namespace undefinedor\yii2;

use Yii;
use yii\db\ActiveQuery;
use yii\db\Connection;

/**
 * CachedActiveQuery represents a ActiveQuery with cache.
 */
class CachedActiveQuery extends ActiveQuery
{
    /**
     * When query caching is available return caching,
     * If not,Executes query and generates caching then returns all results .
     * @param Connection $db the DB connection used to create the DB command.
     * If null, the DB connection returned by [[modelClass]] will be used.
     * @return CachedActiveQuery|array|null a single row of query result. Depending on the setting of [[asArray]],
     * the query result may be either an array or an CachedActiveQuery object. Null will be returned
     * if the query results in nothing.
     * @throws \Exception
     */
    public function one($db = null)
    {
        $row = Yii::$app->getDb()->cache(function(Connection $db){
            return parent::one($db);
        });
        if ($row !== false) {
            $models = $this->populate([$row]);
            return reset($models) ?: null;
        } else {
            return null;
        }
    }

    /**
     * When query caching is available return caching,
     * If not,Executes query and generates caching then returns all results as an array.
     * @param Connection $db the DB connection used to create the DB command.
     * If null, the DB connection returned by [[modelClass]] will be used.
     * @return array|CachedActiveQuery[] the query results. If the query results in nothing, an empty array will be returned.
     * @throws \Exception
     */
    public function all($db = null)
    {
        return Yii::$app->getDb()->cache(function(Connection $db){
            return parent::all($db);
        });
    }
}