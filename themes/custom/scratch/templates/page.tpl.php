<div class = "black-header">
	<div class = "scratch-user-menu">
		<?php if($logged_in): ?>
		   <?php print render($page["user_menu"]); ?>
	    <?php else: ?>
	       <ul>
	          <li class = "menu"><a href = "<?php base_path(); ?>user/login">Log In</a></li>
	       </ul>
		<?php endif ;?>
	</div>
</div>

<?php print render($page["content"]); ?>