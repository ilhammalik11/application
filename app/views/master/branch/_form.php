<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\master\Orgn;

/* @var $this yii\web\View */
/* @var $model app\models\master\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orgn_id')->dropDownList(ArrayHelper::map(Orgn::find()->all(), 'id', 'name')); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 32]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
