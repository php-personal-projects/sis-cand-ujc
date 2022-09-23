<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pagamento */

$this->title = 'Update Pagamento: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagamento-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
