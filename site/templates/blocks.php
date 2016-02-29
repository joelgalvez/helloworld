<?include('head.php');?>
	<?foreach($page->children('inoverview=1') as $child):?>
		<?
			$child->contentonly = 1;
		?>
		<div class="block">
			<div class="content">
				<h1><?=$child->title?></h1>
				<?if(count($child->images)>0):?>
					<?
						$thumb = $child->images->first()->width(2880, array('upscaling'=>false, 'cropping'=>false));
					?>
					<div class="image">
						<img src="<?=$thumb->url?>" alt="<?=$image->description?>">
						<div class="caption"><?=$thumb->description?></div>
					</div>
				<?endif?>

				<div class="overviewtext content"><?=$child->overviewtext?></div>

			</div>
			<?if($child->template->name=='article'):?>

			<?else:?>
				<?=$child->render()?>
			<?endif?>
		</div>
	<?endforeach?>
<?include('foot.php');?>
