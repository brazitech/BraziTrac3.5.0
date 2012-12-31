<?php
/**
 * @version		$Id$
 * @package		wats
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

// import JTable
jimport('joomla.database.table');

/**
 * Table handler for #__wats_category
 */
class WTableMsg extends JTable {
	/**
	 * Primary Key
	 *
	 * @access public
	 * @var int
	 */
	var $msgid = null;
	
	/**
	 * Ticket the message belongs to
	 *
	 * @access public
	 * @var int
	 */
	var $ticketid = null;
	
	/**
	 * Message owner
	 *
	 * @access public
	 * @var int
	 */
	var $watsid = null;

	/**
	 * Message content
	 *
	 * @access public
	 * @var string
	 */
	var $msg = null;

	/**
	 * Message submission date and time
	 *
	 * @access public
	 * @var string
	 */
	var $datetime = null;

	/**
	 * Constructor
	 *
	 * @access protected
	 * @param $db JDatabase DBO
	 */
	function __construct(&$db)
	{
		parent::__construct('#__wats_msg', 'msgid', $db);
	}

	/**
	 * Determines if buffer is valid.
	 *
	 * @todo Add check for date and time
	 */
	function check() {
		if ($this->ticketid === null) {
			$this->setError("MESSAGE TICKET MUST EXIST");
			return false;
		}
		
		if ($this->watsid === null) {
			$this->setError("MESSAGE USER MUST EXIST");
			return false;
		}
		
		if ($this->message === null) {
			$this->setError("MESSAGE CONTENT MUST EXIST");
			return false;
		}
		
		return true;
	}
}
?>
