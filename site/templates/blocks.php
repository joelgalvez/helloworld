<?include('head.php');?>
	<?foreach($page->children('inoverview=1') as $child):?>
		<?
			$child->contentonly = 1;
		?>
		<div class="block">
			<div class="content">
				<div class="leadtext">
					<?=$child->leadtext?>
				</div>
				<?if($child->getUnformatted('body')):?>
					<div class="readmore">
						<a href="<?=$child->url?>"><?=$child->readmore?$child->readmore:'Read more'?></a>
					</div>
				<?endif?>
			</div>

			<?if($child->template->name=='article'):?>
				<div class="page <?=$child->template->name?>">
				</div>
					
			<?else:?>
				<?=$child->render()?>
			<?endif?>
		</div>
	<?endforeach?>
<?include('foot.php');?>