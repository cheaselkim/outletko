<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
//require_once 'dompdf/autoload.inc.php';

//use Dompdf\Dompdf;
require_once 'tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
	public function __construct()
	{
		 parent::__construct();
	} 
}

?>