<html>
	<head>
		<title>ciBlog</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css">

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?= base_url(); ?>">ciBlog</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/ciblog/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/ciblog/about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/ciblog/posts">Blog</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ml-auto">
						<a class="nav-link" href="http://localhost/ciblog/posts/create">Create
							Post</a>
					</li>
				</ul>
			</div>
		</nav>
	</head>
<body>

<div class="container">
