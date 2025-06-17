<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Matangazo;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class MatangazoController extends Controller
{
    public function actionIndex()
    {
        // Ongeza matangazo yaliyochapishwa tu, order kwa tarehe desc, pagination 10
        $dataProvider = new ActiveDataProvider([
            'query' => Matangazo::find()
                ->where(['imechapishwa' => true])
                ->orderBy(['tarehe_ya_tangazo' => SORT_DESC]),
            'pagination' => ['pageSize' => 10],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        // Onyesha tangazo moja linalochapishwa
        $model = Matangazo::findOne(['id' => $id, 'imechapishwa' => true]);
        if (!$model) {
            throw new NotFoundHttpException('Tangazo halipo au halijachapishwa.');
        }

        return $this->render('view', ['model' => $model]);
    }
}
