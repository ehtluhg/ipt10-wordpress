<?php
/**
 * The template part for displaying post
 *
 * @package VW School Education
 * @subpackage vw-school-education
 * @since VW School Education 1.0
 */
?>
<?php 
  $vw_school_education_archive_year  = get_the_time('Y'); 
  $vw_school_education_archive_month = get_the_time('m'); 
  $vw_school_education_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="content-vw">
        <h1><?php the_title();?></h1>
        <?php if( get_theme_mod( 'vw_school_education_toggle_postdate',true) != '' || get_theme_mod( 'vw_school_education_toggle_author',true) != '' || get_theme_mod( 'vw_school_education_toggle_comments',true) != '' || get_theme_mod( 'vw_school_education_toggle_time',true) != '') { ?>
            <div class="metabox">
                <?php if(get_theme_mod('vw_school_education_toggle_postdate',true)==1){ ?>
                    <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $vw_school_education_archive_year, $vw_school_education_archive_month, $vw_school_education_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                <?php } ?>

                <?php if(get_theme_mod('vw_school_education_toggle_author',true)==1){ ?>
                    <span class="entry-author"><span><?php echo esc_html(get_theme_mod('vw_school_education_single_post_meta_field_separator'));?></span><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
                <?php } ?>

                <?php if(get_theme_mod('vw_school_education_toggle_comments',true)==1){ ?>
                    <span><span><?php echo esc_html(get_theme_mod('vw_school_education_single_post_meta_field_separator'));?></span><i class="fas fa-comments"></i> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
                <?php } ?>

                <?php if(get_theme_mod('vw_school_education_toggle_time',true)==1){ ?>
                    <span class="entry-time"><span><?php echo esc_html(get_theme_mod('vw_school_education_single_post_meta_field_separator'));?></span><i class="fas fa-clock"></i><?php echo esc_html( get_the_time() ); ?></span>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php if(has_post_thumbnail()) { ?>
        <div class="feature-box">   
            <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
    <div class="entry-content"><?php the_content(); ?></div>
    <?php if(get_theme_mod('vw_school_education_toggle_tags',true)==1){ ?>
        <div class="tags"><?php the_tags(); ?></div>
    <?php } ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-school-education' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_school_education_single_blog_next_navigation_text','NEXT')) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-school-education' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_school_education_single_blog_prev_navigation_text','PREVIOUS')) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-school-education' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
    <?php get_template_part('template-parts/related-posts'); ?>
</article>