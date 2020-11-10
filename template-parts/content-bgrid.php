<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hero1
 */

?>

<?php
//grab the custom field for a page and display it
$custom_group = get_field('hero');
$card1_title = $custom_group['card1_title'];
$card1_content = $custom_group['card1_content'];
$card2_title = $custom_group['card2_title'];
$card2_content = $custom_group['card2_content'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php // the_title( '<h1 class="entry-title">', '</h1>' ); 
        ?>
    </header><!-- .entry-header -->

    <?php hero1_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'hero1'),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->
    <?php if ($card1_title) : ?>
        <div class="row row-cols-1 mt-4 row-cols-md-2">
            <div class="col mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $card1_title; ?></h5>
                        <p class="card-text"> <?php echo $card1_content; ?></p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $card2_title; ?></h5>
                        <p class="card-text"><?php echo $card2_content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'hero1'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->