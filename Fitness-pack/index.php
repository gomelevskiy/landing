<?php get_header(); ?>

    <section id="section1" class="section section1 h wow fadeInUp" data-wow-delay="0.15s">
        <div class="container">
            <img class="img-crop img-crop-left" src="<?php bloginfo('template_directory'); ?>/images/chocolat.png"/>
            <h2 class="h2"><?php the_field('s1_article',5); ?></h2>
            <p class="text text-center"><?php the_field('s1_text',5); ?></p>
            <div class="blockquote-box">
                <div class="blockquote-box_author" style="background-image: url('<?php the_field('s1_review_img',5); ?>')">
                    <div class="author-name">
                        <span><?php the_field('s1_review_author',5); ?></span>
                        <?php the_field('s1_review_class',5); ?>
                    </div>
                </div>
                <blockquote class="blockquote"><?php the_field('s1_review_text',5); ?></blockquote>
            </div>
            <img class="img-crop img-crop-right" src="<?php bloginfo('template_directory'); ?>/images/cherry.png"/>
        </div>
    </section>

    <section id="section2" class="section section2 h wow fadeInUp" data-wow-delay="0.35s">
        <div class="container">
            <h2 class="h2"><?php the_field('s2_article',5); ?></h2>
            <div class="row section2-row">
                <div class="col-md-4 align-center">
                    <div class="icon icon-time"></div>
                    <h3 class="article-small article-green"><?php the_field('s2_pr1_article',5); ?></h3>
                    <p class="text"><?php the_field('s2_pr1_text',5); ?></p>
                </div>
                <div class="col-md-4 align-center">
                    <div class="icon icon-time"></div>
                    <h3 class="article-small article-green"><?php the_field('s2_pr2_article',5); ?></h3>
                    <p class="text"><?php the_field('s2_pr2_text',5); ?></p>
                </div>
                <div class="col-md-4 align-center">
                    <div class="icon icon-time"></div>
                    <h3 class="article-small article-green"><?php the_field('s2_pr3_article',5); ?></h3>
                    <p class="text"><?php the_field('s2_pr3_text',5); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section id="section3" class="section section3 h wow fadeInUp" data-wow-delay="0.50s">
        <div class="container">
            <h2 class="h2"><?php the_field('s3_article',5); ?></h2>
            <ul class="products-list">
                <?php $i = 0; $id=2; $recent = new WP_Query("cat=$id&showposts=$n&order=ASC"); while($recent->have_posts()) : $recent->the_post(); ?>
                    <li class="products-list-item <?php if( !get_field('view-product') ): ?>no-empty<?php endif; ?>">
                        <div class="products-list-item_img" style="background-image: url('<?php the_field('product_bg'); ?>');">
                            <div class="products-list-item_img-article"><?php the_title(); ?></div>
                        </div>
                        <div class="products-list-item_content">
                            <img src="<?php the_field('product_img'); ?>" class="products-list-item_content-img"/>
                            <h3 class="article-small <?php the_field('product_color'); ?>"><?php the_title(); ?></h3>
                            <div class="products-list-item_content-cost"><?php the_field('product_price'); ?></div>
                            <div class="text"><?php the_content(); ?></div>
                            <?php if( get_field('view-product') ): ?>
                                <div class="btn btn-blue show-modal">хочу заказать этот вкус</div>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php $i++; endwhile; ?>
            </ul>
        </div>
    </section>

    <section id="section4" class="section section4 h wow fadeInUp" data-wow-delay="0.65s">
        <div class="container">
            <h2 class="h2"><?php the_field('s4_article',5); ?></h2>
            <div class="text text-center">
                <?php the_field('s4_text',5); ?>
            </div>
        </div>
    </section>

    <section id="section5" class="section section5 h wow fadeInUp" data-wow-delay="0.80s">
        <div class="container">
            <img class="img-crop img-crop-left" src="<?php bloginfo('template_directory'); ?>/images/orange.png"/>
            <h2 class="h2"><?php the_field('s5_article',5); ?></h2>
            <div class="around-block-mobile_text"></div>
            <div class="around-block" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/round.png')">
                <div class="around-block-container">
                    <div class="around-block-container-text block-container-top-left active-span">
                        <span><?php the_field('s5_p1',5); ?></span>
                    </div>
                    <div class="around-block-container-text block-container-top-right">
                        <span><?php the_field('s5_p2',5); ?></span>
                    </div>
                    <img src="<?php the_field('s5_img',5); ?>" class="around-block_img"/>
                    <div class="around-block-container-text block-container-bottom-left">
                        <span><?php the_field('s5_p3',5); ?></span>
                    </div>
                    <div class="around-block-container-text block-container-bottom-right">
                        <span><?php the_field('s5_p4',5); ?></span>
                    </div>
                </div>
            </div>
            <img class="img-crop img-crop-right" src="<?php bloginfo('template_directory'); ?>/images/bananas.png"/>
        </div>
    </section>

    <section id="section6" class="section section6 wow fadeInUp" data-wow-delay="0.95s">
        <div class="container">
            <h2 class="h2"><?php the_field('s6_article',5); ?></h2>
            <div class="row">
                <?php $i = 0; $id=3; $recent = new WP_Query("cat=$id&showposts=$n&order=ASC"); while($recent->have_posts()) : $recent->the_post(); ?>
                <div class="col-md-12 reviews-item" style="background-image: url('<?php the_field('share_img'); ?>');">
                    <div class="reviews-item_date"><?php the_field('share_date'); ?></div>
                    <div class="reviews-item_info">
                        <p class="reviews-item_info-article"><?php the_title(); ?></p>
                        <div class="reviews-item_info-text"><?php the_content(); ?></div>
                    </div>
                </div>
                <?php $i++; endwhile; ?>
            </div>
        </div>
    </section>

    <section id="section7" class="section section7 h align-center">
        <div class="container">
            <h2 class="h2 no-line">Готовы стать лучше?</h2>
            <p class="text text-center">
                Отправьте нам заявку и наш менеджер<br/> свяжется с Вами
            </p>
            <div class="btn btn-green show-modal">хочу стать лучше</div>
        </div>
    </section>

<?php get_footer(); ?>