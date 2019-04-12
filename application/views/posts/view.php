<pre>
<?php //print_r($post);die; ?>
<?php //var_dump($post);die; ?>
</pre>
<h2><?php echo $post['title']; ?></h2>

<small class="badge badge-primary d-inline-block">Posted on: <?php echo $post['created_at'];
	?></small><br>
<div class="d-block p-2">
	<?= $post['body']; ?>
</div>

<hr>
<?php echo form_open('/posts/delete'.$post['id']); ?> <!-- this post will submit to /posts/delete/
 c/a -->
	<input type="submit" value="delete" class="btn btn-danger">
</form>



