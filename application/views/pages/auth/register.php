<main class="d-flex align-items-center h-100">
    <form class="form-signin" method="post" action="">
        <div class="text-center">
            <i class="fa fa-user-plus" aria-hidden="true" style="font-size: 4em"></i>
        </div>
        <div class="form-group">
            <label for="name">Full name</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="name" value="<?php echo value('name') ?>">
            <?php echo error('name') ?>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="<?php echo value('email') ?>">
            <?php echo error('email') ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
            <?php echo error('password') ?>
        </div>
        <div class="form-group">
            <label for="password_confirm">Confirm password</label>
            <input type="password" name="password_confirm" class="form-control" id="password_confirm" aria-describedby="password_confirm">
            <?php echo error('password_confirm') ?>
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Submit
            </button>
            <p class="mt-3">
                <a href="<?= site_url('auth/login') ?>" class="btn btn-link">Login</a>
                <a href="<?= site_url('/') ?>" class="btn btn-link">Home</a>
            </p>
        </div>
    </form>
</main>
