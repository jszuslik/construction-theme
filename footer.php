</section>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="footer-flag">
				<img src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/footerflag.png" class="visible-lg visible-md" alt="" />
        		<img src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/footerflag2.png" class="visible-xs visible-sm" alt="" />
					<div class="footer-content">
						<?php if(get_option('company_name')){ ?>
						<h3><?php echo get_option('company_name'); ?></h3>
						<div class="text-widget">
							<?php if (get_option('company_address_1')) {?>
							<h4><?php echo get_option('company_address_1') . " " . get_option('company_address_2'); ?></h4>
							<?php } ?>
							<?php if(get_option('company_office_number')){
									$orig_phone = get_option('company_office_number');
									$needle = array("(", ")", "-", " ");
									$phone = str_replace($needle, "", $orig_phone);
								?>
							<h4><a href="tel:+1<?php echo $phone; ?>"><?php echo $orig_phone; ?></a></h4>
							<?php } ?>
							<?php if(get_option('company_email')) { ?>
							<h4><a href="mailto:<?php echo get_option('company_email'); ?>">E-MAIL US</a></h4>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="footer-widget right">
					<div class="row ftrrow">
						<div class=" col-md-2 ftrclm">
							<?php
							wp_nav_menu( array(
									'menu'              => 'who-we-are',
									'theme_location'    => 'who-we-are',
									'depth'             => 2,
									'menu_class'        => 'list-unstyled'
							));
							?>

						</div>
						  
                          <div class="col-md-2 ftrclm">
							  <?php
							  wp_nav_menu( array(
								  'menu'              => 'ftr-services',
								  'theme_location'    => 'ftr-services',
								  'depth'             => 2,
								  'menu_class'        => 'list-unstyled'
							  ));
							  ?>

						</div>
						
                        <div class="col-md-2 ftrclm">

							<?php
							wp_nav_menu( array(
								'menu'              => 'ftr-portfolio',
								'theme_location'    => 'ftr-portfolio',
								'depth'             => 2,
								'menu_class'        => 'list-unstyled'
							));
							?>

						</div>
						
                        <div class="col-md-2 ftrclm">
							<?php
							wp_nav_menu( array(
								'menu'              => 'ftr-contact',
								'theme_location'    => 'ftr-contact',
								'depth'             => 2,
								'menu_class'        => 'list-unstyled'
							));
							?>
						</div>
						
                        <div class="col-md-3 ftrclm">
							<?php
							wp_nav_menu( array(
								'menu'              => 'ftr-planroom',
								'theme_location'    => 'ftr-planroom',
								'depth'             => 2,
								'menu_class'        => 'list-unstyled'
							));
							?>
						</div>
					</div>
				</div><!-- /footer-widget -->
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
	<div class-"container-fluid">
		<div class="spnfooter">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-12 right last">
						<div class="col-xs-12 col-md-5 col-md-push-4 col-lg-push-4 copyright">
						  <p>Copyright &copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?> of Wisconsin. All rights reserved.</p>
						</div><!-- /copyright -->
						<div class="col-xs-12 col-md-4 col-md-push-4 col-lg-push-4">
							<a href="http://www.lanex.com" target="_blank">
								<img class="visible-md visible-lg" src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/lanex-logo.png" alt="Site Design by Lanex Tools for e-Business">
							</a>
						</div><!-- /lanexlogo -->
					</div><!-- /column -->
				</div>
			</div>
		</div><!-- row -->
	</div><!-- /container -->
</footer>
<!-- Don't forget analytics -->
<?php wp_footer(); ?>
<script>
jQuery(document).ready(function($) {
var sync1 = $("#home-banner");
var sync2 = $("#caption-banner");

sync1.owlCarousel({
	autoPlay: true,
	singleItem : true,
	touchDrag : true,
	mouseDrage : true,
	slideSpeed : 1000,
	navigation: true,
	pagination:false,
	afterAction : syncPosition,
	responsiveRefreshRate : 200,
	navigationText :	["<",">"],
});

sync2.owlCarousel({
	singleItem : true,
	pagination:false,
	responsiveRefreshRate : 100,
	mouseDrag : false,
	touchDrag : false,
	afterInit : function(el){
		el.find(".owl-item").eq(0).addClass("synced");
	}
});


function syncPosition(el){
	var current = this.currentItem;
	$("#caption-banner")
		.find(".owl-item")
		.removeClass("synced")
		.eq(current)
		.addClass("synced")
	if($("#caption-banner").data("owlCarousel") !== undefined){
		center(current)
	}
}

$("#caption-banner").on("click", ".owl-item", function(e){

	var number = $(this).data("owlItem");
	sync1.trigger("owl.goTo",number);
});

function center(number){
	var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	var num = number;
	var found = false;
	for(var i in sync2visible){
		if(num === sync2visible[i]){
			var found = true;
		}
	}

	if(found===false){
		if(num>sync2visible[sync2visible.length-1]){
			sync2.trigger("owl.goTo", num - sync2visible.length+1)
		}else{
			if(num - 1 === -1){
				num = 0;
			}
			sync2.trigger("owl.goTo", num);
		}
	} else if(num === sync2visible[sync2visible.length-1]){
		sync2.trigger("owl.goTo", sync2visible[1])
	} else if(num === sync2visible[0]){
		sync2.trigger("owl.goTo", num-1)
	}

}

});
</script>
<script>
    jQuery(document).ready(function($) {

      var owl = $("#owl-association");

      owl.owlCarousel({

      items : 8, //8 items above 1000px browser width
      itemsDesktop : [1199,6], //5 items between 1199px and 901px
      itemsDesktopSmall : [974,4], // 3 items betweem 991px and 601px
      itemsTablet: [750,4], //2 items between 600 and 0;
      itemsMobile : [471,2], // itemsMobile disabled - inherit from itemsTablet option
      pagination : false //pagination disabled

      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


    });
    jQuery(document).ready(function($) {

      var owl = $("#owl-wrapper");

      owl.owlCarousel({

      autoPlay: 3000, //Set AutoPlay to 3 seconds

      items : 2,
      itemsDesktop : [1199,2],
      itemsDesktopSmall : [974,2],
      pagination : false //pagination disabled
  });
	var portfolio = $('#portfolio-owl');
	portfolio.owlCarousel({
		items: 6,
		mouseDrag: false
	});

});
    </script>


</body>
</html>
