<?php

    include('conf/connection.php');

    // setting the 'name' field from the categories table to be 'category_name'
    // So I can pull it from the $posts variable and echo it out
    $query = 'SELECT 
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
            FROM
                posts p
            LEFT JOIN
                categories c ON p.category_id = c.id
            ORDER BY
                p.created_at DESC';
    
    $stmt = $conn->query($query);

    $rowCount = $stmt->rowCount();

    if($rowCount > 0) {
        $posts = $stmt->fetchAll();
    } else {
        echo '<h1>There are no posts on this website</h1>';
    }

?>


<?php include('includes/header.php'); ?>

<div class="container">
    <?php foreach($posts as $post): ?>
    <div class="post">
        <h1><?php echo $post->title; ?></h1>

        <p class="lead"><?php echo $post->body; ?></p>

        <p>Posted by: <strong><?php echo $post->author; ?></strong> On: <strong><?php echo $post->created_at; ?></strong></p>

        <p>Posted in <strong><a href="#"><?php echo $post->category_name; ?></a></strong></p>

        <a href="<?php echo ROOT_URL; ?>post_detail.php?id=<?php echo $post->id; ?>" class="btn btn-primary">Read More</a>

    </div>
    <hr>
    <?php endforeach; ?>
</div>


<?php include('includes/footer.php'); ?>

