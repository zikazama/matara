<?php if(isset($hasil->inline_images)) { ?>
<img src='<?= $hasil->inline_images[0]->thumbnail ?>'/>
<?php } else { ?>
<img src='<?= $hasil->recipes_results[0]->thumbnail ?>'/>
<?php } ?>