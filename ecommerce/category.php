<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try {
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	} catch (PDOException $e) {
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12"> <!-- Set the column width to 12 to remove the sidebar -->
							<h1 class="page-header"><?php echo $cat['name']; ?></h1>
							<?php

							$conn = $pdo->open();

							try {
								$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
								$stmt->execute(['catid' => $catid]);

								foreach ($stmt as $row) {
									$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
									echo "
	       							<div class='col-sm-2' style='width: 20%; padding-left: 10px!important; padding-right:10px!'> <!-- Set the column width to 2 to display 5 products in each row -->
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; " . number_format($row['price'], 2) . "</b>
												
		       								</div>
	       								</div>
	       							</div>
	       						";
								}

							} catch (PDOException $e) {
								echo "There is some problem in connection: " . $e->getMessage();
							}

							$pdo->close();

							?>
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
