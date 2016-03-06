### 排列三分析系统结构和实现过程
* [__construct](#stepInit): 初始化数据和必须的参数
* [stepKJH](#stepKJH): 整理数据 $entireData,得出结果:跟随表
* [stepANA](#stepANA): 分析跟随表 完善跟随表的后半部分'Z单百'-->'B整个'
* [stepZD](#stepZD)
* [stepBD](#stepBD)
* [stepZDBD](#stepZDBD)
* [stepNow](#stepNow)
* [执行过程](#run)

<span id="stepInit"></span>
> __construct: 初始化成员变量

    protected $entireData = [];   // 分析所需要的全部的数据,格式:['0' => ['qh' => 2015289,'bai' => 5,'shi' => 2,'ge' => 9],...]
    protected $entireNum;         // 数据的行数 用于初始化分析的数据
    protected $followTable;       // 跟随表
    protected $analysisNum;       // 分析的期数
    protected $interval;          // 间隔期数（用于生成跟随表时的计算参数）越大越细致

    $entireNum = 80     分析中用到的全部数据的行数,用于初始化数据
    $analysisNum = 5    实际分析的数据行数
    $intervalNum = 3    间隔期数

<span id="stepKJH"></span>
> stepKJH 整理数据 $entireData,得出结果:跟随表

* 跟随表

        $followTable = [
            '基础期号=> '2015001',
            '号1'   => '0-9',
            '号2'   => '0-9',
            '号3'   => '0-9',
            '处理期号=> '2015002',
            '码1'   => '0-9',
            '码2'   => '0-9',
            '码3'   => '0-9',
            '百0'   => '0-9',
            '百1'   => '0-9',
            '百2'   => '0-9',
            '百3'   => '0-9',
            '百4'   => '0-9',
            '百5'   => '0-9',
            '百6'   => '0-9',
            '百7'   => '0-9',
            '百8'   => '0-9',
            '百9'   => '0-9',
            '十0'   => '0-9',
            '十1'   => '0-9',
            '十2'   => '0-9',
            '十3'   => '0-9',
            '十4'   => '0-9',
            '十5'   => '0-9',
            '十6'   => '0-9',
            '十7'   => '0-9',
            '十8'   => '0-9',
            '十9'   => '0-9',
            '个0'   => '0-9',
            '个1'   => '0-9',
            '个2'   => '0-9',
            '个3'   => '0-9',
            '个4'   => '0-9',
            '个5'   => '0-9',
            '个6'   => '0-9',
            '个7'   => '0-9',
            '个8'   => '0-9',
            '个9'   => '0-9',
            'ZD百'  => '003-300',
            'ZD十'  => '003-300',
            'ZD个'  => '003-300',
            'BD百'  => '003-300',
            'BD十'  => '003-300',
            'BD个'  => '003-300',
            'Z单百' => '003-300',
            'Z单十' => '003-300',
            'Z单个' => '003-300',
            'Z整百' => '003-300',
            'Z整十' => '003-300',
            'Z整个' => '003-300',
            'B单百' => '003-300',
            'B单十' => '003-300',
            'B单个' => '003-300',
            'B整百' => '003-300',
            'B整十' => '003-300',
            'B整个' => '003-300',
        ]
    
* 步骤1
* 步骤2
* 步骤N

<span id="stepANA"></span>
> stepANA 分析跟随表 完善跟随表的后半部分'Z单百'-->'B整个'

* 步骤1：设置：ANA表中的 百、十、个分别划分为 3 个区（共9区）
* 步骤2：命名：B1 B2 B3 S1 S2 S3 G1 G2 G3（Range类型）
* 步骤3：命名：处理期号号码为：NB NS NG
* 步骤4:

        百主动值 = Application.CountIf(B1, NB) _
            + Application.CountIf(B1, NS) _
            + Application.CountIf(B1, NG) _
            & Application.CountIf(B2, NB) _
            + Application.CountIf(B2, NS) _
            + Application.CountIf(B2, NG) _
            & Application.CountIf(B3, NB) _
            + Application.CountIf(B3, NS) _
            + Application.CountIf(B3, NG)
* 步骤5：

        被动 = Application.CountIf(B1, 0) _
        + Application.CountIf(S1, 0) _
        + Application.CountIf(G1, 0) _
        & Application.CountIf(B2, 0) _
        + Application.CountIf(S2, 0) _
        + Application.CountIf(G2, 0) _
        & Application.CountIf(B3, 0) _
        + Application.CountIf(S3, 0) _
        + Application.CountIf(G3, 0)

* 步骤6: 十位和个位依次类推
* 步骤7: 数据整理

<span id="stepZD"></span>
> stepZD


* 整理 ZD 数据
* 步骤：
* 1：确定结果数据的期数：参数 ChartNum
* 2：确定基础期单元格区域
* 3：分别 处理单独和整体 排序
* 4：基础数据 添加

<span id="stepBD"></span>
> stepBD

* 整理 BD 数据
* 步骤：
* 1：确定结果数据的期数：参数 ChartNum
* 2：确定基础期单元格区域
* 3：分别 处理单独和整体 排序
* 4：基础数据 添加

<span id="stepZDBD"></span>
> stepZDBD

'确定ZD BD 整理的期数并复制到ZDBD

'确定ZD BD的开始行和结束行

<span id="stepNow"></span>
> stepNow

* 1 列举所有号码
* 2 计算 ZD BD
* 3 FZD表(百、十、个、全部)排序名次
* 4 FBD表(0-9、全部)排序名次
* 5 按照 ZDBD表完成历史和NOW数据
* 6 复制 FINAL 到 Win
* 7 把 3-300 的标记改为 0-9
* 8 ZDBD表 走势分析


<span id="run"></span>
> 执行过程

1. stepKJH:

    整理数据 $entireData,得出结果:跟随表

2. Step_ANA

    分析跟随表 完善跟随表的后半部分'Z单百'-->'B整个',后期的 ZD BD 全部是在跟随表的基础上整理出来的数据
    
3. Step_ZD(ChartNum) 

        
    
4. Step_BD(ChartNum)
5. Step_ZDBD
6. Step_Now