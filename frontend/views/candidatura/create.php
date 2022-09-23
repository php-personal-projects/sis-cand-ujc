<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
    /* @var $model frontend\models\Candidatura */
	/* @var $signupForm frontend\models\SignupForm */
    /* @var $candidato frontend\models\Candidato */
    /* @var $pagamento backend\models\Pagamento */

$this->title = 'Candidatura';
//$this->params['breadcrumbs'][] = ['label' => 'Candidaturas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidatura-create">

    <?= $this->render('_form', [
        'model' => $model,
        'candidato' => $candidato,
        'signupForm' => $signupForm,
        'pagamento' => $pagamento,
    ]) ?>

</div>
