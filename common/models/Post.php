<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $body
 * @property string $created_at
 *
 * @property User $author
 * @property string $postSubtitleInfo
 */
class Post extends \yii\db\ActiveRecord
{
    const READING_WORDS_IN_MINUTE = 265;
    const FILLER = ' &#183; ';

    public function getPostSubtitleInfo()
    {
        $this->setPostSubtitleInfo();
        return $this->postSubtitleInfo;
    }

    public function setPostSubtitleInfo()
    {
        $postWordsCount = StringHelper::countWords($this->body);
        $timeToReadPost = round($postWordsCount / self::READING_WORDS_IN_MINUTE);

        $readTimeLabel = $timeToReadPost <= 1 
        ? 'about a minute read' 
        : $timeToReadPost . ' min. read';

        $this->postSubtitleInfo = $this->author->fullName 
        . self::FILLER
        . Yii::$app->formatter->asDate($this->created_at, 'php:d.m.Y')
        . self::FILLER
        . $readTimeLabel;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['author_id', 'default', 'value' => Yii::$app->user->id],
            [['author_id', 'title', 'body'], 'required'],
            [['author_id'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false, // мы не храним время обновления в базе
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'body' => 'Body',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }


    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public static function findModel($id)
    {
        if (($model = self::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Post models by needed count.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer postsCount
     * @return Post founded posts
     * @throws NotFoundHttpException if the model cannot be found
     */
    public static function getPosts(int $postsCount)
    {
        $query = self::find()
            ->orderBy(['created_at' => SORT_DESC]);

        if (isset($postsCount)) {
            $query->limit($postsCount);
        }

        $posts = $query->all();

        if (empty ($posts)) {
            throw new NotFoundHttpException('Посты не найдены');
        }

        return $posts;
    }
}
