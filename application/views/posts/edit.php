<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
	<div class="form-group">
		<label>Title</label>
		<input name="title" type="text" class="form-control" placeholder="<?php echo $post['title']; ?>"
			   value="<?php echo $post['title']; ?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control" placeholder="<?php echo $post['body']; ?>">
			<?php echo $post['body']; ?>
		</textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
