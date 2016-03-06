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
    protected $entireData = [];   // 分析所需要的全部的数据,格式:['0' => ['qh' => 2015289,'bai' => 5,'shi' => 2,'ge' => 9],...]
    protected $entireNum;         // 数据的行数 用于初始化分析的数据
    protected $followTable;       // 跟随表
    protected $analysisNum;       // 分析的期数
    protected $interval;          // 间隔期数（用于生成跟随表时的计算参数）越大越细致

    /**
     * 初始化参数
     * AnalysisModel constructor.
     * @param $entireNum    int 数据的行数 用于初始化分析的数据
     * @param $analysisNum  int 分析的期数
     * @param $interval     int 间隔期数
     */
    public function __construct($entireNum = 80, $analysisNum = 5, $interval = 3)
    {
        $this->analysisNum = $analysisNum;
        $this->interval = $interval;
        $this->entireNum = $entireNum;
        $this->entireData = $this->getEntireData($entireNum);
    }

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

    /**
     * 整个分析的流程控制函数
     * 需要的数据和参数都在 __construct 函数中初始化完成
     * 只需要子类依次实现本函数调用的函数即可
     */
    public function entire()
    {
        $this->stepKJH();
    }

    /**
     * @return mixed 设置 $this->followTable
     */
    public abstract function stepKJH();


}