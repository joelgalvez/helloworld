<?include('head.php');?>
	
	<div class="<?=$page->template->name?>">
		<div class="content">
			<?
				echo tree($page);
			?>
		</div>
	</div>
<?include('foot.php');?>

<?function tree($p, $level=1) {?>
	<?
		$cnt = 1;
	?>
	<?foreach($p->children('template=article') as $c):?>
		<ul class="level-<?=$level?>">
			<li>
				<?
					$id = 'cb-' . $level . '-' . $cnt++;
				?>
				<input checked type="checkbox" id="<?=$id?>">
				<label for="<?=$id?>">
				  <h3><?=$c->title?></h3>
				</label>
				<div class="overviewtext">
					<?=$c->overviewtext?>
				</div>
				<?if($c->getUnformatted('body')!=''):?>
					<div class="body">
						<?=$c->body?>
					</div>
				<?endif?>
				<?tree($c,++$level)?>
			</li>
		</ul>
		<?endforeach?>
<?}?>