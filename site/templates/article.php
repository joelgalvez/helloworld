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
					<img src="<?=$thumb->url?>" alt="<?=$image->description?>">
					<div class="caption"><?=$image->description?>
				</div>
			<?endif?>
			<div class="overviewtext"><?=$page->overviewtext?></div>
			<div class="body"><?=$page->body?></div>
		</div>

	</div>
<?include('foot.php');?>
