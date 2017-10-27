<?php
use yii\grid\GridView;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'orderId',
        'orderSn',
        'buyerName',
        'buyerMobile',
        'goodsId'
    ]
]);?>