<?php
require("config.php");
require 'php/core/autoload.php';
$pageDetails = Page::getPageDetailsByName($currentPage);
?>
<?php include "php/pages/header.php"; ?>
<div class="row main-row">
    <div class="8u">
        <section class="left-content">
            <h2><?php echo stripslashes($pageDetails->getTitle()); ?></h2>
            <?php echo stripslashes($pageDetails->getDesc()); ?>
        </section>
    
    </div>
  
</div>
<?php include("php/pages/footer.php"); ?>