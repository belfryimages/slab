<?php
/* AjaxResult
** A kind of ActionResult that sets the selected status and outputs the optional value.
** This is used for simple (usually success/failure) responses to AJAX requests, but the value could
** be anything, such as JSON, XML or HTML, and possibly generated by a nested call to a partial view, so this
** could potentially be more significant.
** (CC A-SA) 2009 Belfry Images [http://www.belfryimages.com.au | ben@belfryimages.com.au]
*/

class AjaxResult extends ActionResult {
	var $statusCode;
	var $data;
	
	function __construct($statusCode, $data) {
		$this->statusCode = $statusCode;
		$this->data = $data;
	}
	
	function render() {
		$html =& Dispatcher::loadHelper('html');
		$html->headerStatus($this->statusCode);
		if (!empty($this->data)) {
			e($this->data);
		}
	}
	
};

?>