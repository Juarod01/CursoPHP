<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Add Job</title>
</head>
<body>
  <h1>Add Job</h1>
  <form action="/cursophp/add/job" method="POST">
    <label for="">Title:</label>
    <input type="text" name="title">
    <br>
    <label for="">Description:</label>
    <input type="text" name="description">
    <br>
    <button type="submit">Save</button>
  </form>
</body>
</html>