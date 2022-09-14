<?php get_header(); ?>

<main class="container bg-white">
    <section id="" class="p-3 mt-5">
        <!--TODO Breadcrumbs-->

        <header class="page-header alignwide">
            <h1 class="page-title">
<?php
    //TODO
    printf(
        /* translators: %s: Search term. */
        esc_html__( 'Results for "%s"', 'twentytwentyone' ),
        '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
    );
?>
            </h1>
        </header>

        <div class="search-result-count default-max-width">
<?php
    //TODO
    printf(
        esc_html(
            /* translators: %d: The number of search results. */
            _n(
                'We found %d result for your search.',
                'We found %d results for your search.',
                (int) $wp_query->found_posts,
                'twentytwentyone'
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
                    <?php the_post_thumbnail(array(100, 100), array("class" => "rounded mb-3 ".($isEven ? "ms-3 float-end" : "me-3 float-start"))); ?>
                    <?php the_excerpt(); ?><!--TODO Zarovnat text-->
                    <a href="<?php the_permalink(); ?>" class="">Číst dále....</a><!--TODO--><!--TODO Spravny odkaz-->
                </div>
            </article>
            <div class="mb-3 w-100"></div>

<?php
        $postCount++;
    }

    if (!have_posts()) {
        echo "<p>Nebyl nalezen žádný obsah.</p>";//TODO
    }
?>
        </div>

    </section>
</main>

<?php get_footer(); ?>