  <?php

    $connect = mysqli_connect(
        'sql109.epizy.com', //Host
        'epiz_33366146',
        'XPqKajsUiP',
        'epiz_33366146_portfolio' //Database

    );

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    };
    ?>
