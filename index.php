<?php get_header(); ?>
      <main>
<?php get_template_part('components/page-header'); ?>        
        <article>
          <section>
            <h1>
              ページコンテンツ（トップページ）
            </h1>
            <!-- カスタム投稿 サブループ start -->
              <?php
                $args = array(
                  'posts_per_page' => 5,
                  'post_type' => 'blog'
                );
                $the_query = new WP_Query($args);
                if($the_query->have_posts()):
              ?>
                <?php while($the_query->have_posts()): $the_query->the_post(); ?>
<?php get_template_part('components/loop'); ?>
                <?php endwhile; ?>
              <?php else: ?>
                <!-- 投稿がない場合 -->
                <p>該当する投稿記事がありません</p>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
            <!-- カスタム投稿 サブループ end -->
          </section>
        </article>
        <!-- article end -->
<?php get_sidebar(); ?>
      </main>
      <!-- main end -->
<?php get_template_part('components/breadcrumb'); ?>
<?php get_footer(); ?>