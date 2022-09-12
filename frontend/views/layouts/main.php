<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?> | <?php echo $this->title?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" type="image/jpg" href="<?php echo Yii::getAlias('@web'); ?>/favicon2.png"/>


</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<?php echo $this->render('header');?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php echo $this->render('footer');?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
