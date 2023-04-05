<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="login-box">
        <form method="POST" action="/Login_Proses">
            @csrf
            <h1>Login</h1>
            <form>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password">
                <button type="submit">Login</button>
            </form>
        </form>
    </div>
  </body>
</html>
