<aside class="sidebar blog-single col-sm-4">
  <h3>Categories</h3>
  <nav id="side-nav">
    <ul>
      <?php wp_list_categories( array(
      'orderby' => 'name',
      'title_li' => false,
      'exclude' => 1
      ) ); ?>
    </ul>
  </nav>
</aside>