<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dt').DataTable({
            "order": [
                [0, "asc"]
            ]
        });
    });
</script>
