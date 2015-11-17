<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
        'id',
        'name',
      //  'preview',
        [
          'attribute' => 'preview',
          'format' => 'html',
          'value' => function ($data) {
              return Html::img(Yii::getAlias('@web').'/uploads/'. $data['preview'],
                ['width' => '120px']);
          },
        ],
  /*      [
          'attribute' => 'preview',
          'format' => 'image',
          'value' => function($model) { return BaseUrl::base().'/uploads/'.$model->preview ;},
        ],*/
        [
          'attribute' => 'author_fullname',
          'value' => function($model) { return $model->author->firstname  . " " . $model->author->lastname ;},
        ],
        [
          'attribute' => 'date',
          'format' => ['date', 'php:Y'],
        ],
        ['class' => 'yii\grid\ActionColumn'],
      ],
    ]); ?>

</div>
