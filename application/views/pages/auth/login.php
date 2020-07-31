<main class="d-flex align-items-center h-100">
    <form class="form-signin" method="post" action="<?php echo site_url('auth/login') . '?name=Bau' ?>">
        <div class="text-center">
            <i class="fa fa-lock" aria-hidden="true" style="font-size: 4em"></i>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Submit</button>
        </div>
    </form>
</main>
