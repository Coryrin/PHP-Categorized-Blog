<?php

    include('conf/connection.php'); 

    $id = htmlspecialchars($_GET['id']);

    $query = 'SELECT * FROM posts WHERE id = ?';
    
    $stmt = $conn->prepare($query);

    $stmt->execute([$id]);

    $post = $stmt->fetch();

    

    if(isset($_POST['submit'])){

        // Get title data
        $title = htmlspecialchars($_POST['title']);
        // sanitize the string from title var
        $safe_title = filter_var($title, FILTER_SANITIZE_STRING);

        // Get body data
        $body = htmlspecialchars($_POST['body']);
        // Sanitize the string from body var
        $safe_body = filter_var($body, FILTER_SANITIZE_STRING);

        $update_id = $_POST['hidden_id'];

        $query = 'UPDATE posts SET title = :title, body = :body WHERE id = :id';

        $stmt = $conn->prepare($query);

        $stmt->execute(['title' => $safe_title, 'body' => $safe_body, 'id' => $update_id]);

        header('Location: index.php');
    }

?>

<?php include('includes/header.php'); ?>
<div class="container">
    

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <input type="text" name="title" class="form-control" value="<?php echo $post->title; ?>">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="body" rows="3"><?php echo $post->body; ?></textarea>
        </div>
        <input type="hidden" name="hidden_id" value="<?php echo $post->id; ?>">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
</div>


<?php include('includes/footer.php'); ?>
