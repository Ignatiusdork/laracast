<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php require('views/partials/head.php')?>
    <?php require('views/partials/nav.php')?>
        
    <?php require('views/partials/banner.php')?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/laracasts/notes" class="text-blue-500 underline">go back...</a>
            </p>

            <p><?= htmlspecialchars($note['body']) ?></p> 

            </div>
        </main>

<?php require('views/partials/footer.php')?>