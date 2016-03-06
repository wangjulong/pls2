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

class Analysis extends AnalysisModel
{
    /**
     * @return mixed 设置 $this->followTable
     */
    public function stepKJH()
    {
        $follow['bai'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $follow['shi'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $follow['ge'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        // 循环1: $entireData 数组的最后 $analysisNum 期的数据，统计出结果
        // $analysisNum=5,$i=最后 5 期的行号
        for ($i = $this->entireNum - $this->analysisNum; $i < $this->entireNum; $i++) {


            // 循环 1-1 : 计算 $i 所指定的号码,循环间隔 $intervalLoop(1 --> $interval)
            for ($intervalLoop = 1; $intervalLoop <= $this->interval; $intervalLoop++) {

                // 1 根据 $i 和 $interval 得到需要匹配的号码的行号
                $matchRow = $i - $intervalLoop;

                // 循环 1-1-1 : 计算 $matchRow 所指定的号码,从整个数组的开始循环查找匹配的号码
                // 需要匹配的号码之一: 百位号码
                $match = $this->entireData[$matchRow]['bai'];
                for ($row = 0; $row < $matchRow; $row++) {
                    // 匹配 $match == $entireData[$row]['bai]
                    if ($match == $this->entireData[$row]['bai']) {
                        // 类似于开奖号码的跟随规则的号码
                        $followNum = $this->entireData[$row + $intervalLoop]['bai'];
                        $follow['bai'][$followNum]++;
                    }
                }

            }
        }

        print_r($follow['bai']);
    }
}