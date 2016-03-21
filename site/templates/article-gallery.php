<?include('head.php');?>
	<?if(wire('user')->isLoggedIn()):?>
		<a class="edit" target="_blank" href="<?=$config->urls->admin?>page/edit/?id=<?=$page->id?>">Edit</a>
	<?endif?>
	<?
		$factor = 200;
	?>
	<div class="<?=$page->template->name?>">
		<?foreach($page->images as $image):?>
			<a target="_blank" href="<?=$image->url?>"></a>
				<figure>
					<?
						$thumb = $image->size(600,600,array('upscaling'=>false, 'cropping'=>false));
					?>
					<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
					<figcaption>
						<?=$thumb->description?>
					</figcaption>
				</figure>
			</a>
		<?endforeach?>
	</div>
<?include('foot.php');?>
