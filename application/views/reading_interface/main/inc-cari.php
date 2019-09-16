<div class="fullwidth-block cta" data-bg-image="<?php echo base_url('asset/reading_interface_asset/images/cari-1.png');?>">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
      </div>
      <?php echo form_open('cari');?>
      <div class="col-md-6 subscribe-form">
        <h2 class="pad-search">Temukan artikel yang menarik</h2>
        <div id="custom-search-input">
          <div class="input-group col-md-12">
            <input class="form-control input-lg" name="cari" placeholder="Masukan kata kunci ... " type="text">
            <span class="input-group-btn">
              <button class="btn btn-info btn-lg" type="submit">
                Cari
              </button>
            </span>
          </div>
        </div>
      </div>
      <?php echo form_close();?>
      <div class="col-md-3">
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/reading_interface_asset/css/style.css');?>">
