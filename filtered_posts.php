<?php

    include('conf/connection.php');

    $query = 'SELECT * FROM posts WHERE category_id = ? ORDER BY created_at DESC';

    // Grab the variable for the id from javascript
    $id = $_GET['category'];

    $stmt = $conn->prepare($query);

    $stmt->execute([$id]);

    $posts = $stmt->fetchAll();

    // VOILA

?>

<?php include('includes/header.php'); ?>


<h1 class="text-center">Here are all the posts posted with the selected category:</h1>

<br>

<div class="container">
    <div class="posts">

        <?php foreach($posts as $post): ?>

            <div class="post">
                <h2><?php echo $post->title; ?></h2>

                <p class="lead"><?php echo $post->body; ?></p>

                <p>Posted by: <strong><?php echo $post->author; ?></strong> On: <strong><?php echo $post->created_at; ?></strong></p>

                <a href="<?php echo ROOT_URL; ?>post_detail.php?id=<?php echo $post->id; ?>" class="btn btn-primary">Read More</a>
            </div>
            <hr>

        <?php endforeach; ?>

    </div>
</div>