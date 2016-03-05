
      <form class="form-signin" role="form" method="post" action="<?php echo Yii::app()->createUrl('wm_admin/login'); ?>">
        <h2 class="form-signin-heading">Авторизация</h2>
        <input type="text" class="form-control" placeholder="Логин" required autofocus name="enter[username]">
        <input type="password" class="form-control" placeholder="Пароль" required name="enter[password]">
        <label class="checkbox">
       <!--   <input type="checkbox" value="remember-me"> Запомнить -->
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
      </form>

