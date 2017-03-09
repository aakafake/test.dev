<?php
/**
 * @var $this HomeController
 */

$this->breadcrumbs += array($this->pageTitle);

$this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'home-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $dataProvider,
        'columns' => array(
            array('name' => 'type', 'value' => '$data->type == "banner" ? "Баннеры" : "Товары"'),
            array('name' => 'name'),
            array('name' => 'description'),
            array('name' => 'position'),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 50px')
            ),
        ),
    )
);
