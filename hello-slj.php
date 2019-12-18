<?php
/**
 * Hello Samuel L. Jackson
 *
 * @package   Hello_Samuel_L_Jackson
 * @copyright Copyright(c), John Regan (http://johnregan3.me/)
 * @license http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 * Plugin Name: Hello Samuel L. Jackson
 * Plugin URI: https://github.com/johnregan3/Hello-Samuel-L-Jackson
 * Description: Inserts random movie quotes by Samuel L. Jackson into your Admin header.
 * Version: 1.2
 * Author: John Regan
 * Author URI: http://johnregan3.me
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: hello_slj
 */

/**
 * Mad props to Matt Mullenweg for the original code
 * and Chris Olbekson (c3mdigital) & Luke Carbis (@lukecarbis) for the encouragement to
 * engage in such a trivial pursuit.
 *
 * If you enjoy this plugin, check out the Samuel L. Jackson Dummy Content Generator:
 * http://johnregan3.github.io/slj-dummy-content/
 *
 */

namespace Hello_Samuel_L_Jackson;

class Plugin {

	/**
	 * The plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.2';

	/**
	 * Plugin constructor.
	 */
	function __construct() {
		add_action( 'admin_notices', [ $this, 'render_quote' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
	}

	/**
	 * Return a Samuel L. Jackson quote.
	 *
	 * @return string
	 */
	public function get_quote() {
		$quotes = apply_filters(
			'hello_slj_quotes',
			[
				__( 'AK-47 The very best there is. When you absolutely positively got to kill every mother fucker in the room, except no substitute.', 'hello_slj' ),
				__( 'I\'m serious as a heart attack', 'hello_slj' ),
				__( 'Is she dead, yes or no?', 'hello_slj' ),
				__( 'Hold on to your butts!', 'hello_slj' ),
				__( 'No, motherfucker!', 'hello_slj' ),
				__( 'Are you ready for the truth?', 'hello_slj' ),
				__( 'I gotta piss.', 'hello_slj' ),
				__( 'No man, I don\'t eat pork.', 'hello_slj' ),
				__( 'Mmmmm, this is a tasty burger!', 'hello_slj' ),
				__( 'What kills me is that everybody thinks I like jazz.', 'hello_slj' ),
				__( 'Want to know what the "L." in Samuel L. Jackson means? None of your fucking business.', 'hello_slj' ),
				__( 'Enough is enough! I have had it with these motherfucking snakes on this motherfucking plane!', 'hello_slj' ),
				__( 'Well, that\'s good news. Snakes on crack.', 'hello_slj' ),
				__( 'Turn this big motherfucker left, Troy!', 'hello_slj' ),
				__( 'Eddie Kim somehow managed to fill the plane with poisonous snakes.', 'hello_slj' ),
				__( 'I\'m about to open some fucking windows!', 'hello_slj' ),
				__( 'I guess I should speak louder so you can hear me?', 'hello_slj' ),
				__( 'The reason we\'re gathered here on our God-given, much-needed day of rest is that we have a Polish hostage.', 'hello_slj' ),
				__( 'Let\'s try to get in the killing mode.', 'hello_slj' ),
				__( 'Yeah. What the hell? Mount up.', 'hello_slj' ),
				__( 'Flip a bitch!', 'hello_slj' ),
				__( 'I need your A-game boys... and girl.', 'hello_slj' ),
				__( 'Drop Fruit of the Loomski in the A-car.', 'hello_slj' ),
				__( 'How can I trust a man who won\'t eat a good old-fashioned American hotdog?', 'hello_slj' ),
				__( 'Hey! Get the hell off my damn property.', 'hello_slj' ),
				__( 'Street. Don\'t beat him so badly I can\'t get a rematch, all right?', 'hello_slj' ),
				__( 'To her dumb country ass, Compton is Hollywood.', 'hello_slj' ),
				__( 'How old is that machine gun shit?', 'hello_slj' ),
				__( 'I didn\'t hear you wash your hands.', 'hello_slj' ),
				__( 'My ass may be dumb, but I ain\'t no dumbass.', 'hello_slj' ),
				__( 'Oh, ya\'ll a couple Cheech and Chongs, huh?', 'hello_slj' ),
				__( 'Girl, don\'t make me put my foot in your ass.', 'hello_slj' ),
				__( 'Try not to tear his clothes off, OK? They\'re new.', 'hello_slj' ),
				__( 'Last chance, motherfucker. You sure?', 'hello_slj' ),
				__( 'You keep fuckin\' with me, you\'re gonna be asleep forever.', 'hello_slj' ),
				__( 'Come on man! If it wasn\'t for me, you wouldn\'t HAVE that motherfuckin\' boat!', 'hello_slj' ),
				__( 'Oh shit, that shit rhymes! \'Blew Beau-mont\'s, brains out!', 'hello_slj' ),
				__( 'Let me have a screwdriver homes.', 'hello_slj' ),
				__( 'Access main program. Access main security. Access main program grid.', 'hello_slj' ),
				__( 'God damn it! I hate this hacker crap!', 'hello_slj' ),
				__( 'You got to cool that shit off. And that\'s the double-truth, Ruth.', 'hello_slj' ),
				__( 'We\'re keepers of the peace, not soldiers.', 'hello_slj' ),
				__( 'It\'s Giuliani time!', 'hello_slj' ),
				__( 'It\'s my duty to please that booty!', 'hello_slj' ),
				__( 'You wouldn\'t know Egyptian cotton if the Pharaoh himself sent it to you, you knockoff-wearing motherfucker!', 'hello_slj' ),
				__( 'Do you think that makes me less dangerous, or more dangerous?', 'hello_slj' ),
				__( 'I\'m gonna fuck you up for making me run!', 'hello_slj' ),
				__( 'What\'s up with the \'cornbread\' talk, man?', 'hello_slj' ),
				__( 'I know cats who\'d take out whole zipcodes for that kind of cheese.', 'hello_slj' ),
				__( 'Yes, they deserved to die and I hope they burn in hell!', 'hello_slj' ),
				__( 'Where - is - my - super - suit?', 'hello_slj' ),
				__( 'You tell me where my suit is, woman!', 'hello_slj' ),
				__( 'The guy has me on a platter and he won\'t shut up!', 'hello_slj' ),
				__( 'To tell you the truth, I\'d rather go bowling.', 'hello_slj' ),
				__( 'Waste the motherfuckers.', 'hello_slj' ),
				__( 'I was not going to stand by and see another Marine die just to live by those fucking rules.', 'hello_slj' ),
				__( 'Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I\'m in a transitional period so I don\'t wanna kill you, I wanna help you.', 'hello_slj' ),
				__( 'Your bones don\'t break, mine do.', 'hello_slj' ),
				__( 'Look, just because I don\'t be givin\' no man a foot massage don\'t make it right for Marsellus to throw Antwone into a glass motherfuckin\' house, fuckin\' up the way the nigger talks.', 'hello_slj' ),
				__( 'Today\'s temperature\'s gonna rise up over 100 degrees, so there\'s a Jheri curl alert!', 'hello_slj' ),
			]
		);

		// Randomly choose a line.
		return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
	}

	/**
	 * Render the quote.
	 */
	public function render_quote() {
		echo wp_kses_post(
			sprintf(
				'<p id="slj">%1$s</p>',
				$this->get_quote()
			)
		);
	}

	/**
	 * Enqueue admin styles.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'hello_slj', plugin_dir_url( __FILE__ ) . 'hello-slj.css', [], self::VERSION );
	}
}

/**
 * Get the plugin object.
 *
 * @return Plugin
 */
function hello_slj() {
	static $instance;
	if ( null === $instance ) {
		$instance = new Plugin();
	}

	return $instance;
}

hello_slj();
