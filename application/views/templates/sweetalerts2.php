

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"  />

<script>

    <script>
        $(function(){
            <?php if(session()->has("success")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Great!',
                    text: '<?= session("success") ?>'
                })
            <?php } ?>

    
        <?php if(session()->has("error")) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session("error") ?>'
            })
        <?php } ?>
    });
    </script>
