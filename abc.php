
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Design Interior</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <li<link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!-- icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- blet -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">DKAVVIR DESIGN.</a>
    </nav>
    <!-- end -->


    
    <!-- start slide -->
    <div class="container">
      <div class="content-slide">
        <div class="imgslide fade">
          <div class="numberslide">1 / 5</div>
          <img src="img/gb4.jpg" alt="" />
          <div class="text">Design 1</div>
        </div>

        <div class="imgslide fade">
          <div class="numberslide">2 / 5</div>
          <img src="img/poto web5.jpg" alt="" />
          <div class="text">Design 2</div>
        </div>

        <div class="imgslide fade">
          <div class="numberslide">3 / 5</div>
          <img src="img/poto-3.jpg.jpg" alt="" />
          <div class="text">Design 3</div>
        </div>

        <div class="imgslide fade">
          <div class="numberslide">4 / 5</div>
          <img src="img/gb6.jpg" alt="" />
          <div class="text">Design 4</div>
        </div>

        <div class="imgslide fade">
          <div class="numberslide">5 / 5</div>
          <img src="img/gb7.jpg" alt="" />
          <div class="text">Design 5</div>
        </div>

        <a class="prev" onClick="nextslide(-1)">&#10094;</a>
        <a class="next" onClick="nextslide(1)">&#10095;</a>
      </div>
    </div>
    <!-- end -->
    <?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_informasi'])) {
        $id_informasi=htmlspecialchars($_GET["id_informasi"]);

        $sql="delete from informasi where id_informasi='$id_informasi' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:abc.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>



  
    <section id="contact" class="contact">
    <div class="row text-center justify-content-center">
    <a href="create.php" class="btn btn-primary" role="button">Kirim Masukan</a>
    </div>
    <tr class="tableapa">
            <br>
            <thead>
            <tr>
            <table class="my-3 table table-bordered">
            <tr class="table-primary">   
            <th>No</th>        
            <th>Nama</th>
            <th>Saran</th>
            <th colspan='2'>Action</th>

        </tr>
        </thead>


      <form action="" method="post">
      

        <?php
        include "koneksi.php";
        $sql="select * from informasi order by id_informasi desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["saran"];   ?></td>
                <td>
                    <a href="update.php?id_informasi=<?php echo htmlspecialchars($data['id_informasi']); ?>" class="btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_informasi=<?php echo $data['id_informasi']; ?>" class="btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>

        
    </table>

    </section>

    <script>
      var slideIndex = 1;
      showSlide(slideIndex);

      function nextslide(n) {
        showSlide((slideIndex += n));
      }

      function showSlide(n) {
        var i;
        var slides = document.getElementsByClassName("imgslide");

        if (n > slides.length) {
          slideIndex = 1;
        }

        if (n < 1) {
          slideIndex = slides.length;
        }

        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }

        slides[slideIndex - 1].style.display = "block";
      }
    </script>
    <!-- icons -->
    <script>
      feather.replace();
    </script>


</script>
    
  </body>
</html>





