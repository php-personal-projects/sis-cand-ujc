<?php

	use frontend\assets\AppAsset;
	use yii\bootstrap4\Html;
	use yii\bootstrap4\Nav;
	use yii\bootstrap4\NavBar;

	AppAsset::register($this);

?>
	<header>
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//		'options' => [
//			'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
//		],
//	]);
//		$menuItems = [
//			['label' => 'Home', 'url' => ['/site/index']],
//			['label' => 'About', 'url' => ['/site/about']],
//			['label' => 'Contact', 'url' => ['/site/contact']],
//		];
//		if (Yii::$app->user->isGuest) {
//			$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//		}
//
//		echo Nav::widget([
//			'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
//			'items' => $menuItems,
//		]);
//		if (Yii::$app->user->isGuest) {
//			echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
//		} else {
//			echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
//				. Html::submitButton(
//					'Logout (' . Yii::$app->user->identity->username . ')',
//					['class' => 'btn btn-link logout text-decoration-none']
//				)
//				. Html::endForm();
//		}
//		NavBar::end();
//	?>
        <!--IF THE CANDIDATE IS NOT AUTHENTICATED-->
     <?php    if (Yii::$app->user->isGuest) { ?>

        <!-- Navbar Start -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0 px-lg-5 fixed-top" style="border:solid 1px; border-radius: 20px">

                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <img src="<?php
						echo Yii::getAlias('@web'); ?>/img/logo2.png" style="height: 50px" alt="Sis-Cand-Logo">
                </div>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                    <div class="navbar-nav py-0">
						<?= Html::a('Inicio', ['/site/index'], ['class' => 'nav-item nav-link active']) ?>
						<?= Html::a('Edital', ['/site/about'], ['class' => 'nav-item nav-link']) ?>
						<?= Html::a('Contactos', ['/site/contact'], ['class' => 'nav-item nav-link']) ?>
                    </div>
					<?= Html::a('Entrar', ['/site/login'], ['class' => 'btn btn-primary py-0 px-4 d-none d-lg-block']) ?>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <?php } else { ?>
<!--IF THE CANDIDATE IS AUTHENTICATED-->
         <div class="container-fluid p-0">
             <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0 px-lg-5 fixed-top" style="border:solid 1px; border-radius: 20px">

                 <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                     <img src="<?php
						 echo Yii::getAlias('@web'); ?>/img/logo2.png" style="height: 50px" alt="Sis-Cand-Logo">
                 </div>
                 <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                     <div class="navbar-nav py-0">
						 <?= Html::a('Minhas Candidaturas', ['/candidatura/index'], ['class' => 'nav-item nav-link']) ?>
						 <?= Html::a('Exames', ['/site/about'], ['class' => 'nav-item nav-link']) ?>
						 <?= Html::a('Resultados', ['/site/contact'], ['class' => 'nav-item nav-link']) ?>
                     </div>
                     <p><?php echo Yii::$app->user->identity->username ?></p>
					 <?= Html::a(
						 'Sair',
						 ['/site/logout'],
						 ['data-method' => 'post', 'class' => 'btn btn-primary py-0 px-4 d-none d-lg-block']
					 ) ?>
                 </div>
             </nav>
         </div>

       <?php }?>
	</header>

