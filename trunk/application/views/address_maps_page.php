<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/> 
	    <?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
	
	    <?php endforeach;?>
	    <?php echo $map['js']; ?>
	    <script type="text/javascript">
	    var j = jQuery.noConflict();
	    j(window).load(function ()
	    	{
		    	var i = setInterval(function ()
		    	{
			    	if (j('table.adp-directions').length)
			    	{
				    	clearInterval(i);
				    	j("table.adp-directions").remove(); 

            }
            }, 100);
            });

	    </script>

</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<h1><center>According to our data you live here !!</center></h1>
		<?php echo $map['html']; ?>
		</script>
		
		<br />
		<div id="directionsDiv"></div>
		<strong>Applicant's Name:</strong>Manik<br>
		
		<strong>ERP Address:</strong>1059 Vikas Kunj Vikas Puri New Delhi-110018<br>
		
		<center><p><b><big>If you have some issue with the shown address please click Report otherwise submit</big></b></p></center>
		<center>
		<!--<button style="height: 50px; width: 200px">Proceed</button> 
		&nbsp;
		&nbsp;
		<button style="height: 50px; width: 200px" action ="">Report</button></center>-->
		
		<button onclick="location.href='<?php echo site_url('Welcome/submit');?>'">Proceed</button>
		<button onclick="location.href='<?php echo site_url('Maps');?>'">Report</button>
		
		</br>
	
	</div>
	</div>
</body>
</html>