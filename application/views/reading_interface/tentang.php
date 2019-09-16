<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
 		<link rel='icon' href='<?php echo base_url('asset/reading_interface_asset/images/icon.png');?>' type='image/x-icon'>
		<?php include_once("main/meta_tag.php") ?>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/reading_interface_asset/fonts/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Loading main css file -->
    <!-- Loading main css file -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/reading_interface_asset/css/style.css');?>">
    <!-- jquery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- [/] jquery -->
    <!-- bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>

	<body>
		<div class="site-content">
			<?php include_once("main/header.php");?>
			<div class="page-head" data-bg-image="<?php echo base_url('asset/reading_interface_asset/images/view-3.png');?>">
				<div class="container">
					<h1 class="page-title">Tentang Kami Mediasi</h1>
          <small>Terimakasih telah berkunjung untuk para pembaca setia di Website Mediasi kami </small>
				</div>
			</div>

			<main class="main-content">
        <div class="fullwidth-block">
					<div class="container">
						<div class="row mar-kat">
							<div class="col-md-6">
								<div class="checked-box">
									<h3>Mediasi Memberikan Artikel Reviewer Website & Aplikasi</h3>
								</div>
								<div class="checked-box">
									<h3>Mediasi Memberikan Artikel Seputar Bisnis Terkini</h3>
								</div>
								<div class="checked-box">
									<h3>Mediasi Memberikan Artikel Seputar Kabar Politik Di Indonesia</h3>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checked-box">
									<h3>Mediasi Memberikan Artikel Seputar Perkembangan Teknologi</h3>
								</div>
								<div class="checked-box">
									<h3>Mediasi Memberikan Artikel Seputar Olahraga Terkini</h3>
								</div>
								<div class="checked-box">
									<h3>Mediasi Memberikan Artikel Seputar Perkembangan Gaya Hidup</h3>
								</div>
							</div>
						</div>
					</div>
				</div>

        <div class="fullwidth-block" data-bg-color="#edf2f4">
          <div class="container">
            <h2 id="text-judul">Tim Kami Saat Ini</h2>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <div class="team">
                  <img src="<?php echo base_url('asset/reading_interface_asset/images/profil-1.png');?>" alt="Aryandi Triyanto | Mediasi"  title="Aryandi Triyanto | Mediasi" tooltip="Aryandi Triyanto | Mediasi" class="team-image">
                  <h3 class="team-name">Aryandi Triyanto</h3>
                  <p>Penulis Di Mediasi Nusantara</p>
                  <div class="social-links">
                    <a href="fb.com/aryanditrian"><i class="fa fa-facebook"></i></a>
                    <a href="twitter.com/arynadi_three"><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="team">
                  <img src="<?php echo base_url('asset/reading_interface_asset/images/profil-2.png');?>" alt="Wrida Adi Wardana | Mediasi"  title="Wrida Adi Wardana | Mediasi" tooltip="Wrida Adi Wardana | Mediasi" class="team-image">
                  <h3 class="team-name">Wrida Adi Wardana</h3>
                  <p>Penulis Di Mediasi Nusantara</p>
                  <div class="social-links">
                    <a href="https://web.facebook.com/wrida.adi"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/WridaAdi"><i class="fa fa-twitter"></i></a>
                    <a href="https://plus.google.com/+WridaAdi"><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
              </div>
            </div> <!-- .row -->
          </div> <!-- .container -->
        </div>
        <?php include_once("main/inc-cari.php");?>
      </main> <!-- .main-content -->
      <?php include_once("main/footer.php");?>
		</div>
		<script src="<?php echo base_url('asset/reading_interface_asset/js/jquery-1.11.1.min.js');?>"></script>
		<script src="<?php echo base_url('asset/reading_interface_asset/js/plugins.js');?>"></script>
		<script src="<?php echo base_url('asset/reading_interface_asset/js/app.js');?>"></script>
	</body>
</html>
