<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MoneyDispencer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="money-dispencer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coord_x')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coord_y')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(\app\models\Status::combo()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
