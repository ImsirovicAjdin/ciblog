<h2><?= $title; ?></h2>
<ul class="list-group">
<?php foreach ($categories as $category) : ?>
	<li class="list-group-item">
		<a href="<?php echo site_url('/categories/posts/'.$category['id']);	?>">
			<?php echo $category['name']; ?>
		</a>
		<?php if($this->session->userdata('user_id') == $category['user_id']): ?>
			DELETE
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>

<!--
We want to see if the current category item user ID matches the logged in user now we did this in our post,
 if we go to the post view and view dot php right here, this is the logic that we need:

 <?php // if($this->session->userdata('user_id')) == $post['user_id']): ?>

 We just wanna change this to category ID user ID. So let's test it out, let's just say delete if
 the user has the correct ID.
-->



