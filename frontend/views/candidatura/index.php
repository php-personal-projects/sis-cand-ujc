<?php

	use common\models\User;
	use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CandidaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Candidaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidatura-index box box-primary">
    <?php Pjax::begin(); ?>
    <h2 style="text-align: center">Minhas candidaturas</h2>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],
                [
					'attribute' => 'candidato_id',
					'value' => 'candidato.nome',
				],
				[
					'attribute' => 'curso_id',
					'value' => 'curso.nome',
				],
                'regime',
                'estado',
                 'created_at',
                // 'updated_at',
                // 'created_by',

//                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
