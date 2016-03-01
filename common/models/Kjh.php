<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kjh".
 *
 * @property integer $qh
 * @property integer $bai
 * @property integer $shi
 * @property integer $ge
 */
class Kjh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kjh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qh', 'bai', 'shi', 'ge'], 'required'],
            [['qh', 'bai', 'shi', 'ge'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qh' => '期号',
            'bai' => '百位',
            'shi' => '十位',
            'ge' => '个位',
        ];
    }

    /**
     * todo 复制来的代码
     * @return array 开奖号码二维数组
     * 通过百度彩票网得到开奖数据(二维数组)
     * 2015101 =>
     * array(size = 9)
     * 0 => string '2015101' (length = 7)
     * 1 => string '07' (length = 2)
     * 2 => string '12' (length = 2)
     * 3 => string '16' (length = 2)
     * 4 => string '18' (length = 2)
     * 5 => string '22' (length = 2)
     * 6 => string '23' (length = 2)
     * 7 => string '29' (length = 2)
     * 8 => string '06' (length = 2)
     */
    public function getKjhBD()
    {
        // 保存结果的二维数组
        $numbers = array();
        $snoopy = new Snoopy();

        // 得到网页内容
        $strBD = "http://chart.cp.360.cn/zst/p3/?lotId=110033&span=1000";
        $snoopy->fetch($strBD);

        // 取出网页内容到变量中
        $result = $snoopy->results;

        // 把结果转换成数组
        $separator = 'tdbg_1 colorC6';
        $arr = explode($separator, $result);

        // 遍历数组，并截取需要的部分
        foreach ($arr as $value) {

            // 截取字符串功能
            $pattern = substr($value, 3, 3);

            if ($pattern == '201') {

                // 临时数组
                $temps = array();

                // 期号位于数组的开始部分
                $temps['qh'] = substr($value, 3, 4) . substr($value, 8, 3);

                $bsg = strpos($value, "<strong ");

                $temps[0] = substr($value, $bsg + 20, 1);
                $temps[1] = substr($value, $bsg + 21, 1);
                $temps[2] = substr($value, $bsg + 22, 1);

                $numbers[$temps['qh']] = array(
                    $temps['qh'],
                    $temps[0],
                    $temps[1],
                    $temps[2]
                );
            }
        }

        //返回结果数组
        return $numbers;
    }

}
