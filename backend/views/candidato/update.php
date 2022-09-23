<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Candidato */

$this->title = 'Update Candidato: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="candidato-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
