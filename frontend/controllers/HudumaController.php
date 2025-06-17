<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Huduma;
use yii\web\NotFoundHttpException;

class HudumaController extends Controller
{
    public function actionIndex()
    {
        $hudumaList = Huduma::find()->all();
        return $this->render('index', [
            'hudumaList' => $hudumaList,
        ]);
    }

    public function actionView($id)
    {
        $model = Huduma::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Huduma haikupatikana.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
