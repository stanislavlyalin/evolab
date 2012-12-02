<?php
	
	function themezee_get_colors_sections() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_colors_schemes",
					"name" => __('Predefined Color Schemes', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_colors_custom",
					"name" => __('Custom Colors', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_colors_fonts",
					"name" => __('Font Colors', 'themezee_lang'));
		
		return $themezee_sections;
	}
	
	function themezee_get_colors_settings() {
	
		$color_styles = array(
			'black-grey.css' => __('Black & Grey', 'themezee_lang'),
			'green-blue.css' => __('Green & Blue', 'themezee_lang'),
			'green-orange.css' => __('Green & Orange', 'themezee_lang'),
			'green-purple.css' => __('Green & Purple', 'themezee_lang'),
			'orange-blue.css' => __('Orange & Blue', 'themezee_lang'),
			'orange-red.css' => __('Orange & Red', 'themezee_lang'),
			'purple-blue.css' => __('Purple & Blue', 'themezee_lang'),
			'purple-green.css' => __('Purple & Green', 'themezee_lang'),
			'red-orange.css' => __('Red & Orange', 'themezee_lang'),
			'standard.css' => __('Standard', 'themezee_lang'));
		
		$themezee_settings = array();
	
		### COLOR SETTINGS
		#######################################################################################
							
		$themezee_settings[] = array("name" => "Set Color Scheme",
						"desc" => __('Please select your color scheme here.', 'themezee_lang'),
						"id" => "themeZee_stylesheet",
						"std" => "standard.css",
						"type" => "select",
						'choices' => $color_styles,
						"section" => "themeZee_colors_schemes"
						);
		
		$themezee_settings[] = array("name" => __('Active Custom Colors?', 'themezee_lang'),
						"desc" => __('Check this to activate the Custom Color Function.', 'themezee_lang'),
						"id" => "themeZee_color_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_colors_custom");	
						
		#######################################################################################
						
		$themezee_settings[] = array("name" => __('First Color', 'themezee_lang'),
						"desc" => __("Select the first color here.", 'themezee_lang'),
						"id" => "themeZee_colors_font_one",
						"std" => "1d4c82",
						"type" => "colorpicker",
						"section" => "themeZee_colors_fonts");
						
		$themezee_settings[] = array("name" => __('Second Color', 'themezee_lang'),
						"desc" => __("Select the second color here.", 'themezee_lang'),
						"id" => "themeZee_colors_font_two",
						"std" => "1d4c82",
						"type" => "colorpicker",
						"section" => "themeZee_colors_fonts");			
		
		return $themezee_settings;
	}

?>