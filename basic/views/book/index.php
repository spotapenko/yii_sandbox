<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns'      => [
                'id',
                'name',
                [
                    'attribute'      => 'preview',
                    'format'         => 'raw',
                    'value'          => function ($model) {
                        return Html:: a(
                            Html::img(
                                Yii::getAlias('@web') . $model->getThumbFileUrl(
                                    'preview', 'thumb'
                                ), []
                            ), Yii::getAlias('@web') . $model->getThumbFileUrl(
                            'preview', 'big'
                          ),
                          ['class' => 'nivoZoom']
                        );
                    },
                ],
                [
                    'attribute' => 'author_fullname',
                    'value'     => function ($model) {
                        return $model->author->firstname . " "
                        . $model->author->lastname;
                    },
                ],
                [
                    'attribute' => 'date',
                    'format'    => ['date', 'php:Y'],
                ],
                ['class'    => 'yii\grid\ActionColumn',
                 'template' => '{view}{update}{delete}',
                 'buttons'  => [
                     'view'   => function ($url, $model) {
                         return Html::a(
                             '<span class="glyphicon glyphicon-eye-open"></span>',
                             '#', [
                             'title' => Yii::t('app', 'View'),
                             'class' => 'get-item-view',
                             'data'  => [
                                 'id'  => $model->id,
                                 'url' => $url,
                             ]
                         ]
                         );
                     },
                     'update' => function ($url, $model) {
                         return Html::a(
                             '<span class="glyphicon glyphicon-pencil"></span>',
                             $url, [
                             'target' => '_blank'
                         ]
                         );
                     }
                 ],
                ],
            ],
        ]
    ); ?>

    <p>
        <?= Html::a(
            Yii::t('app', 'Create Book'), ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </p>

    <!-- Book View Modal -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Book view</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

