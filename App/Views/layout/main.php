<style>
    #message {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
    }
</style>

<main>
    <?php
        if (isset($_SESSION['message']) and !empty($_SESSION['message']))
        {
    ?>
        <div id="message" class="alert alert-warning text-center py-3 mb-0" role="alert">
            <?php
                foreach($_SESSION['message'] as $message)
                {
                    echo "<h2 class='text-dark'>$message</h2>";
                    unset($_SESSION['message']);
                }
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-dark">&times;</span>
            </button>
        </div>
    <?php
        }   
        echo($content);
    ?>
</main>