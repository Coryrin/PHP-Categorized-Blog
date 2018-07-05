<?php

    include('conf/connection.php'); 

    $id = $_GET['id'];

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
            WHERE 
                p.id = ?';

                
    
    $stmt = $conn->prepare($query);

    $stmt->execute([$id]);

    $post = $stmt->fetch();

    

    if(isset($_POST['submit'])){
        $delete_id = $_POST['hidden_id'];

        $query = 'DELETE FROM posts WHERE id = ?';

        $stmt = $conn->prepare($query);

        $stmt->execute([$delete_id]);

        header('Location: index.php');
    }

?>

<?php include('includes/header.php'); ?>
<div class="container">
    <div class="post-detail">
        <h1><?php echo $post->title; ?></h1>

        <p class="lead"><?php echo $post->body; ?></p>

        <p>Posted in <strong><a href='#'><?php echo $post->category_name; ?></a></strong></p>

        <p>Posted by: <strong><?php echo $post->author; ?></strong> On: <strong><?php echo $post->created_at; ?></strong></p>

        <a href="<?php echo ROOT_URL; ?>update_post.php?id=<?php echo $post->id; ?>" class="btn btn-primary">Update</a>
        
        <br><br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="hidden_id" value="<?php echo $post->id; ?>">

            <input type="submit" name="submit" value="Delete Post" class="btn btn-danger">
        </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>
