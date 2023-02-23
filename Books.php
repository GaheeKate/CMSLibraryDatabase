<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Books</title>
</head>

<body>

    <h1>List of Books</h1>

    <?php
    include("Library.php");


    $query = "SELECT Books.id as bid, Books.name as BN, Books.summary as BS, Books.inorout as ioo, Writer.* FROM Books 
        JOIN Writer ON Books.writerId = Writer.id
        ORDER BY Books.id";




    $result = mysqli_query($connect, $query)
        or die(mysqli_error($connect));


    ?>

    <div>
        <form action="" method="POST" onsubmit="setTimeout(function(){window.location.reload();},10);">
            <label for="book_id">Book ID:</label>
            <input type="text" id="book_id" name="book_id"><br><br>
            <p>*Check the checkbox to mark the book is available, submit unchecked box(empty) to mark the book is not available. </p>
            <label for="is_available">Available:</label>
            <input type="checkbox" id="is_available" name="is_available"><br><br>
            <input type="submit" value="Submit">

        </form>
    </div>


    <?php

    $book_id = $_POST['book_id'];
    $is_available = isset($_POST['is_available']) ? 1 : 0;
    $query2 = "UPDATE Books SET inorout=$is_available WHERE id=$book_id";

    $result1 = mysqli_query($connect, $query2)
    ?>


    <table class="table_book">
        <thead>
            <tr>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Summary</th>
                <th>Writer</th>
                <th>Book available</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($record = mysqli_fetch_assoc($result)) {
                echo '<tr class="books">';
                echo "<td>" . $record['bid'] . "</td>";
                echo "<td>" . $record['BN'] . "</td>";
                echo "<td>" . $record['BS'] . "</td>";
                echo '<td><a href="Writer.php">' . $record['name'] . '</a></td>';

                if ($record['ioo'] == 1) {
                    echo '<td>O</td></tr>';
                } else {
                    echo '<td>X</td></tr>';;
                }
            }

            ?>


        </tbody>
    </table>

</body>

</html>