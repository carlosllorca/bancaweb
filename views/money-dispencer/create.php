<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MoneyDispencer */

$this->title = 'Create Money Dispencer';
$this->params['breadcrumbs'][] = ['label' => 'Money Dispencers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="money-dispencer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
