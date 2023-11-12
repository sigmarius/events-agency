<?php
namespace frontend\controllers;

use Yii;
use common\models\Post;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BlogController
 */
class BlogController extends Controller
{
    const LATEST_POSTS_COUNT = 10;

    /**
     * Displays Blog index page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->params['subTitle'] = 'Latest posts';
        
        $posts = Post::getPosts(self::LATEST_POSTS_COUNT);
        return $this->render('index', compact('posts'));
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'post' => Post::findModel($id),
        ]);
    }

}
