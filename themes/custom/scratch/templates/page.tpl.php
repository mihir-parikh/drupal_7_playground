<div class = "black-header">
	<div class = "scratch-user-menu">
		<?php if($logged_in): ?>
		   <!-- This statement will print user_menu region and render the assigned 
		        content/block to it -->
		   <?php print render($page["user_menu"]); ?>
	    <?php else: ?>
	       <ul>
	          <li class = "menu"><a href = "<?php base_path(); ?>user/login">Log In</a></li>
	       </ul>
		<?php endif ;?>
	</div>
</div>
<div class = "scratch-header clearfix">
	<div class = "logo-div">
		<?php if($logo): ?>
		   <a href = "<?php print $front_page; ?>" title = "Home" rel = "home" id = "logo">
		      <img src = "<?php print $logo; ?>" alt = "Home" />
		   </a>
		<?php endif; ?>
	</div>
	<div class = "scratch-main-menu">
		<?php print render($page["main_menu"]); ?>
	</div>
</div>

<?php print render($page["content"]); ?>