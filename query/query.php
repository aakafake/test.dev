<?php
Pay::find()->indexBy('id')
           ->where(['status' => Pay::STATUS_TEST, 'user_id' => $user_id])
           ->all();
?>

SELECT *
FROM
(
    SELECT *
    FROM `table`
    ORDER BY `date` DESC
  ) as `new_table`
GROUP BY `test_id`

<?php
$result = (new Query())
    ->from([
        'new_table' => (new Query())
            ->from('table')
            ->orderBy([
                'date' => SORT_DESC
            ])
    ])
    ->groupBy('test_id')
    ->all();
