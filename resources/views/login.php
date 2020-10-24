<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-50 my-auto shadow">
                <!-- card header -->
                <div class="card-header text-center bg-dark text-white">
                    <h2>W E L C O M E</h2>
                </div>
                <!-- card body -->

                <div class="card-body">
                    <form action="validate" method="post">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-dark w-100" value="Login">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>