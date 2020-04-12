<?php
if(!isset($_COOKIE['user']))
{
    setcookie('user','Jhon',time()+30,'./');

}
echo '<pre>', var_dump($_COOKIE) ,'</pre>';