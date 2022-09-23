<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Candidato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="candidato-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_documento')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'numero_documento')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nuit')->textInput() ?>

        <?= $form->field($model, 'data_nascimento')->textInput() ?>

        <?= $form->field($model, 'naturalidade')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'contacto_actual')->textInput() ?>

        <?= $form->field($model, 'nivel_academico')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nome_escola')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'created_by')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
