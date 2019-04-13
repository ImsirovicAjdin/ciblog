<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea id="editor" class="form-control" placeholder="Add Body" name="body"></textarea>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>Upload image </label>
		<!-- <input type="file" name="postimage" size="20"> -->
		<input type="file" name="userfile" size="20"> <!-- IT MUST BE 'userfile', OTHERWISE IT WON'T WORK! -->
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
