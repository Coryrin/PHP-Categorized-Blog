<?php
	require('conf/connection.php');

	if(isset($_POST['searchSubmit'])) {
		$user = $_POST['userSearch'];

		$sql = 'SELECT * FROM posts WHERE author LIKE ?';

		$stmt = $conn->prepare($sql);
        $stmt->execute([$user]);
        
        $posts = $stmt->fetchAll();

        $postCount = $stmt->rowCount();
    }

?>

<?php include('includes/header.php'); ?>

<div class="container">

    <?php if($postCount > 0): ?>
        <h1>Here are all the posts made by <?php echo $user; ?></h1>
    <?php else: ?>
        <h1>There have been no posts made by the user you searched.</h1>
    <?php endif; ?>

    <div class="posts">
        <?php foreach($posts as $post): ?>

            <h3><?php echo $post->title; ?></h3>

            <p class="lead"><?php echo $post->body; ?></p>

            <p>Posted by: <strong><?php echo $post->author; ?></strong> On: <strong><?php echo $post->created_at; ?></strong></p>

            <a href="<?php echo ROOT_URL; ?>post_detail.php?id=<?php echo $post->id; ?>" class="btn btn-primary">Read More</a>

            <hr>


        <?php endforeach; ?>
    </div>

</div>


<?php include('includes/footer.php'); ?>
