    </body>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/datatable/js/jquery.dataTables.js') ?>"></script>
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "searching": true,
                "lengthChange": true,
                "ordering": true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#transaksitable').DataTable({
                "searching": true,
                "lengthChange": true,
                "ordering": true,
            });
        });
    </script>


    </html>