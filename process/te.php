<?php

$q='create table code_blue_pediatric_test <br> (id int PRIMARY KEY auto_increment, <br>';
for($i=1;$i<22;$i++)
{
        $q.="pager$i bit,<br>";
}
for($i=1;$i<22;$i++)
{
        $q.="iphone$i bit,<br>";
}
$q.= "code_date datetime default current_timestamp);";

echo $q;
