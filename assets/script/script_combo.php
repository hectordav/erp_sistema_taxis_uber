<script type="text/javascript">
            $(document).ready(function() {
                $("#id_tipo").change(function() {
                    $("#id_tipo option:selected").each(function() {
                        id_tipo = $('#id_tipo').val();
                        $.post("<?php echo base_url(); ?>modelo/fill_marca", {
                            id_tipo : id_tipo
                        }, function(data) {
                            $("#id_marca").html(data);
                            $("#id_marca").selectpicker('refresh');
                        });
                    });
                });
            });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $("#id_marca").change(function() {
                    $("#id_marca option:selected").each(function() {
                        id_marca = $('#id_marca').val();
                        $.post("<?php echo base_url(); ?>modelo/fill_modelo", {
                            id_marca : id_marca
                        }, function(data) {
                            $("#id_modelo").html(data);
                            $("#id_modelo").selectpicker('refresh');
                        });
                    });
                });
            });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $("#id_modelo").change(function() {
                    $("#id_modelo option:selected").each(function() {
                        id_modelo = $('#id_modelo').val();
                        $.post("<?php echo base_url(); ?>producto/fill_producto", {
                            id_modelo : id_modelo
                        }, function(data) {
                            $("#id_producto").html(data);
                            $("#id_producto").selectpicker('refresh');
                        });
                    });
                });
            });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $("#id_pais").change(function() {
                    $("#id_pais option:selected").each(function() {
                        id_pais = $('#id_pais').val();
                        $.post("<?php echo base_url(); ?>usuario/fill_ciudad", {
                            id_pais : id_pais
                        }, function(data) {
                            $("#id_ciudad").html(data);
                            $("#id_ciudad").selectpicker('refresh');
                        });
                    });
                });
            });
</script>