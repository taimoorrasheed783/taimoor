<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Corporate Business
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
        <div class="page-content">
        	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','vw-corporate-business' ), esc_html__( 'Not Found', 'vw-corporate-business' ) ) ?></h1>	
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'vw-corporate-business' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-corporate-business' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url()); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'vw-corporate-business' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Return to the home page','vw-corporate-business' );?></span></a>
			</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>