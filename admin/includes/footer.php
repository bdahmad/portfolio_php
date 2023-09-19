

        <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- ../assets/admin/Vendor JS       -->
    <script src="../assets/admin/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/admin/vendor/wow/wow.min.js"></script>
    <script src="../assets/admin/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../assets/admin/js/main.js"></script>


    <script>
        $(document).ready(function () {
        
            $(".skill_parcentage").change(function (e) { 
                e.preventDefault();
                $value = $('.skill_parcentage').val();
                $('.skill_parcentage_view').val($value);
            });

        });
    </script>

</body>

</html>
<!-- end document-->
