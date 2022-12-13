<main>
    <?php
        	if (isset($_SESSION['message']) and !empty($_SESSION['message']))
    {
        ?>
	    <div id="message" class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php
foreach($_SESSION['message'] as $message)
{
echo "<h2>$message</h2>";
unset($_SESSION['message']);
}
?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        &times; </span> </button>
            </div>
        <?php
    }   
    echo($content);
    ?>
    </main>