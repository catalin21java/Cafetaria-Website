<!DOCTYPE html>
<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '!ctf69dEcebAl', 'sicopan_data');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all products from the products table
$sql = "SELECT * FROM produse";
$result = mysqli_query($conn, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Output the cards
    echo '<section>';
    echo '<div class="container swiper ">';
    echo '<div class="slide-container">';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card swiper-slide">';
        echo '<div class="image-box">';
        echo '<img src="' . $row['img_dir'] .'">';
        echo '</div>';

        echo '<div class="profile-details">';
        echo '<div class="name-job">';
        echo '<h3 class="name">' . $row['nume_produs'] .'</h3>';
        echo '<h4 class="job">' . $row['categorie_produs'] . '</h4>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</section>';
} else {
    echo "No products found.";
}

// Close the connection
mysqli_close($conn);
?>
