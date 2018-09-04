<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="css/design.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <script>
            $(document).ready(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $("#send").click(function(e){
                    e.preventDefault();
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/sendmsg',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, message:$("#ipf").val()},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
                    $.ajax({
                    url: '/getmsg',
                    type: 'get',
                    success: function (data) {
                    	$('#ipf').val('') ;
    					$("tbody").empty('');
                    	data.forEach(function(rowData) {
									  if(rowData.sender_id == 1)
										  {
										  	$(".text").append('<tr><td style="padding-right:15" align="right">'+rowData.text+'</td></tr>'+
										  		'<tr><td style="padding-right:15" class="time" align="right">'+rowData.created_at+'</td></tr>');
										  }
										else
											{
												$(".text").append('<tr><td style="padding-left:15" align="left">'+rowData.text+'</td></tr>'+
													'<tr><td style="padding-left:15" class="time" align="left">'+rowData.created_at+'</td></tr>');
											}
									});
                    }
                });
                });
                $.ajax({
                    url: '/getmsg',
                    type: 'get',
                    success: function (data) {
                    	data.forEach(function(rowData) {
									 if(rowData.sender_id == 1)
										  {
										  	$(".text").append('<tr><td style="padding-right:15" align="right">'+rowData.text+'</td></tr>'+
										  		'<tr><td style="padding-right:15" class="time" align="right">'+rowData.created_at+'</td></tr>');
										  }
										else
											{
												$(".text").append('<tr><td style="padding-left:15" align="left">'+rowData.text+'</td></tr>'+
													'<tr><td style="padding-left:15" class="time" align="left">'+rowData.created_at+'</td></tr>');
											}
									});
                    }
                });
            });
        </script>

        <title>chat</title>
    </head>
    <body>
    	<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
      <h3>Toukir Azad Tonmoy</h3>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">
    	<div class="msgCon">
    		<table class="text" style="width:100%">
	    	<tbody>
			  <tr>
			  </tr>
			</tbody>
			</table>
    	</div>
			<div class="fixed">
				<form name="hello" action="">
			    	<label for="ipf">New message</label>
			      	<input class="classinput" type="text" name="ipf" id="ipf">
			        <button class="btn btn-primary classinput" type="submit" id="send">Submit</button>
  				</form>
			</div>
			
    </div>
  </div>
    </div>
    </form>
    </body>
</html>

<!-- <style>
    .classinput[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .classinput[type=submit] {
        width: 8%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float:right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style> -->