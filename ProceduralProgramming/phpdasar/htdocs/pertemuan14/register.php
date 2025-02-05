<?php require_once 'model.php' ?>
<?php require_once 'controller.php' ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <header class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-bold mt-2">Register</h1>
    </header>
    <main class="d-flex flex-column align-items-center justify-content-center">
        <div class="card rounded-lg shadow-lg" style="width: 500px;">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" autofocus autocomplete="off" placeholder="First name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" autocomplete="off" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" autocomplete="off" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="invalidCheck" name="checkbox" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-block m-auto" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>

        <!--  Register Modal  -->
        <?php if (isset($_POST['register'], $_POST['checkbox'])): ?>
            <div class="modal fade" id="registerModal" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerModalLabel">Pemberitahuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <?php try { ?>
                                <?php if (register($_POST) > 0): ?>
                                    <h5 class="text-success">Berhasil melakukan register! Silakan login terlebih dahulu!</h5>
                                <?php else: ?>
                                    <h5>Gagal melakukan register!</h5>
                                    <h5 class="text-danger">Error! <?= mysqli_error($link) ?></h5>
                                <?php endif ?>
                            <?php } catch (\RuntimeException $exception) { ?>
                                <h5>Gagal melakukan register!</h5>
                                <h5 class="text-danger">Exception! <?= $exception->getMessage() ?></h5>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <a href="register.php" class="btn btn-secondary">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </main>
    <footer>
        <p class="text-center mt-2">Copyright &copy; 2020. Adam Arthur Faizal</p>
    </footer>
</div>
<script src="../jquery-3.5.1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="../bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#registerModal').modal('show')
    })
</script>
</body>
</html>