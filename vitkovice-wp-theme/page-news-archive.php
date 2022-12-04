<?php /* Template Name: page-news-archive */ ?>
<?php get_header(); ?>

<main class="container">
    <section id="" class="py-3 section-top">
        <!--TODO Breadcrumbs-->

        <div class="row">

<?php
    $paged = get_query_var("paged") ? get_query_var("paged") : 1;
    $newsQueryArgs = [
        "category_name"     => _NEWS."+".determine_locale(),
        //"posts_per_page"    => 10,
        "paged"             => $paged
    ];
    $newsQuery = new WP_Query($newsQueryArgs);
    $postCount = 1;
    while ($newsQuery->have_posts()) {
        $isEven = $postCount % 2 === 0;
        $newsQuery->the_post();
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

    $pagination = paginate_links( array(
        "base"      => get_pagenum_link(1) . "%_%",
        "format"    => "/page/%#%", //for replacing the page number
        "type"      => "array", //format of the returned value
        "total"     => $newsQuery->max_num_pages,
        "current"   => $paged
    ));

    if ( ! empty( $pagination ) ) {
?>
            <ul class="pagination">
<?php
        // TODO Translate pagination
        foreach ($pagination as $key => $page_link ) {
?>
                <li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) echo ' active'; ?>">
                    <?php echo str_replace("page-numbers", "page-numbers page-link", $page_link); ?>
                </li>
<?php
        }
?>
            </ul>
<?php
    }

    if (!$newsQuery->have_posts()) {
        echo "<p>".__("No content found.", "vitkovice-wp-theme")."</p>";
    }
?>
        </div>

    </section>
</main>

<?php get_footer(); ?>