<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="<?php echo $post['title']; ?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" placeholder="Add Body" name="body"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
