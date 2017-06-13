<?php
    if (!is_admin())
        header("Location: index.php?id=home");
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'del':
                crud_delete($_GET['idd']);
                append_error('Deleted that user!', 'success');
                break;
            case 'add':
                crud_create($_POST['user'],$_POST['pass'],$_POST['role']);
                append_error('Created user '.$_POST['user'], 'success');
                break;
        }
        header("Location: index.php?id=admin");
        append_error('Created user ', 'success');
    }
?>
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Admin page!</h1>
        <p>Hier kan je alleen als admin bij komen.</p>
    </div>
</div>
<div class="container">
    <?php echo_errors();?>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Pass (hash)</th>
                <th>Role</th>
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = 'SELECT * FROM users ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
                ?>
            <tr>
                <th scope="row"><?php echo $row['Id']; ?></th>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td>@<?php echo $row['Role']; ?></td>
                <td>
                    <a class="btn btn-primary ml-sm-2" href="?id=admin&action=del&idd=<?php echo $row['Id']; ?>" role="button">Del</a>
                    <a class="btn btn-primary ml-sm-2" href="/admin/edit_user.php?id=<?=$row['Id']?>" role="button">Edit</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row"><h5>Add user:</h5></div>
    <div class="row">
        <form class="form-inline" method="post" action="?id=admin&action=add">
            <input type="text" class="form-control mr-sm-2" placeholder="Email.." name="user">
            <input type="text" class="form-control mr-sm-2" placeholder="Pass.." name="pass">
            <select name="role" class="custom-select mr-sm-2">
                <option selected>Role</option>
                <option value="1">User</option>
                <option value="2">Company</option>
                <option value="3">Admin</option>
            </select>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>