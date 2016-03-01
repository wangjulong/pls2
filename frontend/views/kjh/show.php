<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Kjh */
$this->title = '查询开奖号码';
$this->params['breadcrumbs'][] = ['label' => '开奖号码', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kjh-create">
    <div class="row">
        <table class="table table-bordered text-center table-hover table-condensed" style="width:55%">
            <div class="container">
                <div class="row" style="width:35%">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="期数" name="num">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">查询</button>
                            </span>
                            <span class="input-group-btn">
                                <?= Html::a('添加开奖号码', ['create'], ['class' => 'btn btn-success']) ?>
                            </span>
                        </div>
                    </form>
                </div><!-- /.row -->
            </div>
            <!--/.container-->
            <thead>
            <tr>
                <th style="text-align:center">期号</th>
                <th style="text-align:center">0</th>
                <th style="text-align:center">1</th>
                <th style="text-align:center">2</th>
                <th style="text-align:center">3</th>
                <th style="text-align:center">4</th>
                <th style="text-align:center">5</th>
                <th style="text-align:center">6</th>
                <th style="text-align:center">7</th>
                <th style="text-align:center">8</th>
                <th style="text-align:center">9</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model as $arr): ?>
                <?= $arr; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!--/.row-->
</div>