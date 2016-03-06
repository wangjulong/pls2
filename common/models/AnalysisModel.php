<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-3-6
 * Time: 上午8:40
 */

namespace common\models;


abstract class AnalysisModel
{
    // 整个分析的数据集
    private $entireData = [];

    // 跟随表
    private $followTable;

    public function getEntireData($entireNum)
    {
        if ($this->entireData != null) {
            return $this->entireData;
        }
        // 数据库中的条目数
        $count = Kjh::find()->count();

        // 1 取最后的 $entireNum 条 数据

        $this->entireData = Kjh::find()->offset($count - $entireNum)
            ->limit($entireNum)
            ->asArray()
            ->all();

        return $this->entireData;
    }

    public function getFollowTable()
    {
        return $this->followTable;
    }

    public function setFollowTable($followTable)
    {
        $this->followTable = $followTable;
    }
}