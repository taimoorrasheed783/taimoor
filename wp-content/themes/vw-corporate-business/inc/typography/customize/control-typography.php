<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Corporate_Business_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-corporate-business' ),
				'family'      => esc_html__( 'Font Family', 'vw-corporate-business' ),
				'size'        => esc_html__( 'Font Size',   'vw-corporate-business' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-corporate-business' ),
				'style'       => esc_html__( 'Font Style',  'vw-corporate-business' ),
				'line_height' => esc_html__( 'Line Height', 'vw-corporate-business' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-corporate-business' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-corporate-business-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-corporate-business-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-corporate-business' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-corporate-business' ),
        'Acme' => __( 'Acme', 'vw-corporate-business' ),
        'Anton' => __( 'Anton', 'vw-corporate-business' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-corporate-business' ),
        'Arimo' => __( 'Arimo', 'vw-corporate-business' ),
        'Arsenal' => __( 'Arsenal', 'vw-corporate-business' ),
        'Arvo' => __( 'Arvo', 'vw-corporate-business' ),
        'Alegreya' => __( 'Alegreya', 'vw-corporate-business' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-corporate-business' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-corporate-business' ),
        'Bangers' => __( 'Bangers', 'vw-corporate-business' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-corporate-business' ),
        'Bad Script' => __( 'Bad Script', 'vw-corporate-business' ),
        'Bitter' => __( 'Bitter', 'vw-corporate-business' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-corporate-business' ),
        'BenchNine' => __( 'BenchNine', 'vw-corporate-business' ),
        'Cabin' => __( 'Cabin', 'vw-corporate-business' ),
        'Cardo' => __( 'Cardo', 'vw-corporate-business' ),
        'Courgette' => __( 'Courgette', 'vw-corporate-business' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-corporate-business' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-corporate-business' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-corporate-business' ),
        'Cuprum' => __( 'Cuprum', 'vw-corporate-business' ),
        'Cookie' => __( 'Cookie', 'vw-corporate-business' ),
        'Chewy' => __( 'Chewy', 'vw-corporate-business' ),
        'Days One' => __( 'Days One', 'vw-corporate-business' ),
        'Dosis' => __( 'Dosis', 'vw-corporate-business' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-corporate-business' ),
        'Economica' => __( 'Economica', 'vw-corporate-business' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-corporate-business' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-corporate-business' ),
        'Francois One' => __( 'Francois One', 'vw-corporate-business' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-corporate-business' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-corporate-business' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-corporate-business' ),
        'Handlee' => __( 'Handlee', 'vw-corporate-business' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-corporate-business' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-corporate-business' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-corporate-business' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-corporate-business' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-corporate-business' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-corporate-business' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-corporate-business' ),
        'Kanit' => __( 'Kanit', 'vw-corporate-business' ),
        'Lobster' => __( 'Lobster', 'vw-corporate-business' ),
        'Lato' => __( 'Lato', 'vw-corporate-business' ),
        'Lora' => __( 'Lora', 'vw-corporate-business' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-corporate-business' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-corporate-business' ),
        'Merriweather' => __( 'Merriweather', 'vw-corporate-business' ),
        'Monda' => __( 'Monda', 'vw-corporate-business' ),
        'Montserrat' => __( 'Montserrat', 'vw-corporate-business' ),
        'Muli' => __( 'Muli', 'vw-corporate-business' ),
        'Marck Script' => __( 'Marck Script', 'vw-corporate-business' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-corporate-business' ),
        'Open Sans' => __( 'Open Sans', 'vw-corporate-business' ),
        'Overpass' => __( 'Overpass', 'vw-corporate-business' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-corporate-business' ),
        'Oxygen' => __( 'Oxygen', 'vw-corporate-business' ),
        'Orbitron' => __( 'Orbitron', 'vw-corporate-business' ),
        'Patua One' => __( 'Patua One', 'vw-corporate-business' ),
        'Pacifico' => __( 'Pacifico', 'vw-corporate-business' ),
        'Padauk' => __( 'Padauk', 'vw-corporate-business' ),
        'Playball' => __( 'Playball', 'vw-corporate-business' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-corporate-business' ),
        'PT Sans' => __( 'PT Sans', 'vw-corporate-business' ),
        'Philosopher' => __( 'Philosopher', 'vw-corporate-business' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-corporate-business' ),
        'Poiret One' => __( 'Poiret One', 'vw-corporate-business' ),
        'Quicksand' => __( 'Quicksand', 'vw-corporate-business' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-corporate-business' ),
        'Raleway' => __( 'Raleway', 'vw-corporate-business' ),
        'Rubik' => __( 'Rubik', 'vw-corporate-business' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-corporate-business' ),
        'Russo One' => __( 'Russo One', 'vw-corporate-business' ),
        'Righteous' => __( 'Righteous', 'vw-corporate-business' ),
        'Slabo' => __( 'Slabo', 'vw-corporate-business' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-corporate-business' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-corporate-business'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-corporate-business' ),
        'Sacramento' => __( 'Sacramento', 'vw-corporate-business' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-corporate-business' ),
        'Tangerine' => __( 'Tangerine', 'vw-corporate-business' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-corporate-business' ),
        'VT323' => __( 'VT323', 'vw-corporate-business' ),
        'Varela Round' => __( 'Varela Round', 'vw-corporate-business' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-corporate-business' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-corporate-business' ),
        'Volkhov' => __( 'Volkhov', 'vw-corporate-business' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-corporate-business' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-corporate-business' ),
			'100' => esc_html__( 'Thin',       'vw-corporate-business' ),
			'300' => esc_html__( 'Light',      'vw-corporate-business' ),
			'400' => esc_html__( 'Normal',     'vw-corporate-business' ),
			'500' => esc_html__( 'Medium',     'vw-corporate-business' ),
			'700' => esc_html__( 'Bold',       'vw-corporate-business' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-corporate-business' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-corporate-business' ),
			'italic'  => esc_html__( 'Italic', 'vw-corporate-business' ),
			'oblique' => esc_html__( 'Oblique', 'vw-corporate-business' )
		);
	}
}
