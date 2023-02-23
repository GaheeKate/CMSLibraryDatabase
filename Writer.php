<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Writer</title>
</head>

<body>
    <h1>List of Writers</h1>

    <a id="backlink" href="Books.php">Back to Books</a>

    <?php
    include("Library.php");

    $query1 = "SELECT * FROM Writer 
    ORDER BY name";


    $result1 = mysqli_query($connect, $query1)
        or die(mysqli_error($connect));


    ?>

    <table class="table_book">
        <thead>
            <tr>
                <th>Writer Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($record = mysqli_fetch_assoc($result1)) {
                echo "<td>" . $record['name'] . "</td>";
                echo "<td>" . $record['phone'] . "</td>";
                echo "<td>" . $record['address'] . "</td>";
                echo "<td>" . $record['city'] . '</td></tr>';
            }
            ?>
        </tbody>
    </table>

</body>

</html>