<div class="card my-2">
    <div class="card-body">
        <div class="profile d-flex">
            <img class="rounded-circle" width="50" height="50"
                 src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.0-1/p200x200/97787057_612037019396005_7516687320599232512_o.jpg?_nc_cat=101&_nc_sid=7206a8&_nc_ohc=BeW1FmIOOgwAX-xjFDt&_nc_ht=scontent.fsgn2-4.fna&_nc_tp=6&oh=fb3bd92dbd783bca3a52892b945cdeb0&oe=5F4661CD">
            <div class="ml-2">
                <h6 class="mb-0"><?= $post['user_name'] ?></h6>
                <p class="small"><?= datetime_to_timestamp($post['created_at']) ?></p>
            </div>
        </div>
        <div class="content"><?= $post['content'] ?></div>
        <div class="more">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?= $post['likes'] ?>
            <i class="fa fa-commenting-o ml-2" aria-hidden="true"></i> <?= $post['comments'] ?>
        </div>
    </div>
</div>
