<?include('head.php');?>
	<?if(wire('user')->isLoggedIn()):?>
		<a class="edit" target="_blank" href="<?=$config->urls->admin?>page/edit/?id=<?=$page->id?>">Edit</a>
	<?endif?>

	<div class="page <?=$page->template->name?>">
		<div class="content">
			<h1><?=$page->title?></h1>
			<?if(count($page->images)>0):?>
				<?
					$thumb = $page->images->first()->width(2880, array('upscaling'=>false, 'cropping'=>false));
				?>
				<div class="image">
					<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
					<div class="caption"><?=$thumb->description?></div>
				</div>
			<?endif?>
		</div>
		<div class="overviewtext content"><?=$page->overviewtext?></div>
		<div class="body content"><?=$page->body?></div>

	</div>
<?include('foot.php');?>
