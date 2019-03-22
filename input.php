<!doctype html>
<html>
<head>
    <title>INPUT</title>
</head>

<body>

<form action="input_helper.php" method="POST">
    Name: <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name"><br>
    Age: <input type="text" name="age" placeholder=" Age"><br>
    Date: <input type="date" name="date" placeholder="Date"><br>
    Branch: <select name="branch">
        <option>APLB</option>
        <option>APLD</option>
        <option>APLH</option>
        <option>APLM</option>
        <option>APLW</option>
        <option>APLY</option>
        <option>Other</option>
    </select>
    <input type="text" name="branch" placeholder="Other Branch"><br>
    Comment: <br><textarea name="comment" rows="5" cols="40"> </textarea><br>
    <button type="submit" name="submit" value="submit">Submit</button>

</form>

<?php
echo "input"
?>


</body>
</html>