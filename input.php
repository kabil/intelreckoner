 <!DOCTYPE html>   
 <html lang="en">   
 <head>   
 <meta charset="utf-8">   
 <title>Boris's Intel</title>   
 <meta name="description" content="Twitter Bootstrap Version2.0 horizontal form layout example from w3resource.com.">   
    <link href="bootstrap.css" rel="stylesheet">  
 </head>  
 <body>
 <?php
 if (isset($_POST[intelo]))
     {

	include("dbc.php");
	mysql_select_db('wrdp');
	if ($_POST[intelo] == intel) 
	{
    		$query = sprintf("INSERT INTO intel (date, name, content) VALUES (CURDATE(),'%s','%s')", mysql_real_escape_string($_POST[input01]),mysql_real_escape_string($_POST[textarea]));
 	}
	else
	{
    		$query = sprintf("INSERT INTO todo (todo) VALUES ('%s')",
    		mysql_real_escape_string($_POST[textarea]));
	}
	$result = mysql_query($query);

	if (!$result) 
	{
    		$message  = 'Invalid query: ' . mysql_error() . "\n";
    		$message .= 'Whole query: ' . $query;
    		die($message);
	} 
	else 
	{ 
    		echo  "Posted Successfully !!";
    		header('Location: index.php');
	}

    } 
else
   {
 ?>



  <div class="row-fluid">
  <div class="span6">  
 <form class="form-horizontal" action=input.php method="post">  
            <fieldset>  
              <legend>Add New Intel</legend>  
              <div class="control-group">  
                <label class="control-label" for="input01">Intel's Title</label>  
                <div class="controls">  
                  <input type="text" class="input-xlarge" id="input01" name="input01">  
                </div>  
              </div>        
              <div class="control-group">   
                <label class="control-label" for="textarea">Data</label>  
                <div class="controls">  
                  <textarea class="input-xlarge" id="textarea" rows="10" name="textarea"></textarea>  
                </div>  
              </div>  
              <div class="form-actions">  
                <button type="submit" name="intel" class="btn btn-primary">Save changes</button>  
                  <input type="hidden" name="intelo" value="intel">
            
    <button class="btn">Cancel</button>  
              </div>  
            </fieldset>  
    </form>  
   </div>
<? } ?> 
 </body>  
 </html>  

