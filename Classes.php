<?php
 /**
* Apicall
* Description:  To make api call.
* 
* @author     Mehul Dave <mehuldave13@gmail.com>
*/
class Apicall {
	public $data;
/**
* construct
* constructer
*
*/
	function __construct(){
		$url = "https://jsonplaceholder.typicode.com/users";   
		$ch = curl_init();   
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
		curl_setopt($ch, CURLOPT_URL, $url);   
		$res = curl_exec($ch);   
		$this->data = $res;
				
	}
}
/**
* Basetables
* Description:  To organize the base table data.
* 
* @author     Mehul Dave <mehuldave13@gmail.com>
*/
class Basetables {
	public $data;
/**
* construct
* constructer
*
* @param string $data initilize user data
*/
	function __construct($data){
		$this->data=$data;
		
	}
	
}
/**
* Tablerows
* Description:  To organize the base table row.
* 
* @author     Mehul Dave <mehuldave13@gmail.com>
*/
class Tablerows {
	public $data;
	/**
       * construct
       * constructer
       *
	   * @param string $data initilize user row
    */
	function __construct($data){
		$this->data=$data;
	}
	/**
       * get
       * To get user fields from data 
       *
	   * @param string $field user field
    */
	function get($field){
		return $this->data[$field];
	}
}
/**
* Userrow
* Description:  To organize the user row.
* Inherited: Tablerows 
* @author     Mehul Dave <mehuldave13@gmail.com>
*/
class Userrow extends Tablerows {
	public $usertable;
	/**
       * construct
       * constructer
       *
	   * @param string $data initilize user row
    */
	function __construct($data){
		parent::__construct($data);
	}
}
/**
* Usertable
* Description:  To organize the user table.
* Inherited: Basetables
* @author     Mehul Dave <mehuldave13@gmail.com>
*/
class Usertable extends Basetables{
	public $god;
	public $alltabledata;
	/**
       * construct
       * constructer
       *
	   * @param GodObject $god initilize god object & data
    */
	function __construct(GodObject $god){
		$this->god = $god;
		foreach($god->data as $kry => $data){
			$this->alltabledata[$kry] = new Userrow($data); 			
		}
		
		return $this;
	}
}
/**
* Tablerows
* Description:  To manage user data.
* 
* @author     Mehul Dave <mehuldave13@gmail.com>
*/
class GodObject {
	public $data;
	/**
       * construct
       * constructer
       *
	   * @param string $data initilize user data
    */
	function __construct($data){
		$this->data = $data;
	}
	/**
       * getUserData
       * To get user data from user table
       *
	*/
	function getUserData(){
		return new Usertable($this);
	}
}
$apicall = new Apicall();
$godobject = new GodObject(json_decode($apicall->data,true));
$usertable = $godobject->getUserData();
?>
<!DOCTYPE html>
<html>
<head>
	<title>External User Data</title>
</head>
<body>
	<?php foreach($usertable->alltabledata as $val): ?>
		<div class="row">
			<div class="col-6">
				<a class="col dataid" data-id="<?php echo $val->get('id'); ?>" href="#" ><?php echo $val->get('id'); ?></a>
				<span class="col"><a class="col dataid" data-id="<?php echo $val->get('id'); ?>" href="#" ><?php echo $val->get('name'); ?></a> </span>
				<span class="col"><a class="col dataid" data-id="<?php echo $val->get('id'); ?>" href="#" ><?php echo $val->get('username'); ?></a> </span>
				<div class="col-6" id="<?php echo $val->get('id'); ?>"></div>
			</div>
		</div>
	<?php endforeach; ?>
</body>
</html>