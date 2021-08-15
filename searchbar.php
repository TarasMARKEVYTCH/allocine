<?php
if (isset($_GET['search_field']) && !empty($_GET['search_field'])) {
    $search = htmlspecialchars($_GET['search_field']);
    $result = $bdd->query('SELECT * FROM video WHERE title LIKE "%' . $search . '%" ORDER BY date_publication DESC'); 

    
} ?>