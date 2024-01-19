<?php
if(isset($_SESSION['message'])){
?>
    
    <div class="mx-5 alert alert-<?= $_SESSION['message_color']; ?> alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>

<?php
unset($_SESSION['message']);
}
?>