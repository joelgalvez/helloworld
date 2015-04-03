<?include('head.php');?>
	<?foreach($page->children('inoverview=1') as $child):?>
		<?
			$child->contentonly = 1;
		?>
		<div class="block">
			<div class="leadtext content">
				<?=$child->leadtext?>
			</div>

			<?if($child->template->name=='article'):?>
				<div class="page <?=$child->template->name?>">
						<?if($child->getUnformatted('body')):?>
							<div class="readmore">
								<a href="<?=$child->url?>"><?=$child->readmore?$child->readmore:'Read more'?></a>
							</div>
						<?endif?>
				</div>
					
			<?else:?>
				<?=$child->render()?>
			<?endif?>
		</div>
	<?endforeach?>
<?include('foot.php');?>