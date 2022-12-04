<?php get_header(); ?>

<main class="container">
	<section id="" class="py-3 section-top">
		<!--TODO Breadcrumbs-->

		<h1><?php _e("Page not found", "vitkovice-wp-theme"); ?></h1>

		<div class="text-justify">
			<p><?php _e("Whoops! Page that you are trying to access doesn't exist.", "vitkovice-wp-theme"); ?></p>
            <!--"The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place."-->
		</div>

        <div class="row">
            <div class="col-sm-6 col-lg-4 col-xxl-3 offset-sm-6 offset-lg-8 offset-xxl-9">
<?php
    get_search_form(
        array(
            "aria_label" => __("404 not found", "vitkovice-wp-theme"),
        )
    );
?>
            </div>
        </div>

	</section>
</main>

<?php get_footer(); ?>