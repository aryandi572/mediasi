<?php
if ($this->uri->segment(1) == 'beranda') {
  echo '<title> Beranda | Mediasi</title>';
  echo "<meta name='description' content='Portal Berita Mediasi memberikan artikel digital terkini yang dikemas secara detail dan faktual sebagai sarana informasi netizen | Mediasi'>";
}elseif ($this->uri->segment(1) == 'tentang') {
  echo '<title> Tentang | Mediasi</title>';
  echo "<meta name='description' content='Portal Berita Mediasi memberikan artikel digital terkini yang dikemas secara detail dan faktual sebagai sarana informasi netizen | Mediasi'>";
}elseif ($this->uri->segment(1) == 'kontak') {
  echo '<title> Kontak | Mediasi</title>';
  echo "<meta name='description' content='Portal Berita Mediasi memberikan artikel digital terkini yang dikemas secara detail dan faktual sebagai sarana informasi netizen | Mediasi'>";
}elseif ($this->uri->segment(1) == 'kategori') {
  if ($this->uri->segment(2) == 'bisnis') {
    echo '<title> Bisnis | Mediasi</title>';
    echo "<meta name='description' content='Bisnis | Profit, keuntungan, laba, inovasi, jual, beli, perusahaan, produk dan jasa | Mediasi'>";
  }elseif ($this->uri->segment(2) == 'olahraga') {
    echo '<title> Olahraga | Mediasi</title>';
    echo "<meta name='description' content='Olahraga | Sport, aktivitas, pemain, skor, tim, club, sepakbola, basket, bulu tangkis, liga, pertandingan, dan juara | Mediasi'>";
  }elseif ($this->uri->segment(2) == 'gaya-hidup') {
    echo '<title> Gaya Hidup | Mediasi</title>';
    echo "<meta name='description' content='Gaya Hidup | Lifestyle, sosial, fashion, gaya, busana, trend, topik, kekinian, hits, populer, masa kini dan perilaku | Mediasi'>";
  }elseif ($this->uri->segment(2) == 'teknologi') {
    echo '<title> Teknologi | Mediasi</title>';
    echo "<meta name='description' content='Teknologi | Gadget, peralatan, elektronik, canggih, inovasi, komputer, hardware, software, aplikasi, jaringan, penemuan, dan smartphone | Mediasi'>";
  }elseif ($this->uri->segment(2) == 'politik') {
    echo '<title> Politik | Mediasi</title>';
    echo "<meta name='description' content='Politik | Kasus, suap, korupsi, politisi, pejabat, publik, presiden, gubernur, partai, kepentingan, kekuasaan, dan peraturan | Mediasi'>";
  }
}elseif ($this->uri->segment(1) == 'artikel') {
  $judul = $konten->JUDUL_ARTIKEL;
  echo '<title> '.$judul.' | '.$konten->KATEGORI.' | Mediasi</title>';
  if ($konten->KATEGORI == 'Bisnis') {
    echo "<meta name='description' content='".$konten->JUDUL_ARTIKEL." | ".$konten->KATEGORI." | Profit, keuntungan, laba, inovasi, jual, beli, perusahaan, produk dan jasa | Mediasi'>";
  }elseif ($konten->KATEGORI == 'Olahraga') {
    echo "<meta name='description' content='".$konten->JUDUL_ARTIKEL." | ".$konten->KATEGORI." | Sport, aktivitas, pemain, skor, tim, club, sepakbola, basket, bulu tangkis, liga, pertandingan, dan juara | Mediasi'>";
  }elseif ($konten->KATEGORI == 'Gaya Hidup') {
    echo "<meta name='description' content='".$konten->JUDUL_ARTIKEL." | ".$konten->KATEGORI." | Lifestyle, sosial, fashion, gaya, busana, trend, topik, kekinian, hits, populer, masa kini dan perilaku | Mediasi'>";
  }elseif ($konten->KATEGORI == 'Teknologi') {
    echo "<meta name='description' content='".$konten->JUDUL_ARTIKEL." | ".$konten->KATEGORI." | Gadget, peralatan, elektronik, canggih, inovasi, komputer, hardware, software, aplikasi, jaringan, penemuan, dan smartphone | Mediasi'>";
  }elseif ($konten->KATEGORI == 'Politik') {
    echo "<meta name='description' content='".$konten->JUDUL_ARTIKEL." | ".$konten->KATEGORI." | Kasus, suap, korupsi, politisi, pejabat, publik, presiden, gubernur, partai, kepentingan, kekuasaan, dan peraturan | Mediasi'>";
  }
}elseif ($this->uri->segment(1) == 'cari') {
  echo '<title> '.$msg_cari.' | Mediasi</title>';
  echo "<meta name='description' content='Portal Berita Mediasi memberikan artikel digital terkini yang dikemas secara detail dan faktual sebagai sarana informasi netizen | Mediasi'>";
}
?>
