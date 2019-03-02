<?php
/**
 * Template Name:イベント情報一覧ページ
 *
 * @package Wordpress
 * @subpackage reform2
 * @since 1.0.0
 */
get_header(); ?>


 <div class="container">
   <?php get_sidebar(); ?>
   <main class="main" role="main">
     <?php breadcrumb(); ?>
     <h2 class="heading1">イベント情報</h2>
       <!-- pagenation -->
       <div class="pagenation-navi">
         <div class="page-count">
           <p>全<?php $count_post = wp_count_posts( 'event' ); echo $count_post->publish;?>件</p>
         </div>
         <?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages);} ?>
       </div>
       <!-- pagenation ./-->
       <div class="page-content">
<?php if (have_posts()) : ?>
       <div class="grid-list">
<?php while (have_posts()) : the_post(); ?>
  <article class="event-archives grid-list-item4 mb20">
    <div class="event-bar">
      <p class="event-bar-title">日程</p>
      <p class="event-bar-date"><?php the_field('date'); ?></p>
    </div>
    <div class="event-summary">
      <div class="image-scale">
<?php $image = get_field('main_image');
if( !empty($image) ): ?>
        <a href="<?php the_permalink() ?>"><p><img src="<?php $image = get_field('main_image'); echo $image['sizes']['medium']; ?>" class="event-object-fit" alt="<?php the_title(); ?>"></p></a>
<?php else: ?>
        <a href="<?php the_permalink() ?>"><p><img src="<?php echo get_template_directory_uri(); ?>/img/common/noimage.png" class="event-object-fit" alt="NO IMAGE"></p></a>
<?php endif; ?>
      </div>
      <h3 class="event-archives-title"><?php echo mb_substr( $post->post_title, 0, 25) . '...'; ?></h3>
      <?php if( get_field('summary') ): ?>
      <p class="event-detail-text">
        <?php echo mb_substr(get_field('summary'),0,29) . '...';?>
      </p>
      <?php endif; ?>
          </div>
          <?php
		$event_date = get_post_meta($post->ID , 'end_date' ,true);
		$event_date_time = date('Y/m/d', strtotime($event_date));
		if (date_i18n('Y/m/d') > $event_date_time) :
		?>
			<p class="btn-area center mt10 mb10"><a href="<?php the_permalink() ?>" class="btn4">終了しました</a></p>
		<?php elseif(date_i18n('Y/m/d') < $event_date_time): ?>
			<p class="btn-area center mt10 mb10"><a href="<?php the_permalink() ?>" class="btn3">詳しく見る</a></p>
		<?php endif ?>
  </article>
<?php endwhile; ?>
</div>
<?php endif; ?>
<!-- pagenation -->
<div class="pagenation-navi">
  <div class="page-count">
    <p>全<?php $count_post = wp_count_posts( 'event' ); echo $count_post->publish;?>件</p>
  </div>
  <?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages);} ?>
</div>
<!-- pagenation ./-->
  </main>
</div>
<?php get_footer(); ?>