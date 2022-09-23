<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplina */

$this->title = 'Update Disciplina: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disciplina-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
