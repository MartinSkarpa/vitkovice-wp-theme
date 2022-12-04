<?php
    wp_enqueue_script("bootstrap.bundle.min", get_theme_root_uri()._ROOT_DIR."/js/bootstrap/bootstrap.bundle.min.js");
    wp_enqueue_script("scrolltosmooth.pkgd.min", get_theme_root_uri()._ROOT_DIR."/js/scrollToSmooth/scrolltosmooth.pkgd.min.js");
    wp_enqueue_script("loader", "https://api.mapy.cz/loader.js");
    wp_enqueue_script("main", get_theme_root_uri()._ROOT_DIR."/js/main.js");

    wp_footer();
?>
</body>
</html>