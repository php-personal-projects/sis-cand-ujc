<?php

	use yii\helpers\ArrayHelper;
	use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'curso_id')->dropDownList(ArrayHelper::map(\backend\models\Curso::find()->all(),
            'id','nome'), ['prompt' => 'Escolha um curso ']) ?>

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'preco')->textInput() ?>


    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
