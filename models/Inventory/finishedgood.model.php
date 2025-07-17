<?php
class FinishedGood extends Model implements JsonSerializable{
	public $id;
	public $product_code;
	public $product_name;
	public $quantity;
	public $price;
	public $order_date;
	public $finished_good_status;
	public $batch_number;

	public function __construct(){
	}
	public function set($id,$product_code,$product_name,$quantity,$price,$order_date,$finished_good_status,$batch_number){
		$this->id=$id;
		$this->product_code=$product_code;
		$this->product_name=$product_name;
		$this->quantity=$quantity;
		$this->price=$price;
		$this->order_date=$order_date;
		$this->finished_good_status=$finished_good_status;
		$this->batch_number=$batch_number;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}finished_goods(product_code,product_name,quantity,price,order_date,finished_good_status,batch_number)values('$this->product_code','$this->product_name','$this->quantity','$this->price','$this->order_date','$this->finished_good_status','$this->batch_number')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}finished_goods set product_code='$this->product_code',product_name='$this->product_name',quantity='$this->quantity',price='$this->price',order_date='$this->order_date',finished_good_status='$this->finished_good_status',batch_number='$this->batch_number' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}finished_goods where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,product_code,product_name,quantity,price,order_date,finished_good_status,batch_number from {$tx}finished_goods");
		$data=[];
		while($finishedgood=$result->fetch_object()){
			$data[]=$finishedgood;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,product_code,product_name,quantity,price,order_date,finished_good_status,batch_number from {$tx}finished_goods $criteria limit $top,$perpage");
		$data=[];
		while($finishedgood=$result->fetch_object()){
			$data[]=$finishedgood;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}finished_goods $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,product_code,product_name,quantity,price,order_date,finished_good_status,batch_number from {$tx}finished_goods where id='$id'");
		$finishedgood=$result->fetch_object();
			return $finishedgood;
	}
	public static function filter($name){
		global $db,$tx;
		//Update field name after where keyword if don't have name field
		$result=$db->query("select id,product_code,product_name,quantity,price,order_date,finished_good_status,batch_number from {$tx}finished_goods where name like '%$name%'");
		$data=[];
		while($finishedgood=$result->fetch_object()){
			$data[]=$finishedgood;
		}
			return $data;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}finished_goods");
		$finishedgood =$result->fetch_object();
		return $finishedgood->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Product Code:$this->product_code<br> 
		Product Name:$this->product_name<br> 
		Quantity:$this->quantity<br> 
		Price:$this->price<br> 
		Order Date:$this->order_date<br> 
		Finished Good Status:$this->finished_good_status<br> 
		Batch Number:$this->batch_number<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbFinishedGood"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}finished_goods");
		while($finishedgood=$result->fetch_object()){
			$html.="<option value ='$finishedgood->id'>$finishedgood->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}finished_goods $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,product_code,product_name,quantity,price,order_date,finished_good_status,batch_number from {$tx}finished_goods $criteria limit $top,$perpage");
		$html="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Product Code</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Order Date</th><th>Finished Good Status</th><th>Batch Number</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Product Code</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Order Date</th><th>Finished Good Status</th><th>Batch Number</th></tr>";
		}
		while($finishedgood=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"finishedgood/show/$finishedgood->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"finishedgood/edit/$finishedgood->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"finishedgood/confirm/$finishedgood->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$finishedgood->id</td><td>$finishedgood->product_code</td><td>$finishedgood->product_name</td><td>$finishedgood->quantity</td><td>$finishedgood->price</td><td>$finishedgood->order_date</td><td>$finishedgood->finished_good_status</td><td>$finishedgood->batch_number</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,product_code,product_name,quantity,price,order_date,finished_good_status,batch_number from {$tx}finished_goods where id={$id}");
		$finishedgood=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">FinishedGood Show</th></tr>";
		$html.="<tr><th>Id</th><td>$finishedgood->id</td></tr>";
		$html.="<tr><th>Product Code</th><td>$finishedgood->product_code</td></tr>";
		$html.="<tr><th>Product Name</th><td>$finishedgood->product_name</td></tr>";
		$html.="<tr><th>Quantity</th><td>$finishedgood->quantity</td></tr>";
		$html.="<tr><th>Price</th><td>$finishedgood->price</td></tr>";
		$html.="<tr><th>Order Date</th><td>$finishedgood->order_date</td></tr>";
		$html.="<tr><th>Finished Good Status</th><td>$finishedgood->finished_good_status</td></tr>";
		$html.="<tr><th>Batch Number</th><td>$finishedgood->batch_number</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
