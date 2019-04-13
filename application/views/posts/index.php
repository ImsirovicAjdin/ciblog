<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<small class="badge badge-primary d-inline-block">Posted on: <?php echo $post['created_at'];
	?></small><br>
	<!-- since we have enabled 'text' autoloader helper, we have access to function named word_limiter() so we
    can truncate our post previews, it takes the body as the first argument, and the next arg is the amount
     of words that we want -->
	<?php echo word_limiter($post['body'], 60); ?>
	<p><a class="btn btn-success" href="<?= site_url('/posts/'.$post['slug']) ; ?>">Read
			More</a></p>
<?php endforeach; ?>
