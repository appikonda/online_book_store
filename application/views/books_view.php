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
Add Book
</h3>
<!-- CONTENT TITLE END -->
</div>
<!-- START NAVIGATION -->
<div id="top-nav">
<span id="auth-box">
<a class="command" href="/obs/login/logout">Logout</a>
</span>
<ul>
<li><a href="/obs/books/add">Add</a></li>
<li><a href="/obs/books/edit">Edit</a></li>
</ul>
</div>
<!-- END OF NAVIGATION -->
<!-- CONTENT GOES HERE -->
<div id="content">
<?php
if(isset($msg))
echo $msg;?>
<form></form>

</div>
<!-- CONTENT ENDS HERE -->
<!-- FOOTER START -->
<div id="footer"><span class="light">&copy; 2011 Online Book Store. All rights reserved.</span></div>
</div>
<!-- FOOTER ENDS -->
</body>
</html>