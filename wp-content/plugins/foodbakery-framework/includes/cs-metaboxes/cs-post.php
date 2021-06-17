<?php
/**
 * @ Start function for Add Meta Box For Post
 * @return
 */
add_action( 'add_meta_boxes', 'foodbakery_meta_post_add' );
if ( ! function_exists( 'foodbakery_meta_post_add' ) ) {

    function foodbakery_meta_post_add() {
        global $foodbakery_var_frame_static_text;
        add_meta_box( 'foodbakery_meta_post', foodbakery_var_frame_text_srt( 'foodbakery_var_post_options' ), 'foodbakery_meta_post', 'post', 'normal', 'high' );
    }

}

/**
 * @ Start function for Meta Box For Post  
 * @return
 */
if ( ! function_exists( 'foodbakery_meta_post' ) ) {

    function foodbakery_meta_post( $post ) {
        global $foodbakery_var_frame_static_text;
        ?>
        <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
            <div class="option-sec" style="margin-bottom:0;">
                <div class="opt-conts">
                    <div class="elementhidden">
                        <nav class="admin-navigtion">
                            <ul id="cs-options-tab">
                                <li><a name="#tab-general-settings" href="javascript:;"><i class="icon-cog3"></i><?php echo foodbakery_var_frame_text_srt( 'foodbakery_var_general_setting' ); ?> </a></li>
                                <li><a name="#tab-slideshow" href="javascript:;"><i class="icon-forward2"></i> <?php echo foodbakery_var_frame_text_srt( 'foodbakery_var_subheader' ); ?></a></li>                               
                                <li><a name="#tab-post-gallery" href="javascript:;"><i class="icon-list-alt"></i><?php echo foodbakery_var_frame_text_srt( 'foodbakery_var_post_gallery' ); ?>  </a></li>
                                <?php do_action( 'post_options_metabox_tabs' ); ?>
                            </ul> 
                        </nav>
                        <div id="tabbed-content">
                            <div id="tab-general-settings">
                                <?php
                                foodbakery_post_settings_element();
                                foodbakery_sidebar_layout_options();
                                ?>
                            </div>
                            <div id="tab-header">
                                <?php foodbakery_header_element(); ?>
                            </div>
			    <div id="tab-slideshow">
                                <?php foodbakery_subheader_element(); ?>
                            </div>
                            <div id="tab-post-options">
                                <?php
                                if ( function_exists( 'foodbakery_var_post_options' ) ) {
                                    foodbakery_var_post_options();
                                }
                                ?>
                            </div>
                            <div id="tab-post-gallery">
                                <?php
                                if ( function_exists( 'foodbakery_var_post_gallery' ) ) {
                                    foodbakery_var_post_gallery();
                                }
                                ?>
                            </div>

                            <?php do_action( 'post_options_metabox_tabs_content_container', $post ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }

}



/**
 * @page/post General Settings Function
 * @return
 *
 */
if ( ! function_exists( 'foodbakery_post_settings_element' ) ) {

    function foodbakery_post_settings_element() {
        global $post, $foodbakery_var_form_fields, $foodbakery_var_html_fields, $foodbakery_var_frame_static_text, $foodbakery_var_options;
        ?>
        <script>
            function post_format_view(val) {
                if (val == 'format-video') {
                    jQuery('#post_format_video_url').show();
                    jQuery('#sound_embedded_code').hide();
                } else if (val == 'format-sound') {
                    jQuery('#post_format_video_url').hide();
                    jQuery('#sound_embedded_code').show();
                } else {
                    jQuery('#post_format_video_url').hide();
                    jQuery('#sound_embedded_code').hide();
                }
            }
            function check_view_ad_unit(val) {
                if (val == 'view-2') {
                    jQuery('#post_style_ad_unit').show();
                    jQuery('#post_cover_image').show();
                } else if (val == 'view-4') {
                    jQuery('#post_cover_image').show();
                    jQuery('#post_style_ad_unit').hide();
                } else {
                    jQuery('#post_style_ad_unit').hide();
                    jQuery('#post_cover_image').hide();
                }
            }
        </script>
        <?php
        $foodbakery_var_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_social_sharing' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_social_sharing',
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_checkbox_field( $foodbakery_var_opt_array );

        $foodbakery_var_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_about_author' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_about_author_show',
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_checkbox_field( $foodbakery_var_opt_array );

        $foodbakery_var_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_tag' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_tags_show',
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_checkbox_field( $foodbakery_var_opt_array );

        $foodbakery_var_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_related_posts' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'related_post',
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_checkbox_field( $foodbakery_var_opt_array );
	$foodbakery_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_view' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                'std' => '',
                'id' => 'post_style',
                'classes' => 'chosen-select-no-single',
                'options' => array('thumbnail' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_view_thumbnail' ), 'slider' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_view_slider' ) ),
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_select_field( $foodbakery_opt_array );

	$foodbakery_opt_array = array(
                'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_format' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'post_format',
                    'extra_atr' => " onchange=post_format_view(this.value)",
                    'classes' => 'chosen-select-no-single',
                    'options' =>
		    array( 
			'' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_view_select_format' ),
			'format-thumbnail' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_format_thumbnail' ), 
			'format-slider' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_format_slider' ), 
			'format-sound' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_format_sound' ), 
			'format-video' => foodbakery_var_frame_text_srt( 'foodbakery_var_post_format_video' )
			),
                    'return' => true,
                ),
            );

            $foodbakery_var_html_fields->foodbakery_var_select_field( $foodbakery_opt_array );
            $post_format = get_post_meta( $post->ID, 'foodbakery_var_post_format', true );
            $display = ( '' !== $post_format ) ? 'block' : 'none';
            $post_format = ( 'none' === $display ) ? 'format-masonary' : $post_format;
            
        $post_format_display = 'none';
        $foodbakery_var_post_format = get_post_meta( $post->ID, 'foodbakery_var_post_format', true );
        if ( isset( $foodbakery_var_post_format ) && $foodbakery_var_post_format == 'format-video' ) {
            $post_format_display = 'block';
        }
        ?>
        <div id="post_format_video_url" style="display:<?php echo esc_html( $post_format_display ); ?>">
        <?php
        $foodbakery_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_youtube_vimeo_video_url' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                //'usermeta' => true,
                'std' => '',
                'classes' => '',
                'id' => 'format_video_url',
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_text_field( $foodbakery_opt_array );
        ?>
        </div>

        <?php
        $post_format_sound_display = 'none';
        if ( isset( $foodbakery_var_post_format ) && $foodbakery_var_post_format == 'format-sound' ) {
            $post_format_sound_display = 'block';
        }
        ?>
        <div id="sound_embedded_code" style="display:<?php echo esc_html( $post_format_sound_display ); ?>">
        <?php
        $foodbakery_opt_array = array(
            'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_soundcloud_url' ),
            'desc' => '',
            'hint_text' => '',
            'echo' => true,
            'field_params' => array(
                //'usermeta' => true,
                'std' => '',
                'classes' => '',
                'id' => 'soundcloud_url',
                'return' => true,
            ),
        );

        $foodbakery_var_html_fields->foodbakery_var_text_field( $foodbakery_opt_array );
        ?>
        </div>
            <?php
        }

    }

    /**
     * @page/post Gallery Function
     * @return
     *
     */
    if ( ! function_exists( 'foodbakery_var_post_gallery' ) ) {

        function foodbakery_var_post_gallery() {
            global $post, $foodbakery_var_form_fields, $foodbakery_var_html_fields, $foodbakery_var_frame_static_text;
            echo '<div id="post_detail_gallery">';
            $foodbakery_opt_array = array(
                'name' => foodbakery_var_frame_text_srt( 'foodbakery_var_add_gallery_images' ),
                'id' => 'post_detail_page_gallery',
                   'cust_name' => 'post_detail_page_gallery',
                'classes' => '',
                'std' => '',
            );

            $foodbakery_var_html_fields->foodbakery_var_gallery_render( $foodbakery_opt_array );
            echo '</div>';
        }

    }
