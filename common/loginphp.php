
	
<?php
	class admin
	{
		private $dbconnect;
		public function __construct($dbconnect)
		{
			$this->connect = $dbconnect;
		}
		function login()
		{
			if(!empty($_POST['save']))
			{
				$username=$_POST['un'];
				$password=$_POST['pw'];
				$query="select * from login where username='$username' and password='$password'";
				$result=mysqli_query($this->connect,$query);
				$count=mysqli_num_rows($result);
				if($count>0)
				{
					header('location:addpage.php');
				}
				else
				{
					echo"Login Not Success";
				}
			}
		}
		function change($old,$new,$nnew)
		{
			if($new==$nnew)
			{
				$query="select * from login where password='$old'";
				$result=mysqli_query($this->connect,$query);
				$count=mysqli_num_rows($result);
				if($count>0)
				{
					$query="update login set password='$new'";
					mysqli_query($connect,$query);
					echo "Password Updated Successfully";
				}
				else
				{
					echo "Old Password Does Not Match";
				}
			}
			else
			{
				echo "New Password & Confirm New Password does not match";
			}
		}
	}
?>