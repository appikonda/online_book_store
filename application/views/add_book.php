<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="http://localhost/obs/style.css" />
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
Add Book
</h3>
<!-- CONTENT TITLE END -->
</div>
<!-- START NAVIGATION -->
<div id="top-nav">
<span id="auth-box">
<a class="command" href="http://localhost/obs/login/logout">Logout</a>
</span>
<ul>
<li><a href="http://localhost/obs/books/add">Add</a></li>
<li><a href="http://localhost/obs/books/edit">Edit</a></li>
</ul>
</div>
<!-- END OF NAVIGATION -->
<!-- CONTENT GOES HERE -->
<div id="content">

<form id="add-book" name="add-book" method="post" enctype="multipart/form-data" action="http://localhost/obs/books/verify_info">
<label for="author">Author:</label>
<input type="text" id="author" name="author" placeholder="Author's Name" />

<label for="title">Title:</label>
<input type="text" id="title" name="title" placeholder="Book Title" />

<label for="price">Price:</label>
<input type="text" id="price" name="price" placeholder="Book Price" />

<label for="display-pic">Display Picture:</label>
<input type="file" name="display-pic" id="display-pic" title="Display Picture" />

<label for="category">Category:</label>
<input type="text" id="category" name="category" placeholder="Category" />

<label for="isbn">ISBN (13):</label>
<input type="text" id="isbn" name="isbn" placeholder="ISBN" />

<label for="qty">Quantity:</label>
<input type="text" id="qty" name="qty" placeholder="Quantity" />


<br/>
<input type="submit" class="uiButton" id="add" name="add" value="Add" />

</form>

</div>
<!-- CONTENT ENDS HERE -->
<!-- FOOTER START -->
<div id="footer"><span class="light">&copy; 2011 Online Book Store. All rights reserved.</span></div>
</div>
<!-- FOOTER ENDS -->
</body>
</html>