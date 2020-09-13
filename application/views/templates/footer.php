    <script type="text/javascript">
        $(document).ready(function(){
            $('#requirementsModal').modal({
                show: true
            });
        });
    </script>

    <script>
        function copyURI(evt) {
            evt.preventDefault();
            navigator.clipboard.writeText(evt.target.getAttribute('href')).then(() => {
            /* clipboard successfully set */
            alert(evt.target.getAttribute('href'));
            }, () => {
            /* clipboard write failed */
            });
        }
    </script>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/"; ?>dist/js/adminlte.min.js"></script>
        
</body>
</html>
