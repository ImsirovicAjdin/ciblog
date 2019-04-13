<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>

	<div class="row">
		<div class="col-md-3">
			<!-- FIRST VERSION, LARGE IMAGES BREAK THE LAYOUT
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
			-->
			<!-- SECOND VERSION, LARGE IMAGES ARE CONTAINED WITH THE BOOTSTRAP IMAGE CLASS -->
			<img class="img-fluid" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'];
			?>">
		</div>
		<div class="col-md-9">
			<small class="badge badge-primary d-inline-block">
				Posted on: <?php echo $post['created_at']; ?>
				in <strong><?php echo $post['name']; ?></strong>
			</small><br>
			<?php echo word_limiter($post['body'], 60); ?>
			<p><a class="btn btn-success" href="<?= site_url('/posts/'.$post['slug']) ; ?>">Read
					More</a></p>
		</div>
	</div>


<?php endforeach; ?>
