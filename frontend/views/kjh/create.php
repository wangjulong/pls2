<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Kjh */

$this->title = 'Create Kjh';
$this->params['breadcrumbs'][] = ['label' => 'Kjhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kjh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
