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
    protected function stepKJH()
    {
        $follow = array();

        // 循环 1 : $i 开奖号码最后几期的行号(默认值: $i = 80 - 5) , $i = (75 - 79)循环
        for ($i = $this->entireNum - $this->analysisNum; $i < $this->entireNum; $i++) {

            $follow['hqh'] = $this->entireData[$i - 1]['qh'];
            $follow['hb'] = $this->entireData[$i - 1]['bai'];
            $follow['hs'] = $this->entireData[$i - 1]['shi'];
            $follow['hg'] = $this->entireData[$i - 1]['ge'];
            $follow['mqh'] = $this->entireData[$i]['qh'];
            $follow['mb'] = $this->entireData[$i]['bai'];
            $follow['ms'] = $this->entireData[$i]['shi'];
            $follow['mg'] = $this->entireData[$i]['ge'];

            $temp = $this->loopKjh('bai', $i);
            $follow['b0'] = $temp[0];
            $follow['b1'] = $temp[1];
            $follow['b2'] = $temp[2];
            $follow['b3'] = $temp[3];
            $follow['b4'] = $temp[4];
            $follow['b5'] = $temp[5];
            $follow['b6'] = $temp[6];
            $follow['b7'] = $temp[7];
            $follow['b8'] = $temp[8];
            $follow['b9'] = $temp[9];

            $temp = $this->loopKjh('shi', $i);
            $follow['s0'] = $temp[0];
            $follow['s1'] = $temp[1];
            $follow['s2'] = $temp[2];
            $follow['s3'] = $temp[3];
            $follow['s4'] = $temp[4];
            $follow['s5'] = $temp[5];
            $follow['s6'] = $temp[6];
            $follow['s7'] = $temp[7];
            $follow['s8'] = $temp[8];
            $follow['s9'] = $temp[9];


            $temp= $this->loopKjh('ge', $i);

            $follow['g0'] = $temp[0];
            $follow['g1'] = $temp[1];
            $follow['g2'] = $temp[2];
            $follow['g3'] = $temp[3];
            $follow['g4'] = $temp[4];
            $follow['g5'] = $temp[5];
            $follow['g6'] = $temp[6];
            $follow['g7'] = $temp[7];
            $follow['g8'] = $temp[8];
            $follow['g9'] = $temp[9];

            $this->setFollowTable($follow);
            print_r($this->getFollowTable());
        }

    }

    /**
     * @param String $bsg 选项(百位十位个位)
     * 分析的数据是开奖号码
     * $i 开奖号码最后几期的行号(默认值: $i = 80 - 5) , $i = (75 - 79)循环
     */
    protected function loopKjh(String $bsg, int $i)
    {
        $temp = array(0,0,0,0,0,0,0,0,0,0);

        // 循环 1-1 : $intervalLoop(1 - $interval) 间隔数
        for ($intervalLoop = 1; $intervalLoop <= $this->interval; $intervalLoop++) {

            // 1 根据 $i 和 $interval 得到需要匹配的号码的行号
            $matchRow = $i - $intervalLoop;

            // 循环 1-1-1 : 计算 $matchRow 所指定的号码,从整个数组的开始循环查找匹配的号码
            // 需要匹配的号码之一: 百十个
            $match = $this->entireData[$matchRow][$bsg];
            for ($row = 0; $row < $matchRow; $row++) {

                // 匹配 $match == $entireData[$row]['bai]
                if ($match == $this->entireData[$row][$bsg]) {

                    // 类似于开奖号码的跟随规则的号码
                    $followNum = $this->entireData[$row + $intervalLoop][$bsg];
                    $temp[$followNum]++;
                }
            }
        }

        // 原数组是号码 0-9 的个数集合,结果数组是 0-9 按个数的降序排序
        $result = $this->desc09($temp);
        return $result;
    }


    /**
     * @param array $arr 数组格式[0 => int ,1 => int ,ect]
     * @return array 原数组是号码 0-9 的个数集合,结果数组是 0-9 按个数的降序排序
     */
    protected function desc09(array $arr)
    {
        // step1 对数组 $arr 进行降序排序 (0 - 9 == keys)
        arsort($arr);

        // step2 结果数组 = $arr的键组成的数组, return
        $result = array_keys($arr);

        return $result;
    }
}