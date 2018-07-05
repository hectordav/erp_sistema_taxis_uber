<script type="text/javascript">
            $(document).ready(function() {
                $("#id_empresa").change(function() {
                    $("#id_empresa option:selected").each(function() {
                        id_empresa = $('#id_empresa').val();
                        $.post("<?php echo base_url(); ?>empresa/fill_sucursal", {
                            id_empresa : id_empresa
                        }, function(data) {
                            $("#id_sucursal").html(data);
                             $("#id_sucursal").selectpicker('refresh');
                        });
                    });
                });
            });
</script>