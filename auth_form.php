<?php
echo 'Авторизуйтесь, чтобы иметь полный доступ к личному кабинету';
echo '
    <div class="row">
        <div class="col-lg-8 mb-5" >
        <form action="#" method="post">
            <div class="form-group row">
            <div class="col-md-12">
                <input type="text" name = "email" class="form-control" placeholder="Email">
            </div>
            </div>

            <div class="form-group row">
            <div class="col-md-12">
                <input type = "password" name="password" id="" class="form-control" placeholder="Пароль"></input>
            </div>
            </div>
            <div class="form-group row">
            <div class="col-md-6 mr-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Авторизоваться">
            </div>
            </div>
            <p class="if_no_acc">Нет аккаунта? <a href="regist.php">Зарегистрироваться</a></p><br>
        </form>
        </div>
    </div>
    '
?>