<?php
/**
 * Created by PhpStorm.
 * User: wangjulong
 * Date: 2015/12/31
 * Time: 9:11
 */

namespace common\models;

/**
 * Class AnalysisHelpers 分析工具类：号码分析所用到的方法
 * @package common\controllers
 */
class AnalysisHelpers
{

    /**
     * @param array $entireData 所有需要的数据
     * @param integer $entireNum $entireData 的条数
     * @param integer $analysisNum 需要分析的数据
     * @param integer $interval 分析过程中用于计算的间隔期数，越大计算越复杂,默认值为 3
     * @return array $result
     * [
     * A: 基数期号 号1 号2 号3 处理期号 码1 码2 码3
     * B: 百0 百1 百2 百3 百4 百5 百6 百7 百8 百9
     * C: 十0 十1 十2 十3 十4 十5 十6 十7 十8 十9
     * D: 个0 个1 个2 个3 个4 个5 个6 个7 个8 个9
     * E: ZD百 ZD十 ZD个 BD百 BD十 BD个
     * F: Z单百 Z单十 Z单个 Z整百 Z整十 Z整个
     * G: B单百 B单十 B单个 B整百 B整十 B整个
     * ]
     * 返回跟随表
     * A: 期号和开奖号码
     * BCD: 根据 $entireData,$entireNum,$analysisNum,$interval
     *      按照跟随方式计算所得到的号码排序顺序表
     * E.ZD: B 或 C 或 D 中 开奖号码的分布号码表示 003 012 021 030 102 111 120 201 210 300
     * E.BD: BCD混合的数据中 开奖号码的分布号码表示 003 012 021 030 102 111 120 201 210 300
     * F: 对 E 部分的整理
     * G: 对 E 部分的整理
     *
     * 步骤：
     * 循环1: $entireData 数组的最后 $analysisNum 期的数据，统计出结果
     * 循环1-1: 计算 $i 所指定的号码,循环间隔 intervalLoop(1 --> $interval)
     * 循环１-１-１: 计算 $matchRow 所指定的号码,从整个数组的开始循环查找匹配的号码
     *
     * 循环1-1结束
     * 循环1结束
     */
    public static function stepKJH($entireData, $entireNum, $analysisNum, $interval)
    {

        $follow['bai'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $follow['shi'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $follow['ge'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        // 循环1: $entireData 数组的最后 $analysisNum 期的数据，统计出结果
        // $analysisNum=5,$i=最后 5 期的行号
        for ($i = $entireNum - $analysisNum; $i < $entireNum; $i++) {

            /**
             * Running Status:
             * $entireData: [
             *      '0' => [
             *          'qh' => 2015289,
             *          'bai' => 5,
             *          'shi' => 2,
             *          'ge' => 9
             *      ],
             *      ...
             * ]
             * $entireNum:80
             * $analysisNum:5
             * $interval:3
             * $i : 75,76,77,78,79
             */

            // 循环 1-1 : 计算 $i 所指定的号码,循环间隔 $intervalLoop(1 --> $interval)
            for ($intervalLoop = 1; $intervalLoop <= $interval; $intervalLoop++) {

                // 1 根据 $i 和 $interval 得到需要匹配的号码的行号
                $matchRow = $i - $intervalLoop;

                // 循环 1-1-1 : 计算 $matchRow 所指定的号码,从整个数组的开始循环查找匹配的号码
                // 需要匹配的号码之一: 百位号码
                $match = $entireData[$matchRow]['bai'];
                for ($row = 0; $row < $matchRow; $row++) {
                    // 匹配 $match == $entireData[$row]['bai]
                    if ($match == $entireData[$row]['bai']) {
                        // 类似于开奖号码的跟随规则的号码
                        $followNum = $entireData[$row + $intervalLoop]['bai'];
                        $follow['bai'][$followNum]++;
                    }
                }

            }
        }

        print_r($follow['bai']);
    }


}