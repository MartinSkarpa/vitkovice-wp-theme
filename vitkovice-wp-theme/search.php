<?php get_header(); ?>

<main class="container">
    <section id="" class="py-3 section-top">
        <!--TODO Breadcrumbs-->

        <header class="page-header alignwide">
            <h1 class="page-title">
<?php
    printf(
        /* translators: %s: Search term. */
	    esc_html__( "Results for \"%s\"", "vitkovice-wp-theme"),
        '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
    );
?>
            </h1>
        </header>

        <div class="search-result-count default-max-width">
<?php
    printf(
        esc_html(
            /* translators: %d: The number of search results. */
            _n(
	            'Found %d result for your search.',
	            'Found %d results for your search.',
                (int) $wp_query->found_posts,
	            "vitkovice-wp-theme"
            )
        ),
        (int) $wp_query->found_posts
    );
?>
        </div>
        <div class="row">

<?php
    $postCount = 1;
    while (have_posts()) {
        $isEven = $postCount % 2 === 0;
        the_post();
?>

            <article class="col-12 col-md-10 col-lg-8 col-xl-6 <?php echo $isEven ? 'offset-md-2' : ''; ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <div class="text-justify">
<?php
        if (has_post_thumbnail()) {
            the_post_thumbnail(array(150, 150), array("class" => "rounded mb-3 ".($isEven ? "ms-3 float-end" : "me-3 float-start")));
        } else {
?>
                    <img class="rounded mb-3 <?php echo $isEven ? 'ms-3 float-end' : 'me-3 float-start'; ?>" height="149" src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/placeholder_150x150.png" alt="Placeholder" aria-label="Placeholder" />
<?php
        }
?>
                    <?php the_excerpt(); ?><!--TODO Zarovnat text-->
                    <a href="<?php the_permalink(); ?>" class=""><?php _e("Read more....", "vitkovice-wp-theme"); ?></a><!--TODO Spravny odkaz-->
                </div>
            </article>
            <div class="mb-3 w-100"></div>

<?php
        $postCount++;
    }

    if (!have_posts()) {
        echo "<p>".__("No content found.", "vitkovice-wp-theme")."</p>";
    }
?>
        </div>

    </section>
</main>

<?php get_footer(); ?>