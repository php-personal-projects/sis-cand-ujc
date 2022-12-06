<?php
	$this->title = 'Dashboard';
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><? echo \frontend\models\Candidatura::find()->count(); ?> </h3>
                        <p>Total de candidaturas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        <!--                        --><?php //echo FA::icon('cog')->inverse();?>
                    </div>
                    <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><? echo \backend\models\Curso::find()->count(); ?></h3>

                        <p>Total de cursos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Total de escolas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><? echo \frontend\models\Candidatura::find()->where(['estado' => \frontend\models\Candidatura::ESTADO_COMPLETO])->count(); ?></h3>

                        <p>Total de candidaturas terminadas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.card -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
