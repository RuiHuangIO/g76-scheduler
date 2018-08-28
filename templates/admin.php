<h1>Scheduler 2</h1>

<?php

$front_page =  get_option( 'page_on_front' );

?>


<?php echo $front_page ; ?>

<p><?php the_field( banner_image, $front_page); ?></p>
