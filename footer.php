<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Akina
 */

?>
	</div><!-- #content -->
	<?php 
		if(akina_option('general_disqus_plugin_support')){
			get_template_part('layouts/duoshuo');
		}else{
			comments_template('', true); 
		}
	?>
	</div><!-- #page Pjax container-->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="footertext">
				<p class="foo-logo" style="background-image: url('<?php bloginfo('template_url'); ?>/images/f-logo.png');"></p>
				<p><?php echo akina_option('footer_info', ''); ?></p>
			</div>
			<div class="footer-device">
			<?php 
			$statistics_link = akina_option('site_statistics_link') ? '<a href="'.akina_option('site_statistics_link').'" target="_blank" rel="nofollow">Statistics</a>' : '';
			$site_map_link = akina_option('site_map_link') ? '<a href="'.akina_option('site_map_link').'" target="_blank" rel="nofollow">Sitemap</a>' : '';
			printf(esc_html__( '%1$s &nbsp; %2$s &nbsp; %3$s &nbsp; %4$s', 'akina' ), $site_map_link, '<a href="https://www.leoheng.com/" rel="designer" target="_blank" rel="nofollow">Leoheng</a>', '<a href="http://www.miit.gov.cn/" target="_blank" rel="nofollow">粤ICP备19062304号-1</a>', $statistics_link); 
			?>




			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div class="openNav">
		<div class="iconflat">	 
			<div class="icon"></div>
		</div>
		<div class="site-branding">
			<?php if (akina_option('akina_logo')){ ?>
			<div class="site-title"><a href="<?php bloginfo('url');?>" ><img src="<?php echo akina_option('akina_logo'); ?>"></a></div>
			<?php }else{ ?>
			<h1 class="site-title"><a href="<?php bloginfo('url');?>" ><?php bloginfo('name');?></a></h1>
			<?php } ?>
		</div>
	</div><!-- m-nav-bar -->
	</section><!-- #section -->
	<!-- m-nav-center -->
	<div id="mo-nav">
		<div class="m-avatar">
			<?php $ava = akina_option('focus_logo') ? akina_option('focus_logo') : get_template_directory_uri().'/images/avatar.jpg'; ?>
			<img src="<?php echo $ava ?>">
		</div>
		<div class="m-search">
			<form class="m-search-form" method="get" action="<?php echo home_url(); ?>" role="search">
				<input class="m-search-input" type="search" name="s" placeholder="<?php _e('搜索...', 'akina') ?>" required>
			</form>
		</div>
		<?php wp_nav_menu( array( 'depth' => 2, 'theme_location' => 'primary', 'container' => false ) ); ?>
	</div><!-- m-nav-center end -->
	<a href="#" class="cd-top"></a>
	<!-- search start -->
	<form class="js-search search-form search-form--modal" method="get" action="<?php echo home_url(); ?>" role="search">
		<div class="search-form__inner">
			<div>
				<p class="micro mb-"><?php _e('输入后按回车搜索 ...', 'akina') ?></p>
				<i class="iconfont">&#xe65c;</i>
				<input class="text-input" type="search" name="s" placeholder="<?php _e('Search', 'akina') ?>" required>
			</div>
		</div>
		<div class="search_close"></div>
	</form>
	<!-- search end -->

<?php
global $wpdb;
$query = "select count(1) from `wp_posts` where `post_status`='publish' and `post_type`='post'";
$cnt_posts = $wpdb->get_var($query);
$query = "select count(1) from `wp_posts` where `post_status`='publish' and `post_type`='page'";
$cnt_pages = $wpdb->get_var($query);
$query = "select count(1) from `wp_comments` where `comment_approved`=1";
$cnt_comments = $wpdb->get_var($query);
$start = strtotime("2019-05-29 00:00:00");  // 需要把这个日期换成你第一篇博客的日期.
$today = strtotime(date("Y-m-d h:i:s"));
$days = round(abs($today - $start) / 3600 / 24);
?>
 
博客安全运行了 <?php echo $days;?> 天, 目前有<?php echo $cnt_posts;?>篇博文、有<?php echo $cnt_comments;?>条评论。


<?php wp_footer(); ?>
<?php if(akina_option('site_statistics')){ ?>
<div class="site-statistics">
<script type="text/javascript"><?php echo akina_option('site_statistics'); ?></script>
</div>
<?php } ?>
</body>
</html>
