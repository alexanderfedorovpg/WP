<?php
/**
Template Name Posts: case
*/
?>
<?php get_header(); ?>
<div style="margin: 20px;">
	<div>Title: <?= $post->post_title?></div>
	<?php echo get_crumbs()?>
    <div style="margin: 20px;"> Content: <?= $post->post_content?></div>
</div>
<?php get_footer(); ?>