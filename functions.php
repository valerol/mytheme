<?php

function mytheme_post_title_suffix( $title ) {

	if ( is_single() ) {
		return $title . get_option( 'mytheme_post_title_suffix', ' Hello, Fest Agency!' );
	}
}

if ( ! is_admin() ) {
	add_filter( 'the_title', 'mytheme_post_title_suffix' );
}

function mytheme_customize_register() {

	global $wp_customize;

	$wp_customize->add_panel( 'mytheme_options', array(
		'priority'       => 1000,
		'title'          => __( 'My Theme Options', 'mytheme' ),
	) );

	$wp_customize->add_section( 'General', array(
		'title' => 'General',
		'panel' => 'mytheme_options'
	) );

	$wp_customize->add_setting( 'mytheme_post_title_suffix', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_html'
	) );

	$wp_customize->add_control( 'mytheme_post_title_suffix', array(
		'label'    => 'Title Suffix',
		'description' => 'Add your suffix',
		'section'  => 'General',
		'settings' => 'mytheme_post_title_suffix'
	) );
}

add_action( 'customize_register', 'mytheme_customize_register' );