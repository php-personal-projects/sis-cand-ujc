<?php

	use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	/* @var $this yii\web\View */
    /* @var $model frontend\models\Candidatura */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $signupForm frontend\models\SignupForm */
    /* @var $candidato frontend\models\Candidato */
	/* @var $pagamento Backend\models\Pagamento */
?>

<!--CSS for form-->
<style>
    .btn-color {
        background-color: #1ab2ff;
        color:white;
    }
    :root{
        --primary-color: rgb(131, 161, 208)
    }
    *, *::before, *::after{
        box-sizing: border-box
    }
    body{
        font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        display: grid;
        /*place-items: center;*/
        /*min-height: 100vh;*/
        /*background-color: #0b4eb3*/
    }
    label{
        display: block;
        margin-bottom: 0.5rem
    }
    input{
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        height: 50px
    }
    .width-50{
        width: 50%
    }
    .ml-auto{
        margin-left: auto
    }
    .text-center{
        text-align: center
    }
    .progressbar{
        position: relative;
        display: flex;
        justify-content: space-between;
        counter-reset: step;
        margin: 2rem 0 4rem
    }
    .progressbar::before, .progress{
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: 1
    }
    .progress{
        background-color: rgb(0 128 0);
        width: 0%;
        transition: 0.3s
    }
    .progress-step{
        width: 2.1875rem;
        height: 2.1875rem;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1
    }
    .progress-step::before{
        counter-increment: step;
        content: counter(step)
    }
    .progress-step::after{
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666
    }
    .progress-step-active{
        background-color: #007bff;
        color: #f3f3f3
    }
    .form{
        width: clamp(600px, 30%, 430px);
        margin: 0 auto;
        margin-right: 350px;
        border: none;
        border-radius: 10px !important;
        overflow: hidden;
        /*padding: 1.5rem;*/
        background-color: #fff;
        padding: 20px 30px
    }
    .step-forms{
        display: none;
        transform-origin: top;
        animation: animate 1s
    }
    .step-forms-active{
        display: block
    }
    .group-inputs{
        margin: 1rem 0
    }
    @keyframes animate{
        from{
            transform: scale(1, 0);
            opacity: 0
        }
        to{
            transform: scale(1, 1);
            opacity: 1
        }
    }
    .btns-group{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem
    }
    .btn{
        padding: 0.75rem;
        display: block;
        text-decoration: none;
        background-color: #007bff;
        color: #f3f3f3;
        text-align: center;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: 0.3s
    }

    .btn-back{
        padding: 0.75rem;
        display: block;
        text-decoration: none;
        background-color: var(--primary-color);
        color: #f3f3f3;
        text-align: center;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: 0.3s
    }
    .btn:hover{
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color)
    }

    .btn-back:hover{
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color)
    }
    .progress-step-check{
        position: relative;
        background-color: green !important;
        transition: all 0.8s
    }
    .progress-step-check::before{
        position: absolute;
        content: '\2713';
        width: 100%;
        height: 100%;
        top: 8px;
        left: 13px;
        font-size: 12px
    }
    .group-inputs{
        position: relative
    }
    .group-inputs label{
        font-size: 13px;
        position: absolute;
        height: 19px;
        padding: 4px 7px;
        top: -14px;
        left: 10px;
        color: #a2a2a2;
        background-color: white
    }
    .welcome{
        height: 450px;
        width: 350px;
        background-color: #fff;
        border-radius: 6px;
        display: flex;
        justify-content: center;
        align-items: center
    }
    .welcome .content{
        display: flex;
        align-items: center;
        flex-direction: column
    }
    .checkmark__circle{
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
    }
    .checkmark{
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }
    .checkmark__check{
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }
    @keyframes stroke{
        100%{
            stroke-dashoffset: 0
        }
    }
    @keyframes scale{
        0%, 100%{
            transform: none
        }
        50%{
            transform: scale3d(1.1, 1.1, 1)
        }
    }
    @keyframes fill{
        100%{
            box-shadow: inset 0px 0px 0px 30px #7ac142
        }
    }
</style>

<div class="candidatura-form box box-primary">
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' =>'form']]); ?>
<!--    , 'id' => 'forms'-->
    <div class="box-body">

            <div class="progressbar">
                <div class="progress" id="progress"></div>

                <div class="progress-step progress-step-active" data-title="Dados Pessoais"></div>
                <div class="progress-step" data-title="Curso"></div>
                <div class="progress-step" data-title="Pagamento"></div>
                <div class="progress-step" data-title="Conta"></div>
                <div class="progress-step" data-title="Confirmação"></div>

            </div>

<!--            ACCOUNT SECTION-->
            <div class="step-forms step-forms-active">
                <div class="group-inputs">
                    <label for="phone">Nome</label>
					<?= $form->field($candidato, 'nome', ['inputOptions' => ['id'=>'nomeId']])->textInput(['maxlength' => true, 'autofocus' => true, 'class' => 'form-control']) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Sexo</label>
					<?= $form->field($candidato, 'sexo', ['inputOptions' => ['id'=>'sexoId']])->dropDownList(['M' => 'Masculino', 'F' => 'Feminino'], ['prompt' => 'Genero', 'class' => 'form-control']) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Tipo de Documento</label>
					<?= $form->field($candidato, 'tipo_documento', ['inputOptions' => ['id'=>'tipoDocumentoId']])->dropDownList([ 'BI' => 'BI', 'Passaporte' => 'Passaporte', 'DIRE' => 'DIRE', 'CartaoEleitor' => 'Cartao de eleitor', ], ['prompt' => 'Tipo de documento', 'class' => 'form-control']) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Numero do documento</label>
					<?= $form->field($candidato, 'numero_documento', ['inputOptions' => ['id'=>'numeroDocumentoId']])->textInput(['maxlength' => true]) ?>
                </div>

                <div class="group-inputs">
                    <label for="email">Nuit</label>
					<?= $form->field($candidato, 'nuit', ['inputOptions' => ['id'=>'nuitId']])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="group-inputs">
                    <label for="dob">Data de Nascimento</label>
					<?= $form->field($candidato, 'data_nascimento', ['inputOptions' => ['id'=>'nascimentoId']])->textInput([ 'type' => 'date']) ?>
                </div>

                <div class="group-inputs">
                    <label for="email">Naturalidade</label>
					<?= $form->field($candidato, 'naturalidade', ['inputOptions' => ['id'=>'naturalidadeId']])->textInput(['maxlength' => true]) ?>
                </div>

                <div class="group-inputs">
                    <label for="email">Provincia de residencia</label>
					<?= $form->field($candidato, 'provincia', ['inputOptions' => ['id'=>'provinciaId']])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Contacto</label>
					<?= $form->field($candidato, 'contacto_actual', ['inputOptions' => ['id'=>'contactoId']])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Nivel academico</label>
					<?= $form->field($candidato, 'nivel_academico', ['inputOptions' => ['id'=>'nivelMedioId']])->dropDownList([ 'medio' => '12a Classe', 'superior' => 'Superior', 'tecnico' => 'Tecnico' ], ['prompt' => 'Nivel academico', 'class' => 'form-control']) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Nome da escola</label>
					<?= $form->field($candidato, 'nome_escola', ['inputOptions' => ['id'=>'nomeEscolaId']])->textInput(['maxlength' => true]) ?>
                </div>

                <div class="">
                    <a href="#" class="btn btn-next width-50 ml-auto btn-color">Proximo</a>
                </div>
            </div>



<!--            COURSE SECTION-->
            <div class="step-forms">
                <div class="group-inputs">
                    <label for="phone">Nome do curso</label>
					<?= $form->field($model, 'curso_id', ['inputOptions' => ['id'=>'cursoId']])->dropDownList(
						ArrayHelper::map(\backend\models\Curso::find()->all(),'id','nome'), ['prompt' => 'Escolha um curso ', 'class' => 'form-control']);?>
                </div>
                <div class="group-inputs">
                    <label for="email">Regime</label>
					<?= $form->field($model, 'regime', ['inputOptions' => ['id'=>'regimeId']])->dropDownList([ 'laboral' => 'Laboral', 'pos-laboral' => 'Pos-Laboral'], ['prompt' => 'Escolha um regime', 'class' => 'form-control']) ?>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn-back btn-prev">Voltar</a>
                    <a href="#" class="btn btn-next">Proximo</a>
                </div>
            </div>

<!--            PAYMENT SECTION-->
            <div class="step-forms">
                <div class="group-inputs">
                    <label for="phone">Modo de Pagamento</label>
					<?= $form->field($pagamento, 'modo_pagamento', ['inputOptions' => ['id'=>'modoPagamentoId']])->dropDownList(['M-pesa' => 'M-pesa', 'mKesh' => 'M-kesh',
                        'E-Mola' => 'E-Mola', 'Deposito' => 'Deposito'], ['prompt' => 'Modo de pagamento' , 'class' => 'form-control']) ?>
                </div>
                <div class="group-inputs">
                    <label for="email">Contacto</label>
                    <?= $form->field($pagamento, 'contacto', ['inputOptions' => ['id'=>'contactoPagamentoId']])->textInput(['maxlength' => true, 'type' => 'phone', 'class' => 'form-control'])?>
                </div>

                <div class="btns-group">
                    <a href="#" class="btn-back btn-prev">Voltar</a>
                    <a href="#" class="btn btn-next">Proximo</a>
                </div>
            </div>

        <!--            CANDIDATO SECTION-->
        <div class="step-forms">
            <div class="group-inputs">
                <label for="username">Username</label>
                <?= $form->field($signupForm, 'username')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="group-inputs">
                <label for="position">Email</label>
                <?= $form->field($signupForm, 'email')->textInput([ 'type' => 'email']) ?>
            </div>
            <div class="group-inputs">
                <label for="email">Password</label>
                <?= $form->field($signupForm, 'password')->textInput([ 'type' => 'password']) ?>
            </div>
            <div class="btns-group">
                <a href="#" class="btn-back btn-prev">Voltar</a>
                <a href="#" class="btn btn-next" id="confirm_id" onclick="printDetails()">Proximo</a>
            </div>
        </div>

<!--            CONFIRMATION SECTION -->
            <div class="step-forms">
                <label for="dob">Confirmação</label>

                <h6 id="nameTitle"><b>Nome: </b> </h6>
                <h6 id="cursoTitle"><b>Curso: </b> </h6>
                <h6 id="regimeTitle"><b>Regime: </b> </h6>
                <h6 id="modoPagamentoTitle"><b>Modo de Pagamento: </b> </h6>
                <h6 id="disciplinasTitle"><b>Disciplinas: </b></h6>

                <div class="btns-group">
                    <a href="#" class="btn-back btn-prev">Voltar</a>
					<?= Html::submitButton('Submeter', ['class' => 'btn btn-flat', 'id' => 'submit-form']) ?>
                </div>
            </div>
<!--        </form>-->

    </div>
    <?php ActiveForm::end(); ?>
</div>


<!--JAVASCRIPT -->

<script>
    const prevBtns = document.querySelectorAll(".btn-prev");
    const nextBtns = document.querySelectorAll(".btn-next");
    const progress = document.getElementById("progress");
    const formSteps = document.querySelectorAll(".step-forms");
    const progressSteps = document.querySelectorAll(".progress-step");


    let formStepsNum = 0;

    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();

        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();

        });
    });

    function updateFormSteps() {
        formSteps.forEach((formStep) => {
            formStep.classList.contains("step-forms-active") &&
            formStep.classList.remove("step-forms-active");
        });

        formSteps[formStepsNum].classList.add("step-forms-active");
    }

    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");

            } else {
                progressStep.classList.remove("progress-step-active");

            }
        });

        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum) {

                progressStep.classList.add("progress-step-check");
            } else {

                progressStep.classList.remove("progress-step-check");
            }
        });

        const progressActive = document.querySelectorAll(".progress-step-active");

        progress.style.width =
            ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }


    document.getElementById("submit-form").addEventListener("click", function () {

        progressSteps.forEach((progressStep, idx) => {
            if (idx <= formStepsNum) {

                progressStep.classList.add("progress-step-check");
            } else {

                progressStep.classList.remove("progress-step-check");
            }
        });

        // var forms = document.getElementById("forms");
        // forms.classList.remove("form");
        // forms.innerHTML = '<div class="welcome"><div class="content"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg><h2>Obrigado pela sua candidatura!</h2><span>Consulte a sua caixa de mensagens para ter os dados de acesso ao sistema!</span><div></div>';
        // $('#submit-form').on('click', function() {
        // $form.submit();
    });
</script>


<script>

    function printDetails(){
        var nomeCand = document.getElementById('nomeId').value
        var cursoCand = document.getElementById('cursoId').value
        var regimeCurso = document.getElementById('regimeId').value
        var modoPagamento = document.getElementById('modoPagamentoId').value
        //create the table with subjects
        var table = "<table border=1 width=100%>";
            table += "<tr><td align=left>Portugues</td></tr>";
            table += "<tr><td align=left>Matematica</td></tr>";
            table += "<tr><td align=left><b>Total pago:</b> 600mt</td></tr>";
            table += "</table>";

        document.getElementById("nameTitle").innerHTML += nomeCand;
        document.getElementById("cursoTitle").innerHTML += "Engenharia em Tecnologias e Sistemas de Informação";
        document.getElementById("regimeTitle").innerHTML += regimeCurso;
        document.getElementById("modoPagamentoTitle").innerHTML += modoPagamento;
        document.getElementById("disciplinasTitle").innerHTML += table;

    }

</script>