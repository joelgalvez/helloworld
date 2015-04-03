<?include('head.php');?>
	<?if(wire('user')->isLoggedIn()):?>
		<a class="edit" target="_blank" href="<?=$config->urls->admin?>page/edit/?id=<?=$page->id?>">Edit<br><div class="explain">Don't worry, only you can see this link.</div> </a>
	<?endif?>

	<div class="page <?=$page->template->name?>">
		<!-- <h1><?=$page->title?></h1> -->
		<!-- <div class="leadtext content"><?=$page->leadtext?></div> -->
		<div class="body content"><?=$page->body?></div>
	</div>
<?include('foot.php');?>