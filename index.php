<!--<p>-->
<?php
//    phpinfo();
//echo "hello ";
//$some = "world!";
//echo "$some";
//
//$l = array();
//$l['name'] = 'RCOS';
//$l['project'] = 'APL';
//
//echo "<pre>";
//print_r($l);
//echo "<pre>";
//$name = $l['name'] ?? 'not found';
//echo "Name=$name";
//?>
<!--</p>-->

<?php
    $oldname = $_POST['name'] ?? '';
    $oldpw = $_POST['pw'] ?? '';
?>

<html lang="en">
<head>
    <title>APL SYSTEM</title>
</head>
<h1>Welcome to RCOS PROJECT: APL SYSTEM</h1>
<form method="post">
    <p><label for="inp01">Input name</label>
    <input type="text" name="name" id="inp01" size="40" value="<?= htmlentities($oldname) ?>"/></p>
    <p><label for="inp02">Input password</label>
    <input type="password" name="pw" id="inp02" size="40" value="<?= htmlentities($oldpw) ?>"/></p>
    <p><label for="inp03">What to do:<br /></label>
    <input type="radio" name="action" value="input" id="inp03" checked>input<br>
        <input type="radio" name="action" value="search" id="inp03">search<br></p>
    <input type="submit"/>
</form>
</html>

<pre>
    $_POST:
    <?php
    print_r($_POST);
    ?>
    $_GET:
    <?php
    print_r($_GET);
    ?>
<pre>
