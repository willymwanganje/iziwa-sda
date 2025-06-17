<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use common\models\Huduma;
use common\models\CreateTableForm;
use yii\filters\VerbFilter;

class HudumaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'delete-column' => ['POST'],
                    'drop-table' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Huduma::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Huduma();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Huduma imeongezwa kikamilifu.');
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Huduma imesasishwa kikamilifu.');
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->post('confirm') === 'yes') {
            $model = $this->findModel($id);
            $model->delete();
            Yii::$app->session->setFlash('success', 'Huduma imefutwa.');
            return $this->redirect(['index']);
        }

        return $this->render('confirm', [
            'action' => 'Futa Huduma',
            'id' => $id,
        ]);
    }

    public function actionAddColumn()
    {
        $model = new \yii\base\DynamicModel(['column_name', 'data_type']);
        $model->addRule(['column_name', 'data_type'], 'required');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            try {
                Huduma::addColumn($model->column_name, $model->data_type, true);
                Yii::$app->session->setFlash('success', 'Column imeongezwa kikamilifu.');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Kosa: ' . $e->getMessage());
            }
        }

        return $this->render('add-column', ['model' => $model]);
    }

    public function actionDeleteColumn()
    {
        $model = new \yii\base\DynamicModel(['column_name']);
        $model->addRule(['column_name'], 'required');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            try {
                Huduma::deleteColumn($model->column_name, true);
                Yii::$app->session->setFlash('success', 'Column imefutwa kikamilifu.');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Kosa: ' . $e->getMessage());
            }
        }

        return $this->render('delete-column', ['model' => $model]);
    }

    public function actionCreateTable()
    {
        $model = new CreateTableForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            try {
                $model->createTable();
                Yii::$app->session->setFlash('success', 'Jedwali limeundwa kikamilifu!');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Kosa: ' . $e->getMessage());
            }
        }

        return $this->render('create-table', ['model' => $model]);
    }

    public function actionDropTable()
    {
        $model = new \yii\base\DynamicModel(['confirm']);
        $model->addRule(['confirm'], 'required');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->confirm === 'yes') {
                try {
                    Huduma::dropTable(true);
                    Yii::$app->session->setFlash('success', 'Jedwali limefutwa kikamilifu!');
                    return $this->redirect(['index']);
                } catch (\Exception $e) {
                    Yii::$app->session->setFlash('error', 'Kosa: ' . $e->getMessage());
                }
            } else {
                Yii::$app->session->setFlash('error', 'Umehitaji kuthibitisha kitendo.');
            }
        }

        return $this->render('confirm', [
            'action' => 'Futa Jedwali',
            'id' => null,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Huduma::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Huduma haijapatikana.');
    }
}
