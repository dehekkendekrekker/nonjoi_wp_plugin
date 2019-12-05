<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Non_joi
 * @subpackage Non_joi/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Non_joi
 * @subpackage Non_joi/admin
 * @author     Your Name <email@example.com>
 */
class Non_joi_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Non_joi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Non_joi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/non-joi-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Non_joi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Non_joi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/non-joi-admin.js', array( 'jquery' ), $this->version, false );

	}



	function non_joi_register_settings() {
		add_option( 'non_joi_option_name', 'This is my option value.' );
		register_setting( 'non_joi_options_group', 'api_url', 'non_joi_callback' );
	}


	function non_joi_register_options_page() {
		add_options_page( 'Page Title', 'Non Joi Dictionary', 'manage_options', 'non_joi', [
			$this,
			'non_joi_options_page'
		] );
	}

	function non_joi_options_page() {
		?>
        <div>
			<?php screen_icon(); ?>
            <h2>Non Joi Dictionary plugin settings</h2>
            <form method="post" action="options.php">
				<?php settings_fields( 'non_joi_options_group' ); ?>
                <!--                <h3>This is my option</h3>-->
                <!--                <p>Some text here.</p>-->
                <table>
                    <tr valign="top">
                        <td style="vertical-align: center">Dictionary API url</td>
                        <td><input type="text" id="non_joi_option_name" name="api_url"
                                   value="<?php echo get_option( 'api_url' ); ?>"/></td>
                    </tr>
                </table>
				<?php submit_button(); ?>
            </form>
        </div>
		<?php
	}
}
