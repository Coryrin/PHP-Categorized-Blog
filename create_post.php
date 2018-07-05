<?php 

    include('conf/connection.php');

    $msg = '';
    $msgClass = '';

    $query = 'SELECT * FROM categories';

    $stmt = $conn->query($query);

    $categories = $stmt->fetchAll();

    

    if(isset($_POST['submit'])){
        // Get title data
        $title = htmlspecialchars($_POST['title']);
        // sanitize the string from title var
        $safe_title = filter_var($title, FILTER_SANITIZE_STRING);

        // Get author data
        $author = htmlspecialchars($_POST['author']);
        // Sanitize the string from author var
        $safe_author = filter_var($author, FILTER_SANITIZE_STRING);

        // Get body data
        $body = htmlspecialchars($_POST['body']);
        // Sanitize the string from body var
        $safe_body = filter_var($body, FILTER_SANITIZE_STRING);

        $category_id = $_POST['category'];


        if(!empty($safe_title) && !empty($safe_author) && !empty($safe_body)){

            $query = "INSERT INTO posts
                    SET
                        title = :title,
                        author = :author,
                        body = :body,
                        category_id = :category_id";

            $stmt = $conn->prepare($query);

            $stmt->execute(['title' => $safe_title, 'author' => $safe_author, 'body' => $safe_body, 'category_id' => $category_id]);

            $msg = 'Post successfully added!';
            $msgClass = 'alert-success';

            // header('Location: index.php');

        } else {
            // post failed. Field was empty
            $msg = 'Post not added! Please double check your post';
            $msgClass = 'alert-danger';
        }
    }

?>

<?php include('includes/header.php'); ?>

<div class="container">

    <div class="msg alert <?php echo $msgClass; ?>">
        <?php
            if($msg !== '') {
                echo $msg;
            }
        ?>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Enter post title">
        </div>

        <div class="form-group">
            <input type="text" name="author" class="form-control" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Enter post here" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category">

                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>">
                    <?php echo $category->name; ?>
                    </option>
                <?php endforeach; ?>
                
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
