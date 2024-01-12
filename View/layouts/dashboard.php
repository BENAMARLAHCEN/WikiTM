<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$URI = ['Team'];
require('include/head.php');

?>

<body>

    <?php
    require('include/header.php');
    require('include/sidebar.php');
    ?>

    <main id="main" class="main">


        <section class="section dashboard">
            <?= $content ?>
        </section>
    </main>



    <!-- Vendor JS Files -->
    <div class="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/uap6tfyqy3524i3iy3fg13e083sxl1v17417bwu2gks9ovcu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        

        <!-- Select 2 CDN script -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    </div>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ajax.js"></script>
    <script src="assets/js/select.js"></script>

</body>

</html>