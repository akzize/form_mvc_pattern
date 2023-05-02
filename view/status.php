<?php

    $inserted = filter_input(INPUT_GET, 'insert', FILTER_VALIDATE_INT);
    $updated = filter_input(INPUT_GET, 'update', FILTER_VALIDATE_INT);
    $deleted = filter_input(INPUT_GET, 'deleted', FILTER_VALIDATE_INT);

    $message = '';
    if ($inserted){
        $message = 'Added successfully';
    }elseif ($updated){
        $message = 'updated successfully';
    }elseif ($deleted){
        $message = 'deleted successfully';
    }

    ?>

<?php if ($message) :?>

<section  class="alert alert-success alert-dismissible  fade show">
    <p><?= $message?></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</section>

<?php endif;?>