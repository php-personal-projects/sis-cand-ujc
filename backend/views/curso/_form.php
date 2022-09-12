<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'duracao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'numero_vagas')->textInput() ?>

        <?= $form->field($model, 'regime')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'plano_curso')->textInput(['maxlength' => true]) ?>


    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
