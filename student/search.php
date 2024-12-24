<?php 
session_start();  // Ensure the session is started
print_r($_SESSION['search_results']);
if (isset($_SESSION['search_results']) && count($_SESSION['search_results']) > 0) {
    $results = $_SESSION['search_results'];

    // Loop through the results and display them
    foreach ($results as $project) {
        echo '<div>';
        echo '<h3>' . htmlspecialchars($project['project_title']) . '</h3>';
        echo '<p>By: ' . htmlspecialchars($project['student_name']) . '</p>';
        echo '<p>Supervisor: ' . htmlspecialchars($project['supervisor_name']) . '</p>';
        echo '<p>Department: ' . htmlspecialchars($project['department_name']) . '</p>';
        echo '<p>Year: ' . htmlspecialchars($project['year_of_submission']) . '</p>';
        echo '<p>Keywords: ' . htmlspecialchars($project['keywords']) . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No results found for your search.</p>';
}
?>