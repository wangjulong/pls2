<?php
/**
 * Created by PhpStorm.
 * User: wangjulong
 * Date: 2015/12/31
 * Time: 9:09
 */

namespace common\models;

/**
 * Class Analysis 分析类
 * @package common\models
 * 控制分析过程的流程
 */

class Analysis
{
    /**
     * 分析的整个流程控制函数
     * @param array $entireNum 整个分析过程用到的所有号码期数
     * @param integer $analysisNum 具体分析的期数
     * @param integer $chartNum 走势图中显示的期数
     * @param integer $interval 分析过程中用于计算的间隔期数，越大计算越复杂,默认值为 3
     *
     * 步骤：
     * 1 从数据库中取出数据 $entireData
     * 2 计算数据：根据参数计算出开奖号码跟随表并保存到 AnalysisData::$followTable
     */
    public function entire($entireNum, $analysisNum, $chartNum, $interval)
    {
        // 1 从 AnalysisData 取出数据
        $entireData = AnalysisData::getEntireData($entireNum);

        // 2 计算数据：根据参数计算出开奖号码跟随表并保存到 AnalysisData::$followTable
        $arr = AnalysisHelpers::stepKJH($entireData,$entireNum,$analysisNum,$interval);
//        AnalysisData::setFollowTable($arr);
//        print_r($arr);


    }


}