<main>
    <div class="container-fluid">
        
        <div class="row profil-penjahit ">
            <?php
            include "lib/config.php";
            include "lib/koneksi.php";
            $id = $_GET['id'];
            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit ='$id'");
            while ($res = mysqli_fetch_array($kueri)) {
                $nama = $res['nama'];
            ?>
                <div class="col-sm-6">
                    <img src="admin/upload/<?php echo $res['foto']; ?>" alt="" class="img-fluid" width="500px">
                </div>
                <div class="col-sm-6">
                    <div class="keterangan">
                        <h5><?php echo $res['nama']; ?></h5>
                        <p><?php echo $res['alamat']; ?></p>
                        <p><?php echo $res['deskripsi']; ?></p>
                    </div>
                    <div class="aksi">
                        <button class="aksi-chat">Chat</button>
                        <button class="aksi-pesan" onclick="window.location.href='order.php?id=<?php echo $res['idPenjahit']; ?>&nama=<?php echo $nama;?>'">Buat Jahitan</button>
                    </div>

                </div>
            <?php } ?>

        </div>
        <hr>


        <div class="row">
            <div class="col-lg-12 katalog">
                <div class="owl-carousel owl-theme">
                    <?php
                    $kueriKat = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idPenjahit ='$id' LIMIT 10");
                    while ($resKat = mysqli_fetch_array($kueriKat)) {
                    ?>
                        <div class="katalog-list" >
                        <div class="katalog-next">
                        <a href="" data-toggle="tooltip" data-placement="right" title="Lihat secara lengkap"><i class="ti-arrow-circle-right"></i></a>
                        </div> 
                            <img src="admin/upload/<?php echo $resKat['foto']; ?>" alt="" >
                            <div class="nama-katalog" >
                                <p>
                                    <?php $name = strip_tags($resKat['namaKatalog']);
                                    if (strlen($name) > 20) {
                                        $stringCut = substr($name, 0, 20);
                                        $endPoint = strrpos($stringCut, ' ');


                                        $name = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $name .= '...';
                                    }
                                    echo $name;

                                    ?>
                                </p>

                                <a href="order.php?idKatalog=<?php echo $resKat['idKatalog']; ?>&id=<?php echo $id; ?>&nama=<?php echo $nama;?>"><i class="ti-plus"></i></a>
                            </div>

                        </div>

                    <?php } ?>
                                                  
                </div>
                <div class="row">
                    <div class="col-sm-12 link-katalog">
                    <a href="katalog.php?id=<?php echo $id;?>&nama=<?php echo $nama;?>"> Lihat katalog lengkap</a>  
                    </div>
                </div>
               
            </div>
        </div>

    </div>


</main>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            stagePadding: 23,
            loop: true,
            margin: 2,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                    loop: false
                }
            }
        });

    });
   
</script>