<?php get_header(); ?>

<main class="container">
    <div class="row">
        <section id="" class="col-12 py-3 section-top">
            <!--TODO Breadcrumbs-->

<?php
    while ( have_posts() ) {
        the_post();

	    if ( has_post_thumbnail() ) {
?>
            <style>
                .the-post-image {
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    background-image: url("<?php echo get_the_post_thumbnail_url(get_the_ID(), "full"); ?>");
                    height: 200px;
                }
            </style>
            <!--<div class="w-100 the-post-image"></div>-->
<?php
	    }
?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="text-justify">
<?php
        the_content();

        /*wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', "vitkovice-wp-theme" ) . '">',
                'after'    => '</nav>',
                'pagelink' => esc_html__( 'Page %', "vitkovice-wp-theme" ),
            )
        );*/
?>
                </div>
            </article>

<?php
    }
?>

        </section>
    </div>
</main>

<?php get_footer(); ?>