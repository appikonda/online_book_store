<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="/obs/style.css" />
<!-- PAGE TITLE STARTS -->
<title>Online Book Store</title>
<!-- PAGE TITLE ENDS -->
</head>
<body>
<div id="container">
<div id="header">
<h1><a href="/obs/" title="Online Book Store">Online Book Store</a></h1>
<!-- CONTENT TITLE START -->
<h3>
Top Sellers
</h3>
<!-- CONTENT TITLE END -->
</div>
<!-- START NAVIGATION -->
<div id="top-nav">
<span id="auth-box">
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="arrowgunz@gmail.com">
<input type="hidden" name="display" value="1">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</span>
<ul>
<li><a href="/obs/display">Display</a></li>
<?php
if(isset($is_admin) && $is_admin) {
	echo '<li><a href="/obs/login/logout">Logout</a></li>';
}
?>
</ul>


</div>
<!-- END OF NAVIGATION -->
<!-- CONTENT GOES HERE -->
<div id="content">
<?php
if(isset($msg))
echo $msg;?>

<?php
if(isset($books_list)) {
	echo '<table>';
	foreach($books_list as $book) {
		if($book->qty > 0) {
		echo '<tr>';
		// FIXME : Check condition for
		echo '<td><img src="'.$book->display_pic.'" width="140" height="180" /></td>';
		echo '<td valign="top"><span class="small light">Title:</span> <span class="heavy"><a class="tooltip" data-tooltip="Click to preview/purchase the book" href="'.base_url().'display/preview/'.$book->book_id.'">'.$book->title.'</a></span><br/><span class="light small">Author: </span><span class="small">'.$book->author.'</span>';
		echo '<br/><span class="light small">Category: </span><span class="small">'.$book->category.'</span>';
		echo '<br/><span class="light small">ISBN: </span><span class="small">'.$book->isbn.'</span>';
		echo '<br/><span class="light small">Price: </span><span class="small">$'.$book->price.'</span>';
		echo '</td>';
		?>


		<?php
		echo '</tr>';
		}
	}
	echo '</table>';
} else {
	echo '<p>NO BOOKS AVAILABLE</p>';
}

?>

</div>
<!-- CONTENT ENDS HERE -->
<!-- FOOTER START -->
<div id="footer"><span class="light">&copy; 2011 Online Book Store. All rights reserved.</span></div>
</div>
<!-- FOOTER ENDS -->
</body>
</html>