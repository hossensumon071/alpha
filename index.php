<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="tagline">
                    <?php bloginfo("description"); ?>
                    </h3>
                    <h1 class="align-self-center display-1 text-center heading">
                        <?php bloginfo("name"); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Section -->
    <div class="posts">
        <?php 
         while(have_posts(  )){
            the_post();
        ?>
       <div class="post" <?php post_class() ?>>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="post-title">
                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <strong><?php the_author(); ?></strong><br>
                            <?php echo get_the_date(); ?>
                            <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>"); ?>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>
                           <?php
                             if(has_post_thumbnail()){
                                 the_post_thumbnail("large","class='img-fluid'");
                             }
                           ?>
                           <?php
                           if(is_single()){
                               the_content();
                           } else{
                               the_excerpt();
                           }
                           ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <?php
        }
        ?>
      <div class="container post-pagination">
          <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                 <?php    
                    the_posts_pagination(array(
                        "screen_reader_text"=>' ',
                        "prev_text" => "New posts",
                        "next_text" => "Old Posts",
                    ));
                 ?>
              </div>
          </div>
      </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        &copy;Developer Tabibur Rahman- All Rights Reserved
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>