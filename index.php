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
                  'post_status' => 'publish',
                  'post_type' => 'blog',
                  'posts_per_page' => 5,
                  // 'ignore_sticky_posts' => false,
                  // 'tax_query' => array(
                  //   'relation' => 'AND',
                  //   array(),
                  //   array()
                  // ),
                  // 'meta_query' => array(
                  //   'relation' => 'AND',
                  //   array(),
                  //   array()
                  // ),
                  // 'date_query' => array(
                  //   array(),
                  //   array()
                  // ),
                  // 's' => '',
                  // 'order' => 'DESC',
                  // 'orderby' => array()
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
            <!-- Ajax無限ローディング サブループ start -->
            <?php
              // 初期表示件数
              $default_posts = 3;
              // 無限ローディング対象クエリ
              $args = array(
                'posts_per_page' => $default_posts,
                'post_type' => 'blog'
              );
              $default_infinity_load = new WP_Query($args);
              if($default_infinity_load->have_posts()):
            ?>
            <div id="infinite_loading_container">
              <!-- Ajax無限ローディング 追加読み込み記事 -->
              <?php while($default_infinity_load->have_posts()): $default_infinity_load->the_post(); ?>
<?php get_template_part('components/loop'); ?>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <!-- Ajax無限ローディング サブループ end -->
            <?php if($default_infinity_load->found_posts > $default_posts): ?>
              <!-- Ajax無限ローディング 追加読み込みボタン -->
              <button id="infinite_loading_button">もっと読み込む</button>
            <?php endif; ?>
          </section>
        </article>
        <!-- article end -->
<?php get_sidebar(); ?>
      </main>
      <!-- main end -->
<?php get_template_part('components/breadcrumb'); ?>
<?php get_footer(); ?>