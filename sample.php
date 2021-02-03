<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sample</title>
		
        <link rel="stylesheet" href="style/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="style/css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="style/css/font-awesome.min.css" media="screen" >
		<script src="style/js/jquery/jquery-2.2.4.js"></script>
		
    </head>
	
    <body >
		<div class="container">
  <h2>Expand and Collapse with different icons</h2>
    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">
      <span class="glyphicon glyphicon-collapse-down"></span> Open
    </button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>

<script>
$(document).ready(function(){
  $("#demo").on("hide.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-down"></span> Open');
  });
  $("#demo").on("show.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-up"></span> Close');
  });
});
</script>

	</body>
</html>