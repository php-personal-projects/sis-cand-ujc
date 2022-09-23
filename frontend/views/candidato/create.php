<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Candidato */

$this->title = 'Create Candidato';
$this->params['breadcrumbs'][] = ['label' => 'Candidatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidato-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
