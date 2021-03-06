<html>
	<head>
		<title>ciBlog</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css">

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>

		<style>
			.pagination-links {
				margin:30px 0;
			}

			.pagination-links strong{
				padding: 8px 13px;
				margin:5px;
				background: #f4f4f4;
				border: 1px #ccc solid;
			}

			a.pagination-link{
				padding: 8px 13px;
				margin:5px;
				background: #f4f4f4;
				border: 1px #ccc solid;
			}

			.cat-delete{
				display:inline;
			}
		</style>
	</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?= base_url(); ?>">ciBlog</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<?php if(!$this->session->userdata('logged_in')) : ?>
				<li class="nav-item ml-auto">
					<a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
				</li>
				<li class="nav-item ml-auto">
					<a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
				</li>
			<?php endif; ?>
			<?php if($this->session->userdata('logged_in')) : ?>
				<li class="nav-item ml-auto">
					<a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create
						Post</a>
				</li>
				<li class="nav-item ml-auto">
					<a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create
						Category</a>
				</li>
				<li class="nav-item ml-auto">
					<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>

<div class="container">

	<?php if($this->session->flashdata('user_registered')) : ?><!-- if flashdata user_registered is found: -->
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_created')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_updated')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_created')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_deleted')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_failed')) : ?>
		<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedin')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedout')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>' ; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_deleted')) : ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>' ; ?>
	<?php endif; ?>
