
<?php 
require_once('BD_Model.php');
/**
* 
*/
class Producto_Model extends BD_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->table="productos";
		# code...
	}
	
}
 ?>