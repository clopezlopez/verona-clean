<?php 


//ELEMENTOR COMPATIBILITY

//Since v.1.0.5

$elementordetectorenable = get_option('wshk_enableelemtbdetect ');

if ( isset($elementordetectorenable) && $elementordetectorenable =='3001')
    {
        
function wshk_elementor_tabs_detector() {
   
   ?>
   <script>
       
       jQuery(document).ready(function ($) {
    //get the hash tag
    //hash exist
    setTimeout(function () {
        var currentt = window.location.href
        var current = currentt.split('#tab')
        if (current.length > 1) {
            showAndScrollToTab($, current)
        }
    }, 200);
    // change the browser url according to selected tab
    $('.elementor-tab-title[data-tab]').click(function () {
        var current_location = window.location.href;
        current_location = current_location.split('#')
        window.location = current_location[0] + '#tab' + $(this).attr('data-tab')
        
    })
    // activate tab also from anchor link in the same page
    $('a').on('click', function () {
        var anchorUrl = $(this).attr('href')
        var anchor = anchorUrl.split('#tab')
        if (anchor.length > 1) {
            showAndScrollToTab($, anchor)
        }
    })
})

function showAndScrollToTab($, current) {
    $('.elementor-tab-content').removeClass('elementor-active').css('display','none')
    $('.elementor-tab-content[data-tab="' + current[1] + '"]').addClass('elementor-active').css('display','block')
    $('.elementor-tab-content').hide();
    $('.elementor-tab-content[data-tab="'+current[1]+'"]').show();
    
    $('.elementor-tab-title').removeClass('elementor-active')
    $('.elementor-tab-title[data-tab="' + current[1] + '"]').addClass('elementor-active')
    
    // scroll to
    /*var headerHeight = $('#header').height()  // put here your header id to get its height.
   $([document.documentElement, document.body]).animate({
        scrollTop: $('.elementor-tab-title[data-tab="' + current[1] + '"]').closest('.elementor-widget-wrap').offset().top - headerHeight
    }, 2000)*/
}

/*jQuery(document).ready(function($) {
  var hash = window.location.hash;
  if (! hash) {
    return;
  }
  
  if (! hash.includes('elementor-tab')) {
    return;
  }
  
  var tabId = hash.slice(-6).substr(hash.slice(-6).indexOf('-') + 1);
  
  
  var tabElement = $('#elementor-tab-title-' +  tabId);
  if (! tabElement) {
    return;
  }
  
  $(tabElement).click();
});*/
       
   </script>
   <?php
   
}


add_shortcode('wshk-detect-elem-tabs', 'wshk_elementor_tabs_detector');

//add_action('wp_head', 'wshk_elementor_tabs_detector');

}



?>