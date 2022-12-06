<?php

namespace frontend\controllers;
use backend\models\Disciplina;
use backend\models\Pagamento;
use common\models\User;
use Yii;
use frontend\models\Candidato;
use frontend\models\SignupForm;
use frontend\models\Candidatura;
use frontend\models\CandidaturaSearch;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CandidaturaController implements the CRUD actions for Candidatura model.
 */
class CandidaturaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Candidatura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CandidaturaSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$dataProvider = new ActiveDataProvider([
			'query' => Candidatura::find()
			->andWhere(['created_by' => Yii::$app->user->id]),
			'pagination' => [
				'pageSize' => 50
			],
			'sort' => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				]
			],

		]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Candidatura model.
     * @param int $id ID
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Candidatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$disciplina = new Disciplina();
        $model = new Candidatura();
		$candidato = new Candidato();
		$signupForm = new SignupForm();
		$pagamento = new Pagamento();




			if ($this->request->isPost) {
				if ($model->load($this->request->post()) &&
					$candidato->load($this->request->post()) &&
					$signupForm->load($this->request->post()) &&
					$pagamento->load($this->request->post())) {


					//candidato section
					$candidato->created_at = new Expression('NOW()');
					$candidato->save();

					//user section
					$test = $signupForm->username; //get the username before creating new user
					$signupForm->signup();

					// get the user to fill created_by columns for other tables
					$newUser = User::findByUsername($test);
					$newUserId = $newUser['id'];

					//payment section
					//calculating the payment value based on the price of the subjects registered for the selected
					$taxaInscricao = $disciplina->getSubjectPrices($model->curso_id);

					$pagamento->candidato_id = $candidato->id;
					$pagamento->data = new Expression('NOW()');
					$pagamento->valor = $taxaInscricao;
					$pagamento->contacto = $candidato->contacto_actual;
					$pagamento->save();

					// candidatura section
					$model->candidato_id = $candidato->id;
					$model->created_at = new Expression('NOW()');
					$model->created_by = $newUserId;

					// change the application status based on the payment method selected
					if ($pagamento->modo_pagamento == Pagamento::DEPOSITO) {
						$model->estado = Candidatura::ESTADO_PENDENTE;
					}else{
						$model->estado = Candidatura::ESTADO_COMPLETO;
					}
					$model->save();

						Yii::$app->session->setFlash('success',
							'<h2>Obrigado pela sua candidatura!</h2><span>Consulte a sua caixa de mensagens para ter os dados de acesso ao sistema!</span>');
						return $this->goHome();
				}


			} else {
				$model->loadDefaultValues();
			}

			return $this->render('create', [
				'model' => $model, 'candidato' => $candidato,
				'signupForm' =>$signupForm,
				'pagamento' => $pagamento
			]);

    }

    /**
     * Updates an existing Candidatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$candidato = $this->findModel($id);
		$pagamento = $this->findModel($id);
		$signupForm = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			return $this->render('update', [
                'model' => $model,
				'candidato' => $candidato,
				'pagamento' => $pagamento,
				'signupForm' => $signupForm,
            ]);
        }
    }

    /**
     * Deletes an existing Candidatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Candidatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Candidatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Candidatura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	/**
	 * This method will return the candidate_Id for the logged user
	 *
	 * @param $user_id
	 * @return int
	 */
	public function getCandidatoIdFromLoggedUser($user_id){
		return User::find()
			->select('user.candidato_id')
			->from('user')
			->join('INNER JOIN', 'candidato', 'user.candidato_id = candidato.id')
			->where(['user.id' => $user_id])->one()->candidato_id;


	}

}
