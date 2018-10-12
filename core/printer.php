<?php 
require_once '../core/init.php'; ?>
<?
if(!isLoggedIn()){
	header("Location: ../index.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Voucher</title>
	<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
	<script src="script.js"></script>
	<style>
	/* reset */

	*
	{
		border: 0;
		box-sizing: content-box;
		color: inherit;
		font-family: inherit;
		font-size: inherit;
		font-style: inherit;
		font-weight: inherit;
		line-height: inherit;
		list-style: none;
		margin: 0;
		padding: 0;
		text-decoration: none;
		vertical-align: top;
	}

	/* content editable */

	*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

	*[contenteditable] { cursor: pointer; }

	*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

	span[contenteditable] { display: inline-block; }

	/* heading */

	h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

	/* table */

	table { font-size: 75%; table-layout: fixed; width: 100%; }
	table { border-collapse: separate; border-spacing: 2px; }
	th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
	th, td { border-radius: 0.25em; border-style: solid; }
	th { background: #EEE; border-color: #BBB; }
	td { border-color: #DDD; }

	/* page */

	html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
	html { background: #999; cursor: default; }

	body { box-sizing: border-box; height: 22in; margin: 0 auto; overflow: auto; padding: 0.5in; width: 8.5in; }
	body { background: #FFF; border-radius: 1px; box-shadow: 0  01in -0.25in rgba(0, 0, 0, 0.5); }

	/* header */

	header { margin: 0 0 3em; }
	header:after { clear: both; content: ""; display: table; }

	header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
	header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
	header address p { margin: 0 0 0.25em; }
	header span, header img { display: block; float: right; }
	header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
	header img { max-height: 100%; max-width: 100%; }
	header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

	/* article */

	article, article address, table.meta, table.inventory { margin: 0 0 3em; }
	article:after { clear: both; content: ""; display: table; }
	article h1 { clip: rect(0 0 0 0); position: absolute; }

	article address { float: left; font-size: 125%; font-weight: bold; }

	/* table meta & balance */

	table.meta, table.balance { float: right; width: 36%; }
	table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

	/* table meta */

	table.meta th { width: 40%; }
	table.meta td { width: 60%; }

	/* table items */

	table.inventory { clear: both; width: 100%; }
	table.inventory th { font-weight: bold; text-align: center; }

	table.inventory td:nth-child(1) { width: 26%; }
	table.inventory td:nth-child(2) { width: 38%; }
	table.inventory td:nth-child(3) { text-align: right; width: 12%; }
	table.inventory td:nth-child(4) { text-align: right; width: 12%; }
	table.inventory td:nth-child(5) { text-align: right; width: 12%; }

	/* table balance */

	table.balance th, table.balance td { width: 50%; }
	table.balance td { text-align: right; }

	/* aside */

	aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
	aside h1 { border-color: #999; border-bottom-style: solid; }

	/* javascript */

	.add, .cut
	{
		border-width: 1px;
		display: block;
		font-size: .8rem;
		padding: 0.25em 0.5em;	
		float: left;
		text-align: center;
		width: 0.6em;
	}

	.add, .cut
	{
		background: #9AF;
		box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
		background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
		border-radius: 0.5em;
		border-color: #0076A3;
		color: #FFF;
		cursor: pointer;
		font-weight: bold;
		text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
	}

	.add { margin: -2.5em 0 0; }

	.add:hover { background: #00ADEE; }

	.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
	.cut { -webkit-transition: opacity 100ms ease-in; }

	tr:hover .cut { opacity: 1; }

	@media print {
		* { -webkit-print-color-adjust: exact; }
		html { background: none; padding: 0; }
		body { box-shadow: none; margin: 0; }
		span:empty { display: none; }
		.add, .cut { display: none; }
	}

	@page { margin: 0; }
</style>


<script src="https://docraptor.com/docraptor-1.0.0.js"></script>
<script>
	var downloadPDF = function() {
		DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {
        test: true, // test documents are free, but watermarked
        type: "pdf",
        document_content: document.querySelector('html').innerHTML, // use this page's HTML
        // document_content: "<h1>Hello world!</h1>",               // or supply HTML directly
        // document_url: "http://example.com/your-page",            // or use a URL
        // javascript: true,                                        // enable JavaScript processing
        // prince_options: {
        //   media: "screen",                                       // use screen styles instead of print styles
        // }
    });
	};
</script>
<style>
@media print {
	#pdf-button {
		display: none;
	}
}
</style>
</head>

<body id="HTMLtoPDF">

	<input id="pdf-button" type="button" value="Download PDF" onclick="downloadPDF()" />

	<?php 

	//voucher header table  data
	$id=$_GET['id'];

if(isset($_GET['cancel'])){
	$query="SELECT voucherNo,voucherDate,hotelName,AmendCount,typeName,guestName,specialRequests,extra FROM `voucherh` where id_h= ".$id." and status='cancelled' ";
	$dataSet=mysqli_query($connection,$query);
	$head=mysqli_fetch_array($dataSet);
	
	$vchrNo=$head['voucherNo'];
}
else if (isset($_GET['crp'])){
	
	$query="SELECT voucherNo,voucherDate,hotelName,AmendCount,typeName,guestName,specialRequests,extra FROM `voucherh` where id_h= ".$id." and status='cancelled' ";
	$dataSet=mysqli_query($connection,$query);
	$head=mysqli_fetch_array($dataSet);

	$vchrNo=$head['voucherNo'];
}
else if(isset($_GET['arp'])){

	$query="SELECT voucherNo,voucherDate,hotelName,AmendCount,typeName,guestName,specialRequests,extra FROM `voucherh` where id_h= ".$id." and status='amended' ";
	$dataSet=mysqli_query($connection,$query);
	$head=mysqli_fetch_array($dataSet);

	$vchrNo=$head['voucherNo'];
}
else{

	$query="SELECT voucherNo,voucherDate,hotelName,AmendCount,typeName,guestName,specialRequests,extra FROM `voucherh` where id_h= ".$id." and status='pending' ";
	$dataSet=mysqli_query($connection,$query);
	$head=mysqli_fetch_array($dataSet);

	$vchrNo=$head['voucherNo'];
}
	

	//amend count setup
	$query="SELECT count(status) as cnt FROM `voucherh` WHERE status ='amended' and voucherNo='$vchrNo' ";
	$dataSet=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($dataSet);
	?>
	
	<header>
		<!-- header image -->
		<img src="../images/header.jpg" style="width: 100%;height:100px;">
	</header>
	<!-- <article> -->
		<br>

		<!-- cancel image -->
		<?php if(isset($_GET['cancel']) || isset($_GET['crp'])): ?>
			<img src="../images/cancelled.jpg" style="width: 210px;height: 80px;">
		<?php endif; ?>

			<h1><b>Hotel Voucher</b></h1>
			<br>

		<table class="meta">
			<tr>
				<th><span >Hotel</span></th>
				<td><span ><?php echo $head['hotelName']; ?></span></td>
			</tr>
			<br>
			<tr>
				<th><span >Voucher No #</span></th>
				<td><span ><?php echo $head['voucherNo']; ?></span></td>
			</tr>
			<br>
			<tr>
				<th><span >Voucher date</span></th>
				<td><span ><?php echo $head['voucherDate']; ?></span></td>
			</tr>
			<tr>
				<th><span >Amend Count</span></th>
				<td><span ><?php echo $row['cnt']; ?></span></td>
			</tr>
			

		</table>
		<br><br><br><br><br>

		<!-- repeating section for a loop -->

		<div style="margin-top:10px;margin-bottom:20px; padding-bottom:20px;">
			<span style="font-weight: bold;margin-bottom: 40px !important;">Guest name  :  <span style="font-weight: normal;"><span><?php echo $head['typeName'].'' ?></span> <?php echo $head['guestName'] ?></span></span>
			<br><br><br>


			<table class="inventory">
				<thead>
					<tr>
						<th><span >Room category</span></th>
						<th><span >Meal plan</span></th>
						<th><span >Check in</span></th>
						<th><span >Check out</span></th>
						<th><span>Room count</span></th>
						<th><span>Room Type</span></th>
						<th><span>Rate</span></th>
						<th><span>Night</span></th>
					</tr>
				</thead>
				<tbody>
					<?php 
//voucher detail table get
	$query="SELECT `voucherNo`, `roomType`, `roomCatagory`, `mealPlan`, `checkIn`, `checkOut`, `roomCount`, `rate`, `night`,`roomType` from voucherd where ID_H=".$id." ";
	$dataSet=mysqli_query($connection,$query);
	while ($row=mysqli_fetch_array($dataSet)):
	?>
					<tr>
						<td><span><?php echo $row['roomCatagory']; ?></span></td>
						<td><span><?php echo $row['mealPlan']; ?></span></td>
						<td><span><?php echo $row['checkIn']; ?></span></td>
						<td><span><?php echo $row['checkOut']; ?></span></td>
						<td><span><?php echo $row['roomCount']; ?></span></td>
						<td><span><?php echo $row['roomType']; ?></span></td>
						<td><span><?php echo $row['rate']; ?></span></td>
						<td><span><?php echo $row['night']; ?></span></td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>


			<br><br>

			<span style="font-weight: normal;font-size:1rem;margin-right: 200px;">Extras: <span style="font-weight: normal;font-size:1rem;"><?php echo $head['extra'] ; ?></span></span>

			<br><br><br><br><br><br>
			<span style="font-weight: normal;font-size:1rem;">Special Requests :<span style="font-weight:normal;font-size:1rem;"><?php echo $head['specialRequests']; ?></span></span>
			<br><br><br><br>


			<img src="../images/footer.jpg" style="width: 100%;height:100px;">

			<!-- repeating section end -->	
		</div>	
		<br><br>		
	</article>
		<!-- <footer style="padding-top: 100px;">
		<aside>
			<h1><span >Thank you</span></h1>
		</aside>
	</footer> -->
	<!-- <script>
		window.print();

	</script> -->

	<script src="../js/jspdf.js"></script>
	<script type="text/javascript"></script>
	
	
</body>
</html>

<?php 

ob_end_flush();

?>
