<?php 
/**
* 
*/
class BD_Model
{
	var $host='localhost';
	var $user='root';
	var $pass='';
	var $bdat='practica7';
	private $conn;
	public $table='';
	protected $query;
	protected $rows=array();
	public $mensaje='Procesado';	
	function __construct()
	{
		$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->bdat);
		if ($this->conn->connect_error) {
					# code...
					die ('Error de conexion');
				}	

		# code...
	}
	public function get_all()
	{
		$sql='select * from '.$this->table.' order by id asc';
		$result=$this->conn->query($sql);
		while ($fila=$result->fetch_assoc()) {
			# code...
			$this->rows[]=$fila;
		}
		return $this->rows;
	}
	public function get_all2()
	{
		$sql='select p.id,p.descripcion,p.costo_unitario,p.cantidad,p.stock_minimo,c.descripcion as descripcion2, c.id as id2 from '.$this->table.' p inner join categoria c on p.id_categoria = c.id order by id asc';
		$result=$this->conn->query($sql);
		while ($fila=$result->fetch_assoc()) {
			# code...
			$this->rows[]=$fila;
		}
		return $this->rows;
	}
	public function get_by($id=null)
	{
		if ($id) $sql='select * from '.$this->table.' where id ='.$id.';';
		$result = $this->conn->query($sql);
			# code...
		return $result->fetch_assoc();
	}
	public function ejecutar_query($sql)
	{
	  $this->conn->query($sql);
	}
	public function ejecutar_query2($sql)
	{
	 $result = $this->conn->query($sql);
			# code...
		return $result->fetch_assoc();
	}
	
	public function delete($id)
	{
		$sql="delete from ".$this->table." where id = ".$id.";";
		$this->ejecutar_query($sql);
	}
	public function update($id,$data)
	{
		$sql="update ".$this->table." set ";
		foreach ($data as $campo => $valor) {
			# code...
			$sql.=$campo." = '".$valor."',";
		}
		$sql = substr($sql,0,-1);
		$sql .= " where id =".$id.";";
		$this->ejecutar_query($sql);
		//echo $sql; 
		return true;
	}
	public function insert ($data)
	{
	  $campos="";
	  $valores="";
	  foreach ($data as $c => $v) {
	  			$campos.="$c,";
	  			$valores.=(is_numeric($v)&&(intval($v)==$v))? $v."," : "'$v',";
	  			# code...
	  		}	
	  	$valores = substr($valores,0,-1);
	  	$campos = substr($campos,0,-1);
	  	$sql = "insert into ".$this->table."(".$campos.") values (".$valores.");";
	  	echo $sql;
	  	$this->ejecutar_query($sql);
	  	//echo $sql;
	  	return true;	
	}
	public function get_min_stock()
	{
		$sql='select * from '.$this->table.' where cantidad <= stock_minimo;';
		$result=$this->conn->query($sql);
		while ($fila=$result->fetch_assoc()) {
			# code...
			$this->rows[]=$fila;
		}
		return $this->rows;
	}
	public function get_prod_masventa()
	{
		$sql='select p.id,p.descripcion,sum(v.cantidad) as cant from ventas v inner join productos p on p.id=v.id_producto group by p.id order by cant desc limit 3;';

		$result=$this->conn->query($sql);
		while ($fila=$result->fetch_assoc()) {
			# code...
			$this->rows[]=$fila;
		}
		return $this->rows;
	}
	public function get_us_masventa()
	{
		$sql='select u.nombre, sum(v.cantidad) as cant from usuario u inner join ventas v on u.id=v.id_usuario group by u.nombre order by cant desc limit 3;';

		$result=$this->conn->query($sql);
		while ($fila=$result->fetch_assoc()) {
			# code...
			$this->rows[]=$fila;
		}
		return $this->rows;
	}

	public function cerrar_conexion()
	{
		$this->conn->close();
	}
}
 ?>