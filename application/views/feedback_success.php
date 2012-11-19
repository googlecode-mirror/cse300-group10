<html>
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
		
<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
		
		<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#reportForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
                                        }
                    });
			 });
	</script>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center> Feedback Submission Successful !!! </center></h1>
	<p><center>&nbsp &nbsp You feedback has been successfully received by us. We will get back to you shortly at <b><?php echo $check?></b></center></p>
	
	</div>
	</div>

</body>
</html>