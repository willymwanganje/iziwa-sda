<?php

namespace frontend\controllers;

use Yii;
use common\models\Matukio;
use common\models\MatukioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * MatukioController for frontend: Inaonyesha matukio tu (hakuna CRUD).
 */
class MatukioController extends Controller
{
    /**
     * Lists all Matukio models with search, filtering, pagination, and livesearch.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatukioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Live search support
        if (Yii::$app->request->isAjax && Yii::$app->request->get('term')) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $term = Yii::$app->request->get('term');
            $results = Matukio::find()
                ->where(['ilike', 'jina', $term])
                ->limit(10)
                ->all();
            $out = [];
            foreach ($results as $model) {
                $out[] = ['id' => $model->id, 'label' => $model->jina, 'value' => $model->jina];
            }
            return $out;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matukio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Matukio model based on its primary key value.
     * @param integer $id
     * @return Matukio the loaded model
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Matukio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}