<script type="text/javascript">
            $(document).ready(function() {
                $("#id_tipo").change(function() {
                    $("#id_tipo option:selected").each(function() {
                        id_tipo = $('#id_tipo').val();
                        $.post("<?php echo base_url(); ?>modelo/fill_marca", {
                            id_tipo : id_tipo
                        }, function(data) {
                            $("#id_marca").html(data);
                        });
                    });
                });
            });
               $(document).ready(function() {
                $("#id_marca").change(function() {
                    $("#id_marca option:selected").each(function() {
                        id_marca = $('#id_marca').val();
                        $.post("<?php echo base_url(); ?>producto/fill_modelo", {
                            id_marca : id_marca
                        }, function(data) {
                            $("#id_modelo").html(data);
                        });
                    });
                });
            });
        </script>