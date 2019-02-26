<form action="" method="post">



<input type="text" name="i"><br/>
<input type="text" name="j"><br/>
<input type="text" name="k"><br/>
<input type="submit" name="submit">
</form>
<?php
//echo  $_POST['adscategory'];
$i = $_POST['i'];
$j = $_POST['j'];
$k = $_POST['k'];
$error = array();

            if (isset($_POST['submit']))
			{
			      if (!empty($i))
				  {
				   if (!empty($j))
				   {
				   
				    if(!empty($k))
					{
					echo "nice";
					}
					else
					{
					$error[0] = "please fill k";
					//echo $error[0];
					
					}
				   }
				   else
				   {
				   $error[1] = "please fill j";
				   //echo $error[0];
				   }
				  }
				  else
				  {
				  
				  $error[2] = "please fill i";
				  //echo $error[0];
				  }
			
			}
			else
			{
			$error[2]="please fill";
			//echo $error[0];
			}
foreach ($error as $show)
{
//echo "$show";
}
?>