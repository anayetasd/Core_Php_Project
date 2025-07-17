<?php
class Stock extends Model implements JsonSerializable{
	public $id;
	public $product_id;
	public $qty;
	public $transaction_type_id;
	public $remark;
	public $created_at;
	public $warehouse_id;

	public function __construct(){
	}
	public function set($id,$product_id,$qty,$transaction_type_id,$remark,$created_at,$warehouse_id){
		$this->id=$id;
		$this->product_id=$product_id;
		$this->qty=$qty;
		$this->transaction_type_id=$transaction_type_id;
		$this->remark=$remark;
		$this->created_at=$created_at;
		$this->warehouse_id=$warehouse_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stocks(product_id,qty,transaction_type_id,remark,created_at,warehouse_id)values('$this->product_id','$this->qty','$this->transaction_type_id','$this->remark','$this->created_at','$this->warehouse_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stocks set product_id='$this->product_id',qty='$this->qty',transaction_type_id='$this->transaction_type_id',remark='$this->remark',created_at='$this->created_at',warehouse_id='$this->warehouse_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stocks where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,product_id,qty,transaction_type_id,remark,created_at,warehouse_id from {$tx}stocks");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,product_id,qty,transaction_type_id,remark,created_at,warehouse_id from {$tx}stocks $criteria limit $top,$perpage");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stocks $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,product_id,qty,transaction_type_id,remark,created_at,warehouse_id from {$tx}stocks where id='$id'");
		$stock=$result->fetch_object();
			return $stock;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stocks");
		$stock =$result->fetch_object();
		return $stock->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Product Id:$this->product_id<br> 
		Qty:$this->qty<br> 
		Transaction Type Id:$this->transaction_type_id<br> 
		Remark:$this->remark<br> 
		Created At:$this->created_at<br> 
		Warehouse Id:$this->warehouse_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStock"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stocks");
		while($stock=$result->fetch_object()){
			$html.="<option value ='$stock->id'>$stock->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stocks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select s.id,p.name product,s.qty,t.name transaction_type,s.remark,s.created_at,w.name warehouse from {$tx}stocks s,{$tx}products p,{$tx}transaction_types t,{$tx}warehouses w where p.id=s.product_id and t.id=s.transaction_type_id and w.id=s.warehouse_id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stock/create","text"=>"New Stock"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Product</th><th>Qty</th><th>Transaction Type</th><th>Remark</th><th>Created At</th><th>Warehouse </th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Product</th><th>Qty</th><th>Transaction Type</th><th>Remark</th><th>Created At</th><th>Warehouse </th></tr>";
		}
		while($stock=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"stock/show/$stock->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"stock/edit/$stock->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"stock/confirm/$stock->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stock->id</td><td>$stock->product</td><td>$stock->qty</td><td>$stock->transaction_type</td><td>$stock->remark</td><td>$stock->created_at</td><td>$stock->warehouse</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}

	static function balance($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stocks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("SELECT p.id, p.name product, sum(s.qty) total FROM `{$tx}stocks` s, {$tx}transaction_types t,{$tx}products p where p.id=s.product_id and t.id=s.transaction_type_id $criteria group by product_id  limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stock/create","text"=>"New Stock"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Product </th><th>Qty</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Product</th><th>Qty</th></tr>";
		}
		while($stock=$result->fetch_object()){
			
			$html.="<tr><td>$stock->id</td><td>$stock->product</td><td>$stock->total</td></tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}


	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result=$db->query("select s.id,p.name product,s.qty,t.name transaction_type,s.remark,s.created_at,w.name warehouse from {$tx}stocks s,{$tx}products p,{$tx}transaction_types t,{$tx}warehouses w where p.id=s.product_id and t.id=s.transaction_type_id and w.id=s.warehouse_id and s.id={$id}");
		$stock=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Stock Show</th></tr>";
		$html.="<tr><th>Id</th><td>$stock->id</td></tr>";
		$html.="<tr><th>Product</th><td>$stock->product</td></tr>";
		$html.="<tr><th>Qty</th><td>$stock->qty</td></tr>";
		$html.="<tr><th>Transaction Type </th><td>$stock->transaction_type</td></tr>";
		$html.="<tr><th>Remark</th><td>$stock->remark</td></tr>";
		$html.="<tr><th>Created At</th><td>$stock->created_at</td></tr>";
		$html.="<tr><th>Warehouse </th><td>$stock->warehouse</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
