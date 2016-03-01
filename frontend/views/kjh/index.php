<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\KjhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kjhs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kjh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kjh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'qh',
            'bai',
            'shi',
            'ge',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
