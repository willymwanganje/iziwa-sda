<?php

namespace backend\controllers;

use Yii;
use common\models\Matukio;
use common\models\MatukioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * MatukioController implements the CRUD actions for Matukio model bila upload ya picha.
 */
class MatukioController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete', 'bulk-delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $user = Yii::$app->user->identity;
                            return in_array($user->role_id, [
                                \common\models\User::ROLE_ADMIN,
                                \common\models\User::ROLE_KATIBU,
                                \common\models\User::ROLE_MCHUNGAJI,
                            ]);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'bulk-delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new MatukioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Matukio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Tukio limeongezwa kikamilifu!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Tukio limehaririwa kikamilifu!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Tukio limefutwa kikamilifu!');
        return $this->redirect(['index']);
    }

    public function actionBulkDelete()
    {
        $ids = Yii::$app->request->post('ids', []);
        if (!empty($ids)) {
            Matukio::deleteAll(['id' => $ids]);
            Yii::$app->session->setFlash('success', 'Matukio yamefutwa kikamilifu!');
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Matukio::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}