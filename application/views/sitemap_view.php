<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?php echo base_url();?></loc>
    <priority>1.0</priority>
  </url>
  <url>
    <loc><?php echo base_url()."beranda"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>1.00</priority>
  </url>
  <url>
    <loc><?php echo base_url()."kategori/bisnis"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo base_url()."kategori/olahraga"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo base_url()."kategori/gaya-hidup"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo base_url()."kategori/teknologi"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo base_url()."kategori/politik"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo base_url()."tentang"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
    
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo base_url()."kontak"?></loc>
    <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
   
    <priority>0.80</priority>
  </url>

  <!-- Your Sitemap -->
  <?php foreach($urlslist as $url) { ?>
    <?php
    $judulx = explode(" ", $url['JUDUL_ARTIKEL']);
    $judul = implode("-", $judulx);
    ?>

    <url>
      <loc><?php echo base_url()."Artikel"."/".$judul?></loc>
      <lastmod><?php echo date('Y-m-dTH:i:s+00:00'); ?></lastmod>
      
      <priority>0.5</priority>
    </url>

    <?php } ?>

</urlset>
