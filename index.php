<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<ul>
		  <li><a href="">Home</a></li>
		  <li><a href="displaydata.php">E-Library</a></li>
		  <li><a href="https://www.amazon.fr/" target="_blank">Visit Amazon!</a></li>
		</ul>
		<div class="form-style-6">
			<h1>E-Library  </h1>
				<form method="POST" action="connection.php" enctype="multipart/form-data" onsubmit="return validate(this)">
					<input type="text" id="name" name="bookname" placeholder="Book Name*" required/>
					<textarea cols="25" rows="4" name="bookdescription" placeholder="Book Description*" required></textarea>
					<input type="text" id="password" name="bookauthor" placeholder="Book Author*"/ required>
					<select name="booklanguage" required>
						  <option selected disabled>Select Book Language*</option>
						  <option value="English">English</option>
						  <option value="Arabic">Arabic</option>
						  <option value="German">German</option>
						  <option value="French">French</option>
						  <option value="Other">Other Language</option>
					</select>
					<div style="padding-bottom: 6px"><label>Select Book* (Only Pdf, Doc & Docx files are allowed)</label></div>
					<input type="file" value="bookfile"  required/>
					<input type="text" id="name" name="uploadername" placeholder="Uploaders Name*" required/>
					<input type="email" id="name" name="uploaderemail" placeholder="Uploaders Email*" required/>
					<input type="submit" value="send">
			</form>
		</div>
	</body>
</html>
 <script>
    function validate() {
    var val = document.getElementById('bookfile').value.toLowerCase();
    var regex = new RegExp("(.*?)\.(docx|doc|pdf)$");
        if(!(regex.test(val))) {
            document.getElementById('bookfile').value = '';
            alert('Please select correct file format.');
            return false;   
        }
		return true;
		}
</script>

