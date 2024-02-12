<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php require base_path('views/partials/head.php')?>
<?php require base_path('views/partials/nav.php')?>   
<?php require base_path('views/partials/banner.php')?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <ul>
                    <?php foreach ($notes as $note) : ?>
                    <li>
                        <a href="/laracasts/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                        
                    </li>
                        <?php endforeach; ?>
                </ul>

                <p class="mt-6">
                    <a href="/laracasts/notes/create" class="text-blue-500 hover:underline">Create Note</a>
                </p>
            </div>
        </main>

<?php require base_path('views/partials/footer.php')?>