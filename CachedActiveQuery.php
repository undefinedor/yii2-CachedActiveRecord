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
        $row = Yii::$app->getDb()->cache(function (Connection $db) {
            return parent::one($db);
        });
        if (!empty($row)) {
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
        return Yii::$app->getDb()->cache(function (Connection $db) {
            return parent::all($db);
        });
    }

    /**
     * Returns the query result as a scalar value.
     * The value returned will be the first column in the first row of the query results.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given, the `db` application component will be used.
     * @return string|boolean the value of the first column in the first row of the query result.
     * False is returned if the query result is empty.
     */
    public function scalar($db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) {
            return parent::scalar($db);
        });
    }

    /**
     * Returns the number of records.
     * @param string $q the COUNT expression. Defaults to '*'.
     * Make sure you properly [quote](guide:db-dao#quoting-table-and-column-names) column names in the expression.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given (or null), the `db` application component will be used.
     * @return integer|string number of records. The result may be a string depending on the
     * underlying database engine and to support integer values higher than a 32bit PHP integer can handle.
     */
    public function count($q = '*', $db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) use ($q) {
            return parent::count($q, $db);
        });
    }

    /**
     * Returns the sum of the specified column values.
     * @param string $q the column name or expression.
     * Make sure you properly [quote](guide:db-dao#quoting-table-and-column-names) column names in the expression.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given, the `db` application component will be used.
     * @return mixed the sum of the specified column values.
     */
    public function sum($q, $db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) use ($q) {
            return parent::sum($q, $db);
        });
    }

    /**
     * Returns the average of the specified column values.
     * @param string $q the column name or expression.
     * Make sure you properly [quote](guide:db-dao#quoting-table-and-column-names) column names in the expression.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given, the `db` application component will be used.
     * @return mixed the average of the specified column values.
     */
    public function average($q, $db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) use ($q) {
            return parent::average($q, $db);
        });
    }

    /**
     * Returns the minimum of the specified column values.
     * @param string $q the column name or expression.
     * Make sure you properly [quote](guide:db-dao#quoting-table-and-column-names) column names in the expression.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given, the `db` application component will be used.
     * @return mixed the minimum of the specified column values.
     */
    public function min($q, $db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) use ($q) {
            return parent::min($q, $db);
        });
    }

    /**
     * Returns the maximum of the specified column values.
     * @param string $q the column name or expression.
     * Make sure you properly [quote](guide:db-dao#quoting-table-and-column-names) column names in the expression.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given, the `db` application component will be used.
     * @return mixed the maximum of the specified column values.
     */
    public function max($q, $db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) use ($q) {
            return parent::max($q, $db);
        });
    }

    /**
     * Returns a value indicating whether the query result contains any row of data.
     * @param Connection $db the database connection used to generate the SQL statement.
     * If this parameter is not given, the `db` application component will be used.
     * @return boolean whether the query result contains any row of data.
     */
    public function exists($db = null)
    {
        return Yii::$app->getDb()->cache(function (Connection $db) {
            return parent::exists($db);
        });
    }
}