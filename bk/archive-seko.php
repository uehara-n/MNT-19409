<?php
/**
 * Template Name:施工事例一覧ページ
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
     <h2 class="heading1">部位別施工事例から探す</h2>
     <!-- 施工事例メニュー -->
     <ul class="seko-menu mt20">
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/kitchen/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/kitchen.png" class="fit" alt="キッチンリフォーム">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/bathroom/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/bathroom.png" class="fit" alt="お風呂リフォーム">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/toilet/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/toilet.png" class="fit" alt="トイレリフォーム">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/powderroom/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/powderroom.png" class="fit" alt="洗面">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/door/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/door.png" class="fit" alt="ドア/サッシ">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/ldk/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/ldk.png" class="fit" alt="LDK">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/gaiheki/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/gaiheki.png" class="fit" alt="外壁・塗装">
         </a>
       </li>
       <li class="seko-item image-scale">
         <a href="<?php echo home_url(); ?>/seko_cat/zenmen/">
           <img src="<?php echo get_template_directory_uri(); ?>/img/top/seko/zenmen.png" class="fit" alt="全面・増改築">
         </a>
       </li>
     </ul>
     <h2 class="heading1">最新施工事例から探す</h2>
       <!-- pagenation -->
       <div class="pagenation-navi">
         <div class="page-count">
           <p>全<?php $count_post = wp_count_posts( 'seko' ); echo $count_post->publish;?>件</p>
         </div>
         <?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages);} ?>
       </div>
       <!-- pagenation ./-->
       <div class="page-content">
<?php if (have_posts()) : ?>
       <div class="grid-list">
<?php while (have_posts()) : the_post(); ?>
  <article class="grid-list-item4 mb50">
    <div class="voice-image image-mark">
      <?php $image = get_field('after_photo');
        if( !empty($image) ): ?>
        <?php
    $days = 30;
    $today = date_i18n('U');
    $entry = get_the_time('U');
    $elapsed = date('U',($today - $entry)) / 86400;
    if ( $days > $elapsed ) {
      echo '<div class="mark"><span class="new"><img src="'.get_template_directory_uri().'/img/common/page/new.png"></span></div>';
    }
  ?>
  <?php
$rows = get_field('after_photo' );
$first_row = $rows[0];
$first_row_image = $first_row['after_image' ];
$img = wp_get_attachment_image_src( $first_row_image, 'small' );
?>
        <img src="<?php echo $img[0]; ?>" class="img-mark seko-object-fit" alt="<?php the_title(); ?>">
      </a>
    <?php else: ?>
      <a href="<?php the_permalink() ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/common/seko-sample.png" class="img-mark seko-object-fit" alt="<?php the_title(); ?>">
      </a>
    <?php endif; ?>
  </div>
    <h3 class="size18 mt10 mb10"><?php
if(mb_strlen($post->post_title)>22) {
$title= mb_substr($post->post_title,0,22) ;
echo $title . '...';
} else {
echo $post->post_title;
}
?></h3>
    <?php if( get_field('customer_name') ): ?>
      <p class="size18 mt10 mb10"><?php the_field('customer_name'); ?></p>
    <?php endif; ?>
    <?php if( get_field('media') ): ?>
    <p class="seko-icon">
      <?php if( in_array( 'chirashi', get_field('media') ) ) {
          echo '<span class="chirashi">チラシより</span>';
      } ?>
      <?php if( in_array( 'seminar', get_field('media') ) ) {
          echo '<span class="seminar">勉強会より</span>';
      } ?>
      <?php if( in_array( 'website', get_field('media') ) ) {
          echo '<span class="website">HPより</span>';
      } ?>
    </p>
    <?php endif; ?>
    <p class="center mt10 mb20"><a href="<?php the_permalink() ?>" class="btn3">詳しく見る</a></p>
  </article>
<?php endwhile; ?>
</div>
<?php endif; ?>
<!-- pagenation -->
<div class="pagenation-navi">
  <div class="page-count">
    <p>全<?php $count_post = wp_count_posts( 'seko' ); echo $count_post->publish;?>件</p>
  </div>
  <?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages);} ?>
</div>
<!-- pagenation ./-->
  </main>
</div>
<?php get_footer(); ?>