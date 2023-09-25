<?php

namespace app\controllers;

use app\models\Employee;
use app\models\Request as ModelsRequest;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Request models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ModelsRequest::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Request model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ModelsRequest();

        if ($this->request->isGet && $this->request->get('user')) {
            return $this->personRequest($this->request, $model);
        }

        if ($this->request->isPost) {
            $post = $this->request->post();
            // проверяем отправителя
            $employee = Employee::find()->where(['email' => $post['Employee']['email']])->one();

            if ($employee == null) {
                return $this->render('create', [
                    'model' => $model,
                    'employee' => new Employee(),
                    'error' => "Не существует пользователя с email " . $post['Employee']['email'],
                ]);
            }

            $request = new ModelsRequest();
            $request->to_emoloyee_id = $post['Request']['to_emoloyee_id']; // кому
            $request->text = $post['Request']['text'];
            $request->from_employee_id = $employee->id; // от кого

            if ($request->validate()) {
                $request->save();
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'employee' => new Employee(),
                    'error' => "Проверьте введенные данные.",
                ]);
            }
            return $this->redirect(['employee/list']);
        } else {
            $model->loadDefaultValues();
        }
        //dde($model);
        return $this->render('create', [
            'model' => $model,
            'employee' => new Employee(),
        ]);
    }

    /**
     * Страница пользователя
     * @param mixed $request
     * @param ModelsRequest $model
     * @return string
     */
    private function personRequest($request, $model)
    {
        $session = Yii::$app->session;
        // id пользователя
        $id = $session[$request->get('user')]['id'];
        // если есть отправка заявки
        if ($request->get('Request')) {
            //$model = new ModelsRequest();
            $model->text = $request->get('Request')['text'];
            $model->to_emoloyee_id = $id;
            //dde($model);
            if ($model->validate()) {
                $model->save();

                return $this->redirect(['employee/list']);
            } else {
                $error = "Проверьте введенные данные.";
            }
        }
        $employee = Employee::findOne($id);

        return $this->render('createperson', [
            'model' => $model,
            'employee' => $employee,
            'error' => isset($error) ? $error : false,
        ]);
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return ModelsRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ModelsRequest::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
