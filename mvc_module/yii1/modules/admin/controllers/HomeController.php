<?php


class HomeController extends AController
{

    public function actionIndex()
    {
        $this->pageTitle = $this->_title['index'];

        $dataProvider = new CActiveDataProvider('Home', array(
            'sort'       => array(
                'defaultOrder' => 'position ASC',
            ),
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));

        $this->render(
            'index',
            array(
                'dataProvider' => $dataProvider,
            )
        );
    }


}
