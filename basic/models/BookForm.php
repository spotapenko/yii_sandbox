<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * BookForm is the model behind the book form.
 */
class BookForm extends Model
{
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $date_create;
    /**
     * @var
     */
    public $date_update;
    /**
     * @var UploadedFile
     */
    public $preview;
    /**
     * @var
     */
    public $date;
    /**
     * @var
     */
    public $author_id;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, author_id are required
            [['name', 'email', 'author_id'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['preview'], 'file', 'skipOnEmpty' => false,
             'extensions'                       => 'png, jpg'],
        ];
    }
}
