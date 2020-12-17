<?php 
if (!$this->userdata) {
    redirect(base_url('login'),'refresh');
}


include 'header.php';
include 'content.php';
include 'footer.php';

?>