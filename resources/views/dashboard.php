<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container vh-100" style="margin-top: 20px;">
        <div class="row justify-content-center">
            <div class="card w-100 my-auto shadow border-0">

                <div class="card-header text-center bg-dark text-white py-3">
                    <h3>U S E R S</h3>
                </div>
                <div class="card-body">
                    
                    <table id="dataTable" width="100%">

                        <thead id="thead">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id;
                            $username;
                            $password;
                            if (!empty($id)) {
                                for ($x = 0; $x < count($id); $x++) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $id[$x]->id; ?></td>
                                        <td class="text-center"><?php echo $username[$x]->username; ?></td>
                                        <td class="text-center"><?php echo $password[$x]->password; ?></td>
                                        <td class="text-right">
                                            <form action="edit" method="post">
                                                <input type="hidden" name="edit_id" value="<?php echo $id[$x]->id; ?>">
                                                <button type="submit" name="btn_edit" class="btn btn-success">EDIT</button>
                                            </form>
                                        </td>
                                        <td class="text-left">
                                            <form action="delete" method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $id[$x]->id; ?>">
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>

                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No record found.";
                            }
                            ?>
                        </tbody>
                    </table>
                    <tr>
                    <form action="create" method="post">
                    
                        <div class="form-group text-center">
                            <input type="submit" name="create" class="btn btn-dark" value="Create New User">
                            <a href="login" class="btn btn-dark">Logout</a>
                        </div>
                    </form>
                    </tr>

                </div>


            </div>
        </div>
    </div>
</body>

</html>