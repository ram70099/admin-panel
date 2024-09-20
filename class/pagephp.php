
	
<?php
	
	class admin1
	{
		protected $dbconnect;
		public function __construct($dbconnect)
		{
			$this->connect = $dbconnect;
		}
		function edit($name,$content,$status)
		{
			if(isset($_POST['status']))
			{
				$status=$_POST['status'];
			}
			if($status=="on")
			{
				$status=1;
			}
			else
			{
				$status=0;
			}
			if (!empty($_POST['editid']))
			{
				$id=$_POST['editid'];
				$query="update page set name='$name',content='$content',status='$status' where id='$id'";
			}
			else
			{
				$query="insert into page (name,content,status) values('$name','$content','$status')";
			}
		
			if(mysqli_query($this->connect,$query))
			{
				echo "record inserted";
			}
			else
			{
				echo "record not inserted";
			}
		}
		function edit1($id)
		{
			$query = "SELECT * FROM page WHERE id=$id";
			$result = mysqli_query($this->connect, $query);
			return mysqli_fetch_assoc($result);
		}
		function show()
		{
			if(!empty($_GET['s']))
			{
				$search=$_GET['s'];
				$query="select * from page where name like '%$search%'";
			}
			else
			{
				$query="select * from page";
			}
			$result= mysqli_query($this->connect,$query);
			while($row = mysqli_fetch_assoc($result))
			{
				$data[]=$row;
			}
			return($data);
		}
		function delete1()
		{
			if(!empty($_GET['did']))
			{
				$id=$_GET['did'];
				$query="delete from page where id=$id";
				if(mysqli_query($this->connect,$query))
				{
					?>
						<script>
							alert("record Deleted");
						</script>
					<?php
				}
				else
				{
					?>
						<script>
							alert("record  not Deleted");
						</script>
					<?php
				}
			}
		}
	}
?>