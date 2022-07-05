<?php
class Pdf  {

	function __construct()
	{
		$CI = & get_instance();
		log_message('Debug', 'mPDF class is loaded.');
	}

	function load($param=NULL)
	{
		//include_once(APPPATH."library/mpdf/src/mpdf.php");



		$param = "'','', 0, '', 0, 0, 0, 0, 0, 0";

		return new PDF($param);
	}
}
