<?php
	$custom_color = [
		[
			'title'     => 'Background Color', 
			'default'   => '#fff',
			'element'   => 'body',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'Navbar Background Color', 
			'default'   => '#f8f8f8',
			'element'   => '.navbar-default',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'Navbar Text Color', 
			'default'   => '#777',
			'element'   => '.navbar-default .navbar-nav>li>a',
			'attribute' => 'color',
		],
		[
			'title'     => 'Product Title Background Color', 
			'default'   => '#f5f5f5',
			'element'   => '.product .panel-default>.panel-heading',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'Product Title Text Color', 
			'default'   => '#333',
			'element'   => '.product .panel-default>.panel-heading',
			'attribute' => 'color',
		],
		[
			'title'     => 'Product Price Text Color', 
			'default'   => '#d14233',
			'element'   => '.product a .panel .product-price',
			'attribute' => 'color',
		],
		[
			'title'     => 'Breadcrumbs Background Color', 
			'default'   => '#f5f5f5',
			'element'   => '.breadcrumb',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'Breadcrumbs Text Color', 
			'default'   => '#337ab7',
			'element'   => '.breadcrumb a',
			'attribute' => 'color',
		],
		[
			'title'     => 'SideBar Menu Parent Background Color', 
			'default'   => '#ededed',
			'element'   => '#sidebar-menus #menu-sidebarmenu .accordion .accordion-heading',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'SideBar Menu Parent Hover Background Color', 
			'default'   => '#ddd',
			'element'   => '#sidebar-menus #menu-sidebarmenu .accordion:hover .accordion-heading',
			'attribute' => 'background',
		],
		[
			'title'     => 'SideBar Menu Parent Text Color', 
			'default'   => '#333',
			'element'   => '#sidebar-menus #menu-sidebarmenu .accordion .accordion-heading a',
			'attribute' => 'color',
		],
		[
			'title'     => 'SideBar Menu Child Background Color', 
			'default'   => '#ededed',
			'element'   => '#sidebar-menus #menu-sidebarmenu .accordion .accordion-menu li',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'SideBar Menu Child Text Color', 
			'default'   => '#333',
			'element'   => '#sidebar-menus #menu-sidebarmenu .accordion .accordion-menu li a',
			'attribute' => 'color',
		],
		[
			'title'     => 'Highlight Product Title Background Color', 
			'default'   => '#f5f5f5',
			'element'   => '.highlight .panel-default>.panel-heading',
			'attribute' => 'background-color',
		],
		[
			'title'     => 'Highlight Product Title Text Color', 
			'default'   => '#333',
			'element'   => '.highlight .panel-default>.panel-heading',
			'attribute' => 'color',
		],
	];?>

(function( $ ) {
	<?php  
		foreach($custom_color as $key => $value)
		{
	?>
			wp.customize( <?php echo $key; ?>, function( value ) {
				value.bind( function( to ) {
					console.log(to);
					$( '<?php echo $value["element"]; ?>' ).css( '<?php echo $value["attribute"]; ?>', to );
				});
			});
	<?php
		}
	?>
 
}( jQuery ));