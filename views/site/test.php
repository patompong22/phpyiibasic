<h1><?php echo $title;?></h1>
<br>
<?php

echo 'This is Test view';
echo '<hr>';
echo 'data from controller ::'.$cat;
?>

<hr>
<h1>แสดงผลแบบ Array</h1>
<?php
print_r($ar);
echo '<hr>';
print_r($person);
echo '<hr>';

foreach ($person as $key=> $item) {
    echo $item['fname'].'/'.$item['lname'].'/'.$item['email'].'<br>';
}