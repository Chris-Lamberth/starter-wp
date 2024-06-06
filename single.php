<?php get_template_part('components/header'); ?>

<body>
	<header>
		<div class="container">
			<h1><?php bloginfo('name'); ?></h1>
			<p><?php bloginfo('description'); ?></p>
			<?php get_template_part('components/nav'); ?>
		</div>
	</header>
	<main>
		<div class="container">
			<?php 
				the_title('<h2>', '</h2>');			
				the_content(); 
			?>
		</div>
	</main>
	<?php get_template_part('components/footer'); ?>
</body>

</html>