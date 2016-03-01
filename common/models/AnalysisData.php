<?php
/**
 * Created by PhpStorm.
 * User: wangjulong
 * Date: 2015/12/31
 * Time: 9:10
 */

namespace common\models;

/**
 * Class AnalysisData 存储分析号码中得到的数据
 * @package common\models
 */

class AnalysisData
{
    // 整个分析的数据集
    private static $entireData = [];
    private static $followTable;

    /**
     * 该函数返回静态成员 $entireData（分析过程中用到的所有数据）
     * 如果已经从数据库中取得数据，则直接返回当前的数据，否则连接数据库并获取数据并返回
     * @param integer $entireNum  从数据库中取出的最后多少期数据
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getEntireData($entireNum)
    {
        if (self::$entireData != null) {
            return self::$entireData;
        }
        // 数据库中的条目数
        $count = Kjh::find()->count();

        // 1 取最后的 $entireNum 条 数据

        self::$entireData = Kjh::find()->offset($count - $entireNum)
            ->limit($entireNum)
            ->asArray()
            ->all();

        return self::$entireData;
    }

    /**
     * @return mixed
     */
    public static function getFollowTable()
    {
        return self::$followTable;
    }

    /**
     * @param mixed $followTable
     */
    public static function setFollowTable($followTable)
    {
        self::$followTable = $followTable;
    }


}