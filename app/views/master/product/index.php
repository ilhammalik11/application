<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\Toolbar;

/* @var $this yii\web\View */
/* @var $searchModel app\models\master\searchs\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <?php
    echo Toolbar::widget(['items' => [
            ['label' => 'Create', 'url' => ['create'], 'icon' => 'fa fa-plus-square', 'linkOptions' => ['class' => 'btn btn-success btn-sm']],
            ['label' => '', 'url' => ['print'], 'icon' => 'fa fa-print', 'linkOptions' => ['class' => 'btn bg-grey btn-sm', 'target'=>'_blank']],
        //['label' => 'Detail', 'url' => ['view', 'id' => $model->id],'icon' => 'fa fa-search', 'linkOptions' => ['class' => 'btn bg-navy btn-sm']],
        //['label' => 'Update', 'url' => ['update', 'id' => $model->id],'icon' => 'fa fa-pencil', 'linkOptions' => ['class' => 'btn btn-warning btn-sm']],
        //['label' => 'Delete', 'url' => ['delete', 'id' => $model->id],'icon' => 'fa fa-trash-o', 'linkOptions' => ['class' => 'btn btn-danger btn-sm', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]],
        //['label' => 'List', 'url' => ['index'],'icon' => 'fa fa-list', 'linkOptions' => ['class' => 'btn btn-info btn-sm']]
    ]]);
    ?>
    <div class="box box-info">
        <div class="box-body no-padding">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'layout'=>"{items}\n{pager}",
                'tableOptions'=>['class'=>'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'group.name',
                    'category.name',
                    'code',
                    'name',
                    // 'status',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
