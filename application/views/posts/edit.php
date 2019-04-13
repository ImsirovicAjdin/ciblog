<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
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
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
				<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
