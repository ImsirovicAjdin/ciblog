<h2><?= $title ?></h2>
<?php echo form_open('posts/create'); ?>
<form>
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" aria-describedby="emailHelp"
			   placeholder="Add title" name="title">
		<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" placeholder="Add Body" name="body"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
