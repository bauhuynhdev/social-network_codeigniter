<main class="d-flex align-items-center h-100">
    <form class="form-signin" method="post" action="">
        <div class="text-center">
            <i class="fa fa-user-secret" aria-hidden="true" style="font-size: 4em"></i>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="<?php
            echo value('email') ?>">
            <?php
            echo error('email') ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
            <?php
            echo error('password') ?>
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Submit
            </button>
            <p class="mt-3">
                <a href="<?= site_url('auth/register') ?>" class="btn btn-link">Register</a>
                <a href="<?= site_url('/') ?>" class="btn btn-link">Home</a>
            </p>
        </div>
    </form>
</main>
