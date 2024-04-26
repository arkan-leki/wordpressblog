<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p><?php the_author_meta( 'description' ); ?> </p>
    </div>
    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <?php wp_get_archives( 'type=monthly' ); ?>
              </ol>
    </div>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li class="fa fa-twitter" style="display: block"><a href="#"> Twitter</a></li>
            <li class="fa fa-facebook" style="display: block"><a href="#"> Facebook</a></li>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->