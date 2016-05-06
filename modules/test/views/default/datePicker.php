<?php 
use kartik\date\DatePicker;
echo DatePicker::widget([ 
    'name' => 'Article[created_at]', 
    'options' => ['placeholder' => '...'], 
    //value值更新的时候需要加上 
    'value' => '2016-05-03', 
    'pluginOptions' => [ 
        'autoclose' => true, 
        'format' => 'yyyy-mm-dd', 
        'todayHighlight' => true, 
    ] 
]); ?>