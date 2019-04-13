<?php echo form_open('users/login'); ?>
	<div class="row mt-5" style="max-width: 500px; margin: 0 auto;">
		<div class="col-12">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username" required
					   autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password"
					   required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>
