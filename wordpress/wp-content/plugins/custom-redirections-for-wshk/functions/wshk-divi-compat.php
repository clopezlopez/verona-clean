<?php 


//DIVI COMPATIBILITY
//Custom links for DIVI tabs module
//Enabling the function you can link to your tabs containers from external and same page links, just need to add the ID my-tabs to your DIVI tabs module, hide the header of tabs module and build your custom links using for example the DIVI text module and adding on each a custom ID like open-tab0 (to link with the first tab container), open-tab1 (to link with the second tab container), open-tab2, open-tab3...open-tab19

//Since v.1.1.0

$divitabsdetectorenable = get_option('wshk_enabledivitbdetect ');
if ( isset($divitabsdetectorenable) && $divitabsdetectorenable == '18911001')
    {
        
function wshk_divi_tabs_detector() {
   $divigetcustomtabsid = get_option('wshk_customdivitabsmodule');
   $divigetcustomtextid = get_option('wshk_customdivitextsmodule');
  
   ?>
   <style>
       ul.et_pb_tabs_controls {
        display: none; 
       }
   </style>
   <script> 
jQuery(function ($) { 
  
  var wshktabs = <?php echo '"#'.$divigetcustomtabsid.'"'; ?>;
var wshkcustombtn = <?php echo '"'.$divigetcustomtextid.'"'; ?>;

	
	//var current = window.location.hash;
	//var curhash = current.split("#my-tabs|").join("");
	
  //alert(curhash);

  
 /*$('#' + wshkcustombtn + curhash +' a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_' +curhash + ' a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });*/ 
	
	
	  
	 $('#' + wshkcustombtn +'0 *').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_0 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	 
	 $('#' + wshkcustombtn +'1 *').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_1 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	
	$('#' + wshkcustombtn +'2 *').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_2 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'3 *').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_3 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	
	$('#' + wshkcustombtn +'4 *').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_4 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	
	$('#' + wshkcustombtn +'5 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_5 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	
	$('#' + wshkcustombtn +'6 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_6 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	
	$('#' + wshkcustombtn +'7 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_7 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  }); 
	
	$('#' + wshkcustombtn +'8 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_8 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'9 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_9 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'10 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_10 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'11 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_11 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'12 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_12 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'13 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_13 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'14 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_14 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'15 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_15 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'16 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_16 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'17 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_17 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'18 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_18 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
	
	$('#' + wshkcustombtn +'19 a').on('click', function(event){ 
  $(wshktabs + ' .et_pb_tab_19 a').click(); 
  $("html, body").animate({ scrollTop: $(wshktabs).offset().top }, 1000); 
  });
   
  
}); 
</script>
   <?php
   
   
}


add_shortcode('wshk-detect-divi-tabs', 'wshk_divi_tabs_detector');

//add_action('wp_head', 'wshk_divi_tabs_detector');

}



?>