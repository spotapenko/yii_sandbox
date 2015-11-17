<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 *
 * @property Authors $author
 */
class Book extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_create', 'date_update', 'date'], 'required'],
            [['date_create', 'date_update', 'date'], 'safe'],
            [['author_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            ['preview', 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Title'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
            'preview' => Yii::t('app', 'Preview'),
            'date' => Yii::t('app', 'Date'),
            'author_id' => Yii::t('app', 'Author ID'),
            'author_fullname' => Yii::t('app', 'Author'),
        ];
    }

    public function behaviors()
    {
        return [
          [
            'class' => '\yiidreamteam\upload\FileUploadBehavior',
            'attribute' => 'preview',
            'filePath' => '@webroot/uploads/[[pk]]',
            'fileUrl' => '/uploads/[[pk]]',
          ],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->preview->saveAs('uploads/' . $this->preview->baseName . '.' . $this->preview->extension);
            return true;
        } else {
            xdebug_var_dump($this->preview);
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function  getAuthorFullname() {
        return $this->author->fullname;
    }
}
