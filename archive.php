<?php get_header(); ?>
      <main>
<?php get_template_part('components/page-header'); ?>        
        <article>
          <section>
            <h1>
              <?php
                if(is_date_archive()) {
                  echo 'ページコンテンツ（日付アーカイブページ）';
                } else {
                  echo 'ページコンテンツ（アーカイブページ）';
                }
              ?>
            </h1>
            <p>
              <?php
                if(is_date_archive()) {
                  echo get_query_var('year').'年'.get_query_var('monthnum').'月の記事一覧';
                }
              ?>
            </p>
            <!-- アーカイブページ メインループ start -->
              <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>
<?php get_template_part('components/loop'); ?>   
                <?php endwhile; ?>
              <?php else: ?>
                <!-- 投稿がない場合 -->
                <p>投稿記事がありません</p>
              <?php endif; ?>
            <!-- アーカイブページ メインループ end -->
          </section>
        </article>
        <!-- article end -->
<?php get_template_part('components/pagenation'); ?>      
<?php get_sidebar(); ?>
      </main>
      <!-- main end -->
<?php get_template_part('components/breadcrumb'); ?>
<?php get_footer(); ?>