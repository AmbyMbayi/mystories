

<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small> <br>
<div class="col-md-8 col-md-offset-2">
<div class="post-body">
	<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
	<br><br>
	<?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
	<hr>
		<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
		<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">

	</form>
<?php endif; ?>

<hr>
<h3>Comments</h3>

<?php if(isset($comments)) :
	 foreach($comments as $comment) : ?>
		<div class="well well-sm" >
			<h5><?php echo $comment['body']; ?> by <strong><?php echo $comment['name']; ?></strong></h5>
	    </div>
	<?php endforeach; ?>
<?php else : ?>

   	<p>No comment</p> 

<?php endif; ?>


<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>

<?php echo form_open('comments/create/' . $post['id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<br>
	<button class="btn btn-primary" type="submit">Submit</button>

</div>


     