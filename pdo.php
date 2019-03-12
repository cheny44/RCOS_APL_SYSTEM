<?php
/**
 * Created by PhpStorm.
 * User: Yitong Chen
 * Date: 3/12/2019
 * Time: 1:55 AM
 */
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=RCOS_APL','kurot','5gengliuli');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);