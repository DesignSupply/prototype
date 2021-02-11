<?php get_header(); ?>
      <main>
<?php get_template_part('components/page-header'); ?>
        <article>
          <section>
            <h1>
              <a href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php echo get_bloginfo('name'); ?>">
              </a>
            </h1>
          </section>
        </article>
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
        <article>
          <section>
            <h1>
              無限読み込みコンテンツ
            </h1>
            <!-- Ajax無限ローディング 初期表示サブループ start -->
            <?php
              $default_posts = 3;
              $args = array(
                'posts_per_page' => $default_posts,
                'post_type' => 'blog'
              );
              $the_query = new WP_Query($args);
              if($the_query->have_posts()):
            ?>
              <?php while($the_query->have_posts()): $the_query->the_post(); ?>
<?php get_template_part('components/loop'); ?>
              <?php endwhile; ?>
              <!-- Ajax無限ローディング 初期表示サブループ end -->
              <div id="infinite_loading_container">
                <!-- Ajax無限ローディング 追加表示コンテンツ -->
              </div>
              <?php if($the_query->found_posts > $default_posts): ?>
                <button id="infinite_loading_button">もっと読み込む</button>
              <?php endif; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </section>
        </article>
        <!-- article end -->
<?php get_sidebar(); ?>
      </main>
      <!-- main end -->
<?php get_template_part('components/breadcrumb'); ?>
<?php get_footer(); ?>