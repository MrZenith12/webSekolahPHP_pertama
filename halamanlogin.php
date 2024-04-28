 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="stylelogin.css">
 	<title>Halaman Login</title>
 </head>
 <body>
    <header>
 	<div class="container">
      <div class="login">
       	<form action="login.php" method="post" name="form_input">
            <h1>LOGIN</h1>
            <hr>
       		<div class="user">
       		 Username  <input type="text" name="username" placeholder="Masukkan username" required = "" autocomplete="off">
       		</div>
       		<div class="pass">
       		 Password  <br><input type="password" name="password" placeholder="Masukkan password" required = "" autocomplete="off">
       		</div>

       		<div class="tombol">
       		 <input type="submit" name="input" value="LOGIN">
       		</div>
       	</form>
      </div>
 	</div>
 </header>
 </body>
 </html>