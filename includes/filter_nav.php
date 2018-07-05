<?php

    include('conf/connection.php'); 

    $query = 'SELECT * FROM categories';
    
    $stmt = $conn->query($query);

    $categories = $stmt->fetchAll();

?>

<div class="container">
<p>Filter posts by...</p>

	<nav class="nav filter-nav">
        <?php foreach($categories as $category): ?>
            <a class="nav-link filter-link" value="<?php echo $category->id; ?>" href="<?php echo $_SERVER['PHP_SELF']; ?>?category=<?php echo $category->id; ?>">
            <?php echo $category->name; ?>
            </a>
    <?php endforeach; ?>
	</nav>
    <hr>
</div>