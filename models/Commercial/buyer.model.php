<?php
class Buyer extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $email;
	public $phoneNumber;
	public $address;
	public $paymentMethod;
	public $amount;

	public function __construct(){
	}
	public function set($id,$name,$email,$phoneNumber,$address,$paymentMethod,$amount){
		$this->id=$id;
		$this->name=$name;
		$this->email=$email;
		$this->phoneNumber=$phoneNumber;
		$this->address=$address;
		$this->paymentMethod=$paymentMethod;
		$this->amount=$amount;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}buyers(name,email,phoneNumber,address,paymentMethod,amount)values('$this->name','$this->email','$this->phoneNumber','$this->address','$this->paymentMethod','$this->amount')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}buyers set name='$this->name',email='$this->email',phoneNumber='$this->phoneNumber',address='$this->address',paymentMethod='$this->paymentMethod',amount='$this->amount' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}buyers where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,email,phoneNumber,address,paymentMethod,amount from {$tx}buyers");
		$data=[];
		while($buyer=$result->fetch_object()){
			$data[]=$buyer;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,email,phoneNumber,address,paymentMethod,amount from {$tx}buyers $criteria limit $top,$perpage");
		$data=[];
		while($buyer=$result->fetch_object()){
			$data[]=$buyer;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}buyers $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,email,phoneNumber,address,paymentMethod,amount from {$tx}buyers where id='$id'");
		$buyer=$result->fetch_object();
			return $buyer;
	}
	public static function filter($name){
		global $db,$tx;
		//Update field name after where keyword if don't have name field
		$result=$db->query("select id,name,email,phoneNumber,address,paymentMethod,amount from {$tx}buyers where name like '%$name%'");
		$data=[];
		while($buyer=$result->fetch_object()){
			$data[]=$buyer;
		}
			return $data;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}buyers");
		$buyer =$result->fetch_object();
		return $buyer->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Email:$this->email<br> 
		Phonenumber:$this->phoneNumber<br> 
		Address:$this->address<br> 
		Paymentmethod:$this->paymentMethod<br> 
		Amount:$this->amount<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBuyer"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}buyers");
		while($buyer=$result->fetch_object()){
			$html.="<option value ='$buyer->id'>$buyer->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}buyers $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,email,phoneNumber,address,paymentMethod,amount from {$tx}buyers $criteria limit $top,$perpage");
		$html="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phonenumber</th><th>Address</th><th>Paymentmethod</th><th>Amount</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phonenumber</th><th>Address</th><th>Paymentmethod</th><th>Amount</th></tr>";
		}
		while($buyer=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"buyer/show/$buyer->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"buyer/edit/$buyer->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"buyer/confirm/$buyer->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$buyer->id</td><td>$buyer->name</td><td>$buyer->email</td><td>$buyer->phoneNumber</td><td>$buyer->address</td><td>$buyer->paymentMethod</td><td>$buyer->amount</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,email,phoneNumber,address,paymentMethod,amount from {$tx}buyers where id={$id}");
		$buyer=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Buyer Show</th></tr>";
		$html.="<tr><th>Id</th><td>$buyer->id</td></tr>";
		$html.="<tr><th>Name</th><td>$buyer->name</td></tr>";
		$html.="<tr><th>Email</th><td>$buyer->email</td></tr>";
		$html.="<tr><th>Phonenumber</th><td>$buyer->phoneNumber</td></tr>";
		$html.="<tr><th>Address</th><td>$buyer->address</td></tr>";
		$html.="<tr><th>Paymentmethod</th><td>$buyer->paymentMethod</td></tr>";
		$html.="<tr><th>Amount</th><td>$buyer->amount</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
