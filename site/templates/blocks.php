<?include_once('head.php');?>
	<?foreach($page->children('inoverview=1') as $child):?>
		<div class="block">
			<?if($child->template->name=='article'):?>
				<div class="page <?=$child->template->name?>">
					<div class="leadtext"><?=$child->leadtext?></div>
				</div>
			<?else:?>
				<?=$child->render()?>
			<?endif?>
		</div>
	<?endforeach?>
<?include_once('foot.php');?>