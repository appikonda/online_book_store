<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="http://localhost/obs/style.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/obs/js/jquery.buttonCaptcha.styles.css" />
<script type="text/javascript" src="http://localhost/obs/js/jquery.buttonCaptcha.min.js"></script>

<!-- PAGE TITLE STARTS -->
<title>Online Book Store</title>
<!-- PAGE TITLE ENDS -->
</head>
<body>
<div id="container">
<div id="header">
<h1><a href="http://localhost/obs/" title="Online Book Store">Online Book Store</a></h1>
<!-- CONTENT TITLE START -->
<h3>
Book Preview
</h3>
<!-- CONTENT TITLE END -->
</div>
<!-- START NAVIGATION -->
<div id="top-nav">
<ul>
<li><a href="http://localhost/obs/display">Display</a></li>
<?php 
if(isset($is_admin) && $is_admin) {
	echo '<li><a href="http://localhost/obs/login/logout">Logout</a></li>';
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
		echo '<tr>';
		// FIXME : Check condition for 
		echo '<td><img src="'.$book->display_pic.'" width="140" height="180" /></td>'; 
		echo '<td valign="top"><span class="small light">Title:</span> <span class="heavy">'.$book->title.'</span><br/><span class="light small">Author: </span><span class="small">'.$book->author.'</span>';
		echo '<br/><span class="light small">Category: </span><span class="small">'.$book->category.'</span>';
		echo '<br/><span class="light small">ISBN: </span><span class="small">'.$book->isbn.'</span>';
		echo '<br/><span class="light small">Price: </span><span class="small">$'.$book->price.'</span>';
		echo '</td>';
		?>
		
		<?php		
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo '<p>NO BOOKS AVAILABLE</p>';
}

?>
		<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="business" value="sandeep.appikonda@gmail.com">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="item_name" value="Cooking for Dummies">
		<input type="hidden" name="item_number" value="5">
		<input type="hidden" name="amount" value="29.99">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="button_subtype" value="products">
		<input type="hidden" name="no_note" value="0">
		<input type="hidden" name="tax_rate" value="6.000">
		<input type="hidden" name="add" value="1">
		<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_SM.gif:NonHostedGuest">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		
		<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="business" value="arrowgunz@gmail.com">
		<input type="hidden" name="display" value="1">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
<br/>
<fieldset>
<legend>Comments</legend>

<?php 
if(isset($comment_list)) {
	$count = 0;
	$total_rating = 0;
	foreach($comment_list as $comment) {
		$count++;
		echo '<div>';
		echo '<span class="small">'.$count.'.</span> <span class="small heavy">'.$comment->commenter.'</span> <span class="small">says:</span> '.$comment->content.' <span class="light small">'.$comment->thetime.'</span><br/><span class="small light">Rating:</span> '.$comment->rating;
		$total_rating += $comment->rating;
		echo '</div><br/>';
	}
	
	$total_rating = $total_rating / $count;
} else {
	echo 'No comments';
}

?>
<div><?php 
if(isset($total_rating))
echo '<span class="small light">Overall rating:</span> <span class="heavy">'.round($total_rating, 2).'</span>';?>
</div>
</fieldset>
<br/><br/>
<div id="comment-form-display">
<form id="comment-form" name="comment-form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'display/comment/'.$book->book_id; ?>">
<input type="text" id="commenter" name="commenter" placeholder="Name" title="Name" required />
<br/><textarea rows="6" cols="50" name="content" id="content" placeholder="Enter your comment here..." title="Enter your comment here..." required></textarea>
<br/>
<input class="star" type="radio" name="rating" value="1.0"/>
<input class="star" type="radio" name="rating" value="2.0"/>
<input class="star" type="radio" name="rating" value="3.0"/>
<input class="star" type="radio" name="rating" value="4.0"/>
<input class="star" type="radio" name="rating" value="5.0"/>
<br/>

<br/>

<input id="demo" class="uiButton" type="submit" id="comment" name="comment" value="Comment" />
</form>
</div>

<script type="text/javascript">
$(function() {
	$("#demo").buttonCaptcha({
		codeWord:'human',
		codeZone:''
	});
});
</script>


</div>
<!-- CONTENT ENDS HERE -->
<!-- FOOTER START -->
<div id="footer"><span class="light">&copy; 2011 Online Book Store. All rights reserved.</span></div>
</div>
<!-- FOOTER ENDS -->
</body>
</html>