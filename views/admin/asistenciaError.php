<?php
require_once("template/header.php")
?>

<main class="container">

    <!-- Barra de Estados -->
    <div class="nav-scroller bg-body shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px">

        <nav class="nav p-1" aria-label="Secondary navigation">
            <div class="d-flex">

                <div class="">
                    <label class="btn btn-white rounded-0" style=" pointer-events: none">
                        <i class="fa-solid fa-chart-simple"></i> <b>-------</b>
                    </label>
                </div>

                <div class="">
                    <label class="btn btn-success " style=" pointer-events: none;">
                        <i class="fa-solid fa-check"></i>
                        -------
                    </label>
                </div>

                <div class="">
                    <label class="btn btn-danger ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-xmark"></i>
                        -------
                    </label>
                </div>
            </div>

        </nav>

    </div>


    <div class="align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <div class="my-3 p-3 bg-body shadow-sm " style="border-radius: 10px; text-align: center;">
       <img src="../src/img/error.png" class="img-fluid" alt="ERROR" width="550px" height="650px">
       <div class="d-grid gap-2"><a href="index.php" class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
    </div></div>

</main>


<script src="https://getbootstrap.com/docs/5.2/examples/offcanvas-navbar/offcanvas.js"></script>
</body>

</html>