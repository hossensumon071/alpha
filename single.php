<?php get_header(); ?>
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
                           <?php the_title(); ?>
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
                             the_content();
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
              <?php if(comments_open()): ?>
                <div class="col-md-4">
                    <?php comments_template(); ?>
                </div>
              <?php endif; ?>
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
<?php get_footer(); ?>