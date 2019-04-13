<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea id="editor" class="form-control" placeholder="Add Body" name="body"></textarea>
	</div>
	<!--
		(3) We'll add another form group for the 'categories' dropdown
	-->
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
			<!-- 3a:
			 		for the option text, we'll use category name,
			 		for the option value, we'll have the category id
			 -->
			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
