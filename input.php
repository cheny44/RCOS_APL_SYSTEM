<!doctype html>
<html>
<head>
    <title>INPUT</title>
</head>

<body>

<form action="input_helper.php" method="POST">
    Input Single Event<br>
    Name: <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name"><br>
    Age: <input type="text" name="age" placeholder=" Age"><br>
    Date: <input type="date" name="date" placeholder="YYYY-MM-DD"><br>
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
    Incident Description: <br><textarea name="description" rows="5" cols="40"> </textarea><br>
    Ban Type: <select name="ban_type">
        <option></option>
        <option>Active</option>
        <option>Permanent</option>
    </select>
    Start Date: <input type="date" name="bs" placeholder="yyyy-mm-dd">
    End Date (Leave Blank if Permanent): <input type="date" name="be" placeholder="YYYY-MM-DD"><br>
    Comment: <br><textarea name="comment" rows="5" cols="40"> </textarea><br>
    <button type="submit" name="submit" value="submit">Submit</button>

</form>
<form action="csv_parser.php" method="post" enctype="multipart/form-data">
    Batch inputting ( Please using CSV file )<br>
    File upload: <input type="file"  name="filename" id="filename">
    <button type="submit" id="submit" name="submit">Upload</button>
</form>

</body>
</html>