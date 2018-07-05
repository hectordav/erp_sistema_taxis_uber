<script type="text/javascript">
            $(document).ready(function() {
                $("#id_cliente").change(function() {
                    $("#id_cliente option:selected").each(function() {
                        id_cliente = $('#id_cliente').val();
                        $.post("<?php echo base_url(); ?>direccion_empresa/fill_empresa", {
                            id_cliente : id_cliente
                        }, function(data) {
                         $("#id_empresa").html(data);
                         $("#id_empresa").selectpicker('refresh');

                        });
                    });
                });
            });
</script>