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
  	<?php include_once("main/header.php");?>
		<div class="site-content">
			<div class="page-head" data-bg-image="<?php echo base_url('asset/reading_interface_asset/images/view-2.png');?>">
				<div class="container">
					<h1 class="page-title"><?php echo $msg_cari?></h1>
          <small>Temukan artikel menarik hanya di mediasi</small>
				</div>
			</div>
			<main class="main-content">
        <div class="fullwidth-block">
          <div class="container">
            <div class="row mar-kat">
              <div class="row">
								<?php if( ! empty($konten)){
                  foreach($konten as $data){

										if(strlen($data->JUDUL_ARTIKEL)  > 20 ){
											$title = mb_substr($data->JUDUL_ARTIKEL,0,20)."...";
										}else{
											$title = $data->JUDUL_ARTIKEL;
										}

										$isiku = preg_replace('/[^A-Za-z0-9 !@#$%^&*().]/u','', strip_tags($data->ISI_ARTIKEL));
										if(strlen($isiku)  > 50 ){
											$isi = mb_substr($isiku,0,50)."...";
										}else{
											$isi = $isiku;
										}

										$judulx = explode(" ", $data->JUDUL_ARTIKEL);
										$judul = implode("-", $judulx);

										echo "
										<div class='col-md-3 col-sm-6'>
											<div class='feature'>
												<img src='".'http://localhost/AdminMediasi/asset/images/'.$data->GAMBAR_ARTIKEL."' alt='".$data->JUDUL_ARTIKEL." | Mediasi'  title='".$data->JUDUL_ARTIKEL." | Mediasi' tooltip='".$data->JUDUL_ARTIKEL." | Mediasi' class='img-responsive img-pos'>
												<b>
													".$title."
												</b>
												<p>
													".$isi."
												</p>
												<a href='".base_url("artikel/".$judul)."' class='button'>
													Selengkapnya
												</a>
											</div>
										</div>
										";
									}
								}
								?>
            </div>
            <!-- .row -->
            <br>
            <a href="<?php echo base_url('beranda');?>" class="button back" >
              <img src="<?php echo base_url('asset/reading_interface_asset/images/arrow-back.png');?>" alt="Beranda | Mediasi"  title="Beranda | Mediasi" tooltip="Beranda | Mediasi">Kembali
            </a>
          </div>
        </div>
      	<?php include_once("main/inc-cari.php");?>
      </main>
    <!-- .main-content -->
    <?php include_once("main/footer.php");?>
    </div>
	  <script src="<?php echo base_url('asset/reading_interface_asset/js/jquery-1.11.1.min.js');?>">
	  </script>
	  <script src="<?php echo base_url('asset/reading_interface_asset/js/plugins.js');?>">
	  </script>
	  <script src="<?php echo base_url('asset/reading_interface_asset/js/app.js');?>">
	  </script>
  </body>
</html>
