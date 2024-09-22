<script>
    $(document).ready(function() {
        Swal.fire({
            title: '<?= $title ?>',
            text: '<?= $text ?>',
            icon: '<?= $icon ?>',
            confirmButtonText: '<?= $confirmButtonText ?>',
        });
    });
</script>