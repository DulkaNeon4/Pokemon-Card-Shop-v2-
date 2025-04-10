<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>

                    <!-- Welcome Message -->
                    <div class="jumbotron">
                        <h1>Welcome to Our Online Store!</h1>
                        <p>Discover the latest and greatest products right here.</p>
                    </div>

                    <!-- Carousel -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators and slides go here -->
                    </div>

                    <!-- Monthly Top Sellers -->
                    <h2>Monthly Top Sellers</h2>
                    <?php
                        // Monthly Top Sellers PHP code remains unchanged
                    ?>

                    <!-- Additional Text -->
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Unveiling our Monthly Top Sellers, this curated selection showcases the most sought-after products, each embodying quality, innovation, and popularity, making them the favorites among our discerning customers.</p>
                        </div>
                    </div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
