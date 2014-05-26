<?php get_header(); ?>

            <section id="home">
                <hgroup>
                    <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    <h2 class="tagline">Webbutvecklare med en Interaktionsdesigns twist, <br>som bor i Huddinge kommun, söder om Stockholm.</h2>
                </hgroup>
                <div id="social">
                    <div id="head-soc">
                        <ul>
                            <li id="g"><a href="https://plus.google.com/u/0/110183922780257889839/posts">Google+</a></li>
                            <li id="li"><a href="http://linkedin.com/in/tobiasarud">LinkedIn</a></li>
                            <li id="sp"><a href="http://open.spotify.com/user/erumaro">Spotify</a></li>
                            <li id="tumb"><a href="http://eruma.tumblr.com/">Tumblr</a></li>
                            <li id="twit"><a href="https://twitter.com/Eruvaeron">Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section id="portfolio" class="clearfix collapsefix">
                <!-- #content BEGIN  -->
                <div id="content" role="main">
                <div id="portfolio-header" class="clearfix">
                    <div id="portfolio-title">
                        <h3 class="section-title">portfolio</h3>
                    </div>
                    <div id="portfolio-filter">
                        <ul class="filter clearfix">
                                <li><strong>Filter:</strong></li>
                                <li class="active"><a href="javascript:void(0)" class="all">All</a></li>

                                <?php
                                        // Get the taxonomy
                                        $terms = get_terms('filter', $args);

                                        // set a count to the amount of categories in our taxonomy
                                        $count = count($terms); 

                                        // set a count value to 0
                                        $i=0;

                                        // test if the count has any categories
                                        if ($count > 0) {

                                                // break each of the categories into individual elements
                                                foreach ($terms as $term) {

                                                        // increase the count by 1
                                                        $i++;

                                                        // rewrite the output for each category
                                                        $term_list .= '<li><a href="javascript:void(0)" class="'. $term->slug .'">' . $term->name . '</a></li>';

                                                        // if count is equal to i then output blank
                                                        if ($count != $i)
                                                        {
                                                                $term_list .= '';
                                                        }
                                                        else 
                                                        {
                                                                $term_list .= '';
                                                        }
                                                }

                                                // print out each of the categories in our new format
                                                echo $term_list;
                                        }
                                ?>
                        </ul>
                    </div>
                </div>
                        <ul class="filterable-grid clearfix">

                                <?php 
                                        // Set the page to be pagination
                                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                                        // Query Out Database
                                        $wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
                                ?>

                                <?php
                                        // Begin The Loop
                                        if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
                                ?>

                                <?php 
                                        // Get The Taxonomy 'Filter' Categories
                                        $terms = get_the_terms( get_the_ID(), 'filter' ); 
                                ?>

                                            <?php
                                                    //Apply a data-id for unique indentity, 
                                                    //and loop through the taxonomy and assign the terms to the portfolio item to a data-type,
                                                    // which will be referenced when writing our Quicksand Script
                                            ?>
                                            <li data-id="id-<?php echo $count; ?>" data-type="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?>">
                                                <div id="single_wrapper" class="clearfix">
                                                    <?php // Output the title of each portfolio item ?>
                                                    <h1 class="page-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
                                                    <div id="cont-left">
                                                            <?php 
                                                                    // Check if wordpress supports featured images, and if so output the thumbnail
                                                                    if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
                                                            ?>

                                                                    <?php // Output the featured image ?>
                                                                    <?php the_post_thumbnail('portfolio'); ?>								

                                                            <?php endif; ?>
                                                    </div>
                                                    <div id="cont-right">
                                                        <?php the_content(); ?>
                                                        <?php the_meta(); ?>
                                                    </div>
                                                </div>
                                            </li>


                            <?php $count++; // Increase the count by 1 ?>		
                            <?php endwhile; endif; // END the Wordpress Loop ?>
                            <?php wp_reset_query(); // Reset the Query Loop?>
                        </ul><!--</ul>-->
                </div><!-- #content END -->
            </section><!-- #portfolio END -->
            <section id="about" class="clearfix collapsefix">
                    <h3 class="section-title">om mig</h3>
                    <div id="aboutmain">
                        <h4 class="intro">Hej! Mitt namn är Tobias Årud, jag är en 25 årig Interaktionsdesigner från Skogås utanför Stockholm.</h4>
                        <div id="aboutcontent">
                            <!-- Adds the blog post functions to the About Section -->
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
                            <h4><?php the_title(); ?></h4>  
                            <?php the_content(); ?>   
                            <?php endwhile; else: ?>  
                            <h4>Woops...</h4>  
                            <p>Sorry, no posts we're found.</p>  
                            <?php endif; ?>   
                        </div>
                    </div>
                    <div id="tobiasimg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/tobias.png" alt="" title="Tobias">
                    </div>
                    <aside class="infobox">
                        <!-- Includes the Sidebar as a info box like thing -->
                        <?php get_sidebar(); ?>
                    </aside>
            </section><!-- #about END -->
<?php get_footer(); ?>