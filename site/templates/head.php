<?include_once('./util.php')?>
<?if(!$page->contentonly):?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<?=$pages->get('/settings')->includes?>
		<?/*?><link rel="stylesheet" type="text/css" href="<?=AIOM::CSS('styles/main.less')?>"><?*/?>
		<link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>css/main.css">
		<style>
			<?
				$scss = new scssc();
			?>
			<?=$scss->compile($pages->get('/settings')->css);?>
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="<?=$config->urls->templates?>js/main.js"></script>
	</head>
	<body>
		<div class="container">
			<?
				$header = $pages->get('/header');
				if(!$header instanceof NullPage){
					echo '<header>';
					$header->contentonly=true;
					echo $header->render();
					echo '</header>';
				}
			?>
			<div class="nav">
				<div class="visible">
					<?if($pages->get('/')->inmenu):?>
						<a class="home" href="<?=$pages->get('/')->url?>">
							<?=$pages->get('/')->title?>
						</a>
					<?endif?>
					<a class="expand" href="#expand">
						<?=$pages->get('/settings/menu')->title?>
					</a>
					<?if(count($languages)>1):?>
						<span class="languages">
							<?
								$savedLanguage = $user->language;
							?>
							<?foreach($languages as $l):?>
								<?
										$user->language  = $l;
								?>
								<a href="<?=$page->url?>" class="<?=$l->id==$savedLanguage->id?'active':''?> language"><?=$l->title?></a>
							<?endforeach?>
							<?
								$user->language = $savedLanguage;
							?>
						</span>
					<?endif?>
				</div>
				<ul class="expand-content">
					<div class="close"><?=$pages->get('/settings/close')->title?></div>
					<?
						visit(
						    $pages->get('/'),
						    function(Page $p, $page) {
						    	if($p->inmenu) {
						    		$active = $page->id==$p->id?'active':'';
						    		echo '<li><a class="'. $active .'" href="' . $p->url . '">' . $p->title . '</a>';
						    	}


						        if ($p->numChildren > 0) {
						            echo '<ul>';
						        }
						    },
						    function(Page $p, $page) {
						        echo '</li>';
						        if ($p->numChildren > 0) {
						            echo '</ul>';
						        }
						    },
						    $page
						);
					?>
					<?
						$menu_footer = $pages->get('/menu-footer');
						if(!$menu_footer instanceof NullPage){
							echo '<li class="menu-footer">';
							$menu_footer->contentonly=true;
							echo $menu_footer->body;
							echo '</li>';
						}
					?>

				</ul>
			</div>

<?endif?>
