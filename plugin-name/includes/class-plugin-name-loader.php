<?php
defined( 'ABSPATH' ) || exit;

/**
 * Class for registering and arranging all actions and filters.
 * 
 * @since 1.0.0
 * 
 * @author Author Name
 */

class Plugin_Name_Loader {

	/**
	 * Array of actions registered with WordPress.
	 * 
	 * @access protected
	 * 
	 * @var array $actions
	 */
	protected $actions;

	/**
	 * Array of filters registered with WordPress.
	 * 
	 * @access protected
	 * 
	 * @var array $filters
	 */
	protected $filters;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * Add action to be registered with WordPress.
	 * 
	 * @param string $hook            The name of the WordPress action that is being registered.
	 * @param object $component       A reference to the instance of the object on which the action is defined.
	 * @param string $callback        The name of the function definition on the $component.
	 * @param int    $priority        Optional. The priority at which the function should be fired. Default is 10.
	 * @param int    $accepted_args		Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add filter to be registered with WordPress.
	 * 
	 * @param string $hook            The name of the WordPress filter that is being registered.
	 * @param object $component       A reference to the instance of the object on which the filter is defined.
	 * @param string $callback        The name of the function definition on the $component.
	 * @param int    $priority        Optional. The priority at which the function should be fired. Default is 10.
	 * @param int    $accepted_args		Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Utility function used to register actions and hooks.
	 * 
	 * @access private
	 * @param  array  $hooks            Collection of hooks that are being registered (actions or filters).
	 * @param  string $hook             Name of the WordPress filter that is being registered.
	 * @param  object $component        Reference to the instance of the object on which the filter is defined.
	 * @param  string $callback         Name of the function definition on the $component.
	 * @param  int    $priority         Priority at which the function should be fired.
	 * @param  int    $accepted_args		Number of arguments that should be passed to the $callback.
	 * @return array                    Collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * Register all filters and actions with WordPress.
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

	}

}
