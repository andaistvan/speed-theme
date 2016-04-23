<div class="sfm-rollback sfm-color1 sfm-label-<?php echo $options['sf_label_vis']; ?> sfm-label-<?php echo $options['sf_label_style'];echo $options['sf_label_text'] == 'yes' ? ' sfm-label-text' : '' ; if($options['sf_fixed'] === 'yes') echo ' sfm-fixed' ?>" style>
    <div class="sfm-navicon-button x">
        <div class="sfm-navicon"></div>
    </div>
</div>
<div id="sfm-sidebar" style="opacity:0" class=" sfm-hl-<?php echo $options['sf_highlight']; if($options['sf_ind'] == 'yes') echo ' sfm-indicators'; if ($options['sf_sidebar_style'] === 'static' && $options['sf_iconbar'] == 'yes') echo ' sfm-iconbar'?>">
    <div class="sfm-scroll-wrapper">
        <div class="sfm-scroll">
            <div class="sfm-sidebar-close"></div>
            <div class="sfm-logo">
                <?php if(!empty($options['sf_tab_logo'])): ?><a href="<?php echo home_url() ?>"><img src="<?php echo
                    is_ssl() ?
                        str_replace('http:', 'https:', $options['sf_tab_logo']) :
                        str_replace('https:', 'http:', $options['sf_tab_logo']) ; ?>"
                                                                                                     alt=""></a><?php endif; ?>
                <div class="sfm-title">
                    <?php if(!empty($options['sf_first_line'])) echo '<h3>'.$options['sf_first_line'].'</h3>';?>
                    <?php if(!empty($options['sf_sec_line'])) echo '<h4>'.$options['sf_sec_line'].'</h4>';?>
                </div>
            </div>
            <nav class="sfm-nav">
                <div class="sfm-va-middle">
                    <?php
                    $defaults = array(
                        'theme_location'  => '',
                        'menu'            => $options['sf_active_menu'],
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => 'sfm-nav',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                    ?>
                    <div class="widget-area"><?php dynamic_sidebar('sf_sidebar_widget_area');?></div>
                </div>
            </nav>
            <ul class="sfm-social"></ul>
        </div>
    </div>
    <div class="sfm-sidebar-bg"></div>
    <div class="sfm-view sfm-view-level-custom">
        <span class="sfm-close"></span>
        <?php
        foreach ($sf_menu_data as $key => $val) {
            $curr = sf_deparam($val);
            if (empty($curr['content'])) continue;
            echo '<div class="sfm-custom-content" id="sfm-cc-'.$key.'"><div class="sfm-content-wrapper">' . do_shortcode(urldecode($curr['content'])) . '</div></div>';
        }
        ?>
    </div>
</div>
<?php if ($options['sf_mob_nav'] === 'yes') {
    echo '<div id="sfm-mob-navbar"><div class="sfm-navicon-button x">
      <div class="sfm-navicon"></div>
  </div>';
    if(!empty($options['sf_tab_logo'])) {
        echo '<a href="/"><img src="'. $options['sf_tab_logo'] . '" alt=""></a>';
    }
    echo '</div>';
}
?>
<div id="sfm-overlay-wrapper"><div id="sfm-overlay"></div></div>