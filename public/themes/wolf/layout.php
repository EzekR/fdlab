<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">

<head>
	<title><?php echo $this->title(); ?></title>

  <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="description" content="<?php echo ($this->description() != '') ? $this->description() : 'Default description goes here'; ?>" />
  <meta name="keywords" content="<?php echo ($this->keywords() != '') ? $this->keywords() : 'default, keywords, here'; ?>" />
  <meta name="author" content="Author Name" />

  <link rel="favourites icon" href="<?php echo THEMES_PATH; ?>simple/images/favicon.ico" />

  <!-- Adapted from Matthew James Taylor's "Holy Grail 3 column liquid-layout" = http://bit.ly/ejfjq -->
  <!-- No snippets used; but snippet blocks for header, secondary nav, and footer are indicated -->

  <link rel="stylesheet" href="<?php echo THEMES_PATH; ?>wolf/screen.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="<?php echo THEMES_PATH; ?>wolf/print.css" media="print" type="text/css" />
  <link rel="alternate" type="application/rss+xml" title="Wolf Default RSS Feed" href="<?php echo URL_PUBLIC.((USE_MOD_REWRITE)?'':'/?'); ?>rss.xml" />
</head>
<body >
<div class="container">

<!-- HEADER - COULD BE SNIPPET / START -->
<div id="header">
	<h1><a href="<?php echo URL_PUBLIC; ?>">fdlab</a><span class="tagline">有什么影响</span></h1>
</div><!-- / #header -->
<div id="nav">
	<ul>
      <li><a<?php echo url_match('/') ? ' class="current"': ''; ?> href="<?php echo URL_PUBLIC; ?>">Home</a></li>
<?php foreach($this->find('/')->children() as $menu): ?>
      <li><?php echo $menu->link($menu->title, (in_array($menu->slug, explode('/', $this->path())) ? ' class="current"': null)); ?></li>
<?php endforeach; ?> 
	</ul>
</div><!-- / #nav -->
<!-- HEADER / END -->

<div id="colmask"><div id="colmid"><div id="colright"><!-- = outer nested divs -->

	<div id="col1wrap"><div id="col1pad"><!-- = inner/col1 nested divs -->

		<div id="col1">
		<!-- Column 1 start = main content -->

<h2><?php echo $this->title(); ?></h2>

  <?php echo $this->content(); ?> 
  <?php if ($this->hasContent('extended')) echo $this->content('extended'); ?> 

		<!-- Column 1 end -->
		</div><!-- / #col1 -->
	
	<!-- end inner/col1 nested divs -->
	</div><!-- / #col1pad --></div><!-- / #col1wrap -->

		<div id="col2">
		<!-- Column 2 start = left/running sidebar -->

  <?php echo $this->content('sidebar', true); ?> 

		<!-- Column 2 end -->
		</div><!-- / #col2 -->

		<div id="col3">
		<!-- Column 3 start = right/secondary nav sidebar -->

<!-- THIS CONDITIONAL NAVIGATION COULD GO INTO A SNIPPET / START -->
<?php if ($this->level() > 0) { $slugs = explode('/', CURRENT_PATH); $parent = reset($slugs); $topPage = $this->find($parent); } ?>
<?php if(isset($topPage) && $topPage != '' && $topPage != null) : ?>

<?php if ($this->level() > 0) : ?>
<?php if (count($topPage->children()) > 0 && $topPage->slug() != 'articles') : ?>
<h2><?php echo $topPage->title(); ?> Menu</h2>
<ul>
<?php foreach ($topPage->children() as $subPage): ?>
    <li><?php echo $subPage->link($subPage->title, (url_start_with($subPage->path()) ? ' class="current"': null)); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<!-- CONDITIONAL NAVIGATION / END -->

		<!-- Column 3 end -->
		</div><!-- / #col3 -->

<!-- end outer nested divs -->
</div><!-- / #colright --></div><!-- /colmid # --></div><!-- / #colmask -->

<!-- FOOTER - COULD BE SNIPPET / START -->
<div id="footer">

  <div class="row">
  <p>版权所有：高谦课题组&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp联系地址：上海市徐汇区医学院路138号治道楼11楼&nbsp&nbsp&nbsp&nbsp&nbsp邮编：200032</p>
 <p>电话：021-xxxxxxx&nbsp&nbsp&nbsp&nbsp&nbsp邮箱：foo@foolab.com</p>
</div>
</div><!-- / #footer -->
<!-- FOOTER / END -->
</div>
</body>
</html>