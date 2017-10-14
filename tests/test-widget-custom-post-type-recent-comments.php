<?php
/**
 * Class Test_WP_Custom_Post_Type_Widgets_Recent_Comments
 *
 * @package Custom_Post_Type_Widgets
 */

/**
 * Sample test case.
 */
class Test_WP_Custom_Post_Type_Widgets_Recent_Comments extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->wp_custom_post_type_widgets_recent_comments = new WP_Custom_Post_Type_Widgets_Recent_Comments();
	}

	/**
	 * @test
	 * @group wp_custom_post_type_widgets_recent_comments
	 */
	function constructor() {
		$this->assertEquals( 'custom-post-type-recent-comments', $this->wp_custom_post_type_widgets_recent_comments->id_base );
		$this->assertEquals( 'Recent Comments (Custom Post Type)', $this->wp_custom_post_type_widgets_recent_comments->name );

		$this->assertArrayHasKey( 'classname', $this->wp_custom_post_type_widgets_recent_comments->widget_options );
		$this->assertEquals( 'widget_recent_comments', $this->wp_custom_post_type_widgets_recent_comments->widget_options['classname'] );
		$this->assertArrayHasKey( 'description', $this->wp_custom_post_type_widgets_recent_comments->widget_options );
		$this->assertContains( 'Your site’s most recent comments.', $this->wp_custom_post_type_widgets_recent_comments->widget_options['description'] );
		$this->assertFalse( $this->wp_custom_post_type_widgets_recent_comments->widget_options['customize_selective_refresh'] );

		$this->assertArrayHasKey( 'id_base', $this->wp_custom_post_type_widgets_recent_comments->control_options );
		$this->assertEquals( 'custom-post-type-recent-comments', $this->wp_custom_post_type_widgets_recent_comments->control_options['id_base'] );

		$this->assertEquals( 'widget_custom-post-type-recent-comments', $this->wp_custom_post_type_widgets_recent_comments->option_name );
		$this->assertEquals( 'widget_custom_post_type_recent_comments', $this->wp_custom_post_type_widgets_recent_comments->alt_option_name );
	}

	/**
	 * @test
	 * @group wp_custom_post_type_widgets_recent_comments
	 */
	function widget() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}

	/**
	 * @test
	 * @group wp_custom_post_type_widgets_recent_comments
	 */
	function update_case_none_input() {
		$new_instance = array(
			'title'          => '',
			'posttype'       => '',
			'number'         => '',
		);
		$expected = array(
			'title'          => '',
			'posttype'       => '',
			'number'         => 0,
		);

		$validate = $this->wp_custom_post_type_widgets_recent_comments->update( $new_instance, array() );

		$this->assertEquals( $validate, $expected );
	}

	/**
	 * @test
	 * @group wp_custom_post_type_widgets_recent_comments
	 */
	function update_case_input() {
		$new_instance = array(
			'title'          => 'aaaaa',
			'posttype'       => 'post',
			'number'         => 5,
		);
		$expected = array(
			'title'          => 'aaaaa',
			'posttype'       => 'post',
			'number'         => 5,
		);

		$validate = $this->wp_custom_post_type_widgets_recent_comments->update( $new_instance, array() );

		$this->assertEquals( $validate, $expected );

		$new_instance = array(
			'title'          => "as\n<br>df",
			'posttype'       => 'post',
			'number'         => 'aaaa',
		);
		$expected = array(
			'title'          => sanitize_text_field( "as\n<br>df" ),
			'posttype'       => 'post',
			'number'         => 0,
		);

		$validate = $this->wp_custom_post_type_widgets_recent_comments->update( $new_instance, array() );

		$this->assertEquals( $validate, $expected );
	}

	/**
	 * @test
	 * @group wp_custom_post_type_widgets_recent_comments
	 */
	function form() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}

}