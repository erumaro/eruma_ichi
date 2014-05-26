<?php get_header(); ?>
        <div id="single_wrapper">
            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();
            ?>

            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <?php 
            endwhile;
            else:
                _e('Sorry, no posts matched your criteria.');
            endif;
            ?>
         </div>
<?php get_footer(); ?>