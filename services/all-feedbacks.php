<?php
include_once "get-messages.php";

$perPage = 25;
$page = 1;
$sort = $_POST['sort'];
$offset = 0;

if (isset($_GET['page'])){
    $page = (int) $_GET['page'];
}

$totalCountStatement  = $connection->query('SELECT * FROM `messages`');
$totalCount = count($totalCountStatement->fetchAll());
$totalPage = ceil($totalCount/$perPage);
if ($page<=1 || $page > $totalPage){
    $page = 1;
}
$offset = ($perPage*$page)-$perPage;

$getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `publication_date` DESC LIMIT $offset,$perPage");
if ($sort == "name"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `name` LIMIT  $offset,$perPage");
}

if ($sort == "email"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `email` LIMIT $offset,$perPage");
}

if ($sort == "date"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `publication_date` LIMIT $offset,$perPage");
}

if ($sort == "date-descending"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `publication_date` DESC LIMIT $offset,$perPage");
}

$getMessagesStatement->setFetchMode(PDO::FETCH_CLASS, 'Message');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../media/css/bootstrap.min.css">
    <title>Feedback</title>
</head>
<body>
<div style="margin: 10px">
    <form action="../index.php" method="post" id = "goHomeForm">
        <button type="submit" class="btn btn-success" style="margin-top: 10px">Home page</button>
    </form><br/>
    <form name = 'sort-form' action="all-feedbacks.php" method="post">
        <select placeholder="Категория" name="sort">
            <option value="name">Sort by name</option>
            <option value="email">Sort by email</option>
            <option value="date-descending">Sort by date descending</option>
            <option value="date">Sort by date</option>
        </select>
        <input type="submit" value="Submit">
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $getMessagesStatement->fetch()){?>
            <tr>
                <th><?php echo $row->getName()?></th>
                <th><?php echo $row->getEmail()?></th>
                <th><?php echo $row->getMessage()?></th>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div>
        <?php
        if ($page>1){
            echo '<a href="all-feedbacks.php?page='.($page-1).'">&laquo; Previous page </a>';
        }

        if (($page<$totalPage) ){
            echo '<a href="all-feedbacks.php?page='.($page+1).'" style="float: right">Next page &raquo;</a> ';
        }
        ?>
    </div>
</div>
</body>
</html>
