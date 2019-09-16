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
    <!-- [/] bootstrap -->
	</head>

	<body>
    <div>
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a684747e2470fb5"></script>
    </div>

		<div class="site-content">
			<?php include_once("main/header.php");?>
			<div class="page-head" data-bg-image="<?php echo base_url('asset/reading_interface_asset/images/view-1.png')?>">
				<div class="container">
					<h1 class="page-title"><?php echo $konten->JUDUL_ARTIKEL; ?></h1>
				</div>
			</div>
			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div id="nav-view">
									<?php
										$ktgx = explode(" ", $konten->KATEGORI);
										$ktg = implode("-", $ktgx);

										$judulx = explode(" ", $konten->JUDUL_ARTIKEL);
										$judul = implode("-", $judulx);
									 ?>
					        <span><a href="<?php echo base_url("beranda");?>"><i class="fa fa-home"></i> Beranda</a></span>&ensp;>&ensp;
					        <span><a href="<?php echo base_url('kategori/'.$ktg);?>"><?php echo $konten->KATEGORI; ?></a></span>&ensp;>&ensp;
					        <span class="active"><a href="<?php echo base_url("artikel/".$judul)?>">Artikel</a></span>
					      </div>
	            </div>
						</div>
            <div class="col-md-2"></div>

						<div class="col-md-8 boxed-icon">
              <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                  <div class="img-size">
                      <img src="<?php echo 'http://localhost/AdminMediasi/asset/images/'.$konten->GAMBAR_ARTIKEL;?>" alt="image" class="img-responsive">
                      <div class="img-post-temp">
                        <div class="img-post-text">
													<?php
													  $datetimearray = explode(" ",  $konten->TANGGAL_ARTIKEL);
													  $date = $datetimearray[0];
													  $reformatted_date = date('d M Y',strtotime($date));

														echo $reformatted_date." - Kategori ".$konten->KATEGORI;
													 ?>
												</div>
                      </div>
                  </div>
                </div>
                <div class="col-md-1">
                </div>
              </div>
							<p><strong>Mediasi | <?php echo $konten->JUDUL_ARTIKEL ?></strong></p>
							<p>
								<?php $isi = explode('src="',$konten->ISI_ARTIKEL);
                $newIsi = implode('src="http://localhost/AdminMediasi/', $isi);
                echo $newIsi ?>
							</p>
							<div id='tag-row'>
							    <div id='tag-name'>
							        Penulis
							        <i class='fa fa-user'></i>
							        <?php echo $konten->PENULIS?>
							    </div>
							</div>
							<br>
							<div id="tag-row">
								<div id="tag-name">Tags <i class="fa fa-tags grey"></i></div>
									<?php  if($konten->LABEL!=""){
										$label = explode(", ",  $konten->LABEL);
										foreach ($label as $tag) {
											echo"
												<h5 id='tag-des'>
													<a id='tag-e' href=".base_url('tag/'.$tag)." title='' target='_top'>
														".$tag."
													</a>
												</h5>
											";
										}
									}?>
							</div>

              <br><a href="<?php echo base_url("beranda");?>" class="button back" ><img src="<?php echo base_url('asset/reading_interface_asset/images/arrow-back.png');?>" alt="Image">Kembali</a>
						</div>

            <div class="col-md-2">
            </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8 comment">
						<div class="row ">
							<div class="col-md-12 comment-2">
								<div id="disqus_thread"></div>
									<script>
										(function() { // DON'T EDIT BELOW THIS LINE
											var d = document, s = d.createElement('script');
											s.src = 'https://mediasi-1.disqus.com/embed.js';
											s.setAttribute('data-timestamp', +new Date());
											(d.head || d.body).appendChild(s);
										})();
									</script>
									<noscript>
										Please enable JavaScript to view the
										<a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
									</noscript>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
        <?php include_once("main/inc-cari.php")?>
      </main> <!-- .main-content -->
      <?php include_once("main/footer.php")?>
		</div>
		<script src="<?php echo base_url('asset/reading_interface_asset/js/jquery-1.11.1.min.js');?>"></script>
		<script src="<?php echo base_url('asset/reading_interface_asset/js/plugins.js');?>"></script>
		<script src="<?php echo base_url('asset/reading_interface_asset/js/app.js');?>"></script>
	</body>
</html>
