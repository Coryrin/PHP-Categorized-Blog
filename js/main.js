nav = document.querySelectorAll('.filter-link');

nav.forEach(link => {
    link.addEventListener('click', filterPost);
});

// Filter the posts
function filterPost(e) {
    e.preventDefault();
    // Get the value from each category within the category nav
    let categoryID = e.srcElement.attributes[1].value;
    // Set the href to go to filtered posts and pass in the category id, to grab over in php
    window.location.href = "filtered_posts.php?category="+categoryID;
}