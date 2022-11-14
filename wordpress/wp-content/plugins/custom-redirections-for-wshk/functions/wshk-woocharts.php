<?php


//NUEVO CHARTJS


//Since v.1.0.4

$checkboxcheckerwshkb = get_option('wshk_enablescusrecharts');
if ( isset($checkboxcheckerwshkb) && $checkboxcheckerwshkb == '450')
    {

function wshk_toma_prueba() {
    


    
    //orders status
    
    //GET TOTAL BALANCE IN ву
  $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array_keys( wc_get_order_statuses() ),
    ) );
    
    $totalbal = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalbal += $order->get_total();
    }
	//END TOTAL BALANCE
  
  //GET TOTAL COMPLETED IN ву
  // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-completed' )
    ) );
    
    $totalcomp = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalcomp += $order->get_total();
    }
  //END TOTAL COMPLETED
  
  //GET TOTAL ON HOLD IN ву
  // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-on-hold' )
    ) );
    
    $totalonh = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalonh += $order->get_total();
    }
  //END TOTAL ON HOLD
  
  //GET TOTAL PROCESSING IN ву
  // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-processing' )
    ) );
    
    $totalproc = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalproc += $order->get_total();
    }
  //END TOTAL PROCESSING
  
  //GET TOTAL PENDING IN ву
  $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-pending' )
    ) );
    
    $totalpend = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalpend += $order->get_total();
    }
  //END TOTAL PENDING
  
  //GET TOTAL CANCELLED IN ву
  $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-cancelled' )
    ) );
    
    $totalcanc = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalcanc += $order->get_total();
    }
  //END TOTAL CANCELLED
  
  //GET TOTAL REFUNDED IN ву
  $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-refunded' )
    ) );
    
    $totalrefu = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalrefu += $order->get_total();
    }
  //END TOTAL REFUNDED
  
  //GET TOTAL FAILED IN ву
  $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => array( 'shop_order' ),
        'post_status' => array( 'wc-failed' )
    ) );
    
    $totalfail = 0;
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order );
        $totalfail += $order->get_total();
    }
  //END TOTAL FAILED
    
    //variables
    
      
    $tbtopcharttitle = get_option('wshk_tbcharttitleone');
    $tbaxisytitle = get_option('wshk_tbcharttitletwo');
    $tbcharttype = get_option('wshk_tbcharttitletres');
    $tbaxisxtitle = get_option('wshk_tbcharttitlefour');
    $tbchartcontent = get_option('wshk_tbcharttitlefive');
    $tbchartanimation = get_option('wshk_tbcharttitlesix');
    $tbchartheight = get_option('wshk_tbcharttitleseven');
    
    
    
    $octopcharttitle = get_option('wshk_occharttitleone');
    $ocaxisytitle = get_option('wshk_occharttitletwo');
    $occharttype = get_option('wshk_occharttitletres');
    $occharttheme = get_option('wshk_occharttitlefour');
    $occhartcontent = get_option('wshk_occharttitlefive');
    $occhartanimation = get_option('wshk_occharttitlesix');
    $occhartheight = get_option('wshk_occharttitleseven');
    
    
    
     $mitesttypee = get_option('wshk_tbcharttitletres'); // Can use -> bar, pie, doughnut,horizontalBar,line,radar,polarArea | NOT SUPPORTED bubble,scatter
     
    $testtitledatauno = esc_html__( 'COMPLETED', 'wshk-custom-redirections' );
    $testtitledatados = esc_html__( 'ON HOLD', 'wshk-custom-redirections' );
    $testtitledatatres =esc_html__( 'PROCESSING', 'wshk-custom-redirections' );
    $testtitledatacuatro =esc_html__( 'PENDING', 'wshk-custom-redirections' );
    $testtitledatacinco =esc_html__( 'CANCELLED', 'wshk-custom-redirections' );
    $testtitledataseis =esc_html__( 'REFUNDED', 'wshk-custom-redirections' );
    $testtitledatasiete =esc_html__( 'FAILED', 'wshk-custom-redirections' );
    
    $mitesttitulos = ["$testtitledatauno", "$testtitledatados", "$testtitledatatres", "$testtitledatacuatro", "$testtitledatacinco", "$testtitledataseis", "$testtitledatasiete"];
    
    
    
    
    
    $mitestvariablle = [$totalcomp, $totalonh, $totalproc, $totalpend, $totalcanc, $totalrefu, $totalfail];
    $mitesttitulos = ["$testtitledatauno", "$testtitledatados", "$testtitledatatres", "$testtitledatacuatro", "$testtitledatacinco", "$testtitledataseis", "$testtitledatasiete"];
  
   




if($tbchartanimation == "right"){
         $mivariable = json_encode($tbtopcharttitle.' '.$totalbal.$tbchartcontent);
            
        }else{
            $mivariable = json_encode($tbtopcharttitle.' '.$tbchartcontent.$totalbal);
            
            
        } 
        //load chart library
    $variultri = get_site_url(null, '/wp-content/plugins/custom-redirections-for-wshk/chartjs/Chart.min.js');
    
    
    $varivarivari = '

<script src="'.$variultri.'"></script>

    
    
     <style>
	  canvas#spentchart {width:100% !important; height:100% !important;}
	  canvas {
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
		}
  
   @media screen and (min-width: 800px){
   .chart-container div:first-child{
  max-width: 50%;
  float:left;
}
.chart-container div:nth-child(2){
  max-width: 50%;
  float:left;
}

 }   
	  
	  </style>
	  
	  <div class="chart-container">
    <canvas id="spentchart" width="800" height="450"></canvas>
    </div>
    
    
    <script>
    
    var data ='.json_encode($mitesttypee).';
    
    // Bar chart
        
    new Chart(document.getElementById("spentchart"), {
    
    
    //type of chart
    type: '. json_encode($mitesttypee).',
    
    //data for our dataset
    data: {
      labels: '. json_encode($mitesttitulos).',
      datasets: [
        {
          label: '. json_encode($tbtopcharttitle).',
          backgroundColor: ["rgb(255, 99, 132, 0.2)","rgb(255, 159, 64, 0.2)","rgb(255, 205, 86, 0.2)","rgb(75, 192, 192, 0.2)","rgb(54, 162, 235, 0.2)","rgb(153, 102, 255, 0.2)","rgb(201, 203, 207, 0.2)"],
          data: '. json_encode($mitestvariablle).',
        }
      ]
    },
    
    // configuration options
    options: {
        showAllTooltips: true,
		    tooltips: {
		      custom: function(tooltip) {
		        if (!tooltip) return;
		        // disable displaying the color box;
		        tooltip.displayColors = '. $occharttheme.';
		      },
		      callbacks: {
		        // use label callback to return the desired label
		        label: function(tooltipItem, data) {
		        
		        
		          if( '. json_encode($tbchartanimation).' != "right" ){
		          
		          if( '. json_encode($mitesttypee).' == "bar" ){
		            return tooltipItem.xLabel + " : " + '. json_encode($tbchartcontent).' + tooltipItem.yLabel
		          } else {
		              return tooltipItem.yLabel + " : " + '. json_encode($tbchartcontent).' + tooltipItem.xLabel
		          }
		        } else {
		            if( '. json_encode($mitesttypee).' == "bar" ){
		            return tooltipItem.xLabel + " : " + tooltipItem.yLabel + '. json_encode($tbchartcontent).'
		            } else {
		                
		              return tooltipItem.yLabel + " : " + tooltipItem.xLabel + '. json_encode($tbchartcontent).'  
		            }
		            
		        }
		        
		       
		        
		        },
		        // remove title
		        title: function(tooltipItem, data) {
		          return;
		        }
		      }
		    },
	  
	  //start chart yAxes from zero
	  
	  //Add yAxes title
	   scales: {
        yAxes: [{
          scaleLabel: {
            display: '. $ocaxisytitle.',
            labelString: '. json_encode($tbaxisytitle).'
          },
		  ticks:{beginAtZero: true}
        }],
		 //AddxAxes title
        xAxes: [{
          scaleLabel: {
            display: '. $occharttype.',
            labelString: '. json_encode($tbaxisxtitle).'
          }
        }],
      },
	  //Display or hide the chart legend
         
        
      legend: { display: false },
      
      
      
  
     
	  //Enable or disable responsive chart
	  //responsive:true,
	  //Custom title for chart
	  title: {
            display: '. $octopcharttitle.',
            //text: '. json_encode($tbtopcharttitle.' '.$totalbal.$tbchartcontent).'
            
            
            text: '.$mivariable.'
            
            
            
      }
    }
});
        
    </script>
    ';//fin varivarivari
    return $varivarivari;
}
add_shortcode('woo_spentchart','wshk_toma_prueba');
} //end chart



?>