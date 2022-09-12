<?php

/** @var yii\web\View $this */

	use frontend\assets\AppAsset;
	use yii\bootstrap4\Html;
	use backend\models\Curso;

	$cursos = Curso::find()->orderBy(['created_at'=>SORT_ASC])->all();

//	$this->title = 'My Yii Application';
	AppAsset::register($this);
?>

<style>
    .card-img-top {
        width: 100%;
        height: 10vw;
        object-fit: cover;
    }
</style>
<div class="site-index">
    <div class="p-2 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Bem vindo ao SIS-CAND UJC</h1>
            <p class="fs-5 fw-light">Sistema de Gestão de Candidaturas de Novos Ingressos à Universidade Joaquim Chissano</p>
            <br><br>
            <h3>Cursos Disponíveis</h3>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 justify-content-center">
		<?php if (!empty($cursos)){
            foreach ($cursos as $curso) { ?>
        <div class="col mb-4">

            <!-- Card -->
            <div class="card">

                <!--Card image-->
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.webp"
                         alt="Card image cap" >
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!--Card content-->
                <div class="card-body">

                    <!--Title-->
                    <h5 class="card-title text-center"><?php echo $curso->nome; ?></h5>
                    <hr class="hr-light">
                    <!--Text-->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Duração:</strong> <?php echo $curso->duracao; ?></li>
                        <li class="list-group-item"><strong>Regime:</strong> <?php echo $curso->regime; ?></li>
                        <li class="list-group-item"><strong>Vagas:</strong> <?php echo $curso->numero_vagas; ?></li>
                    </ul>
                    <hr class="hr-light">
					<?= Html::a('Candidatar-me', ['/site/login'], ['class' => 'btn btn-primary py-0 px-4 d-none d-lg-block']) ?>
                </div>

            </div>

            <!-- Card -->
        </div>
		<?php }
        } else {
            echo "<h4>Nenhum curso disponivel no momento</h4>";
		}?>
    </div>

</div>
