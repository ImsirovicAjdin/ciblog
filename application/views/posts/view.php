<h2><?php echo $post['title']; ?></h2>

<small class="badge badge-primary d-inline-block">Posted on: <?php echo $post['created_at'];
	?></small><br>
<div class="d-block p-2">
	<?= $post['body']; ?>
</div>

<hr>
<img class="img-fluid" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'];
?>">
<?php echo form_open('/posts/delete/'.$post['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger d-inline">
</form>
<a class="btn btn-warning" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>

<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="card card-body bg-light mt-2 mb-2">
		<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>


<?php endif; ?>


<hr>
<h3>Add Comment</h3>
<!-- (2) form validation output
<?php echo validation_errors(); ?>

<!-- (1)
When this form is submitted, it's gonna go to the comments controller, on method called create(), and
an id is gonna get passed as parameter
So let's also make the controller: Comments.php
-->
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?> ">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
