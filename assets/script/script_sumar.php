<script type="text/javascript">
function sumar_cantidad_inventario() {
    var cantidad_anterior=Number(document.getElementById("txt_cantidad_anterior").value);
    var cantidad_sumar=Number(document.getElementById("txt_cantidad_sumar").value);
    var cantidad_nueva=cantidad_anterior+cantidad_sumar;
    document.getElementById("txt_nueva_cantidad").value =(cantidad_nueva);
}
function restar_cantidad_inventario() {
    var cantidad_anterior=Number(document.getElementById("txt_cantidad_anterior").value);
    var cantidad_sumar=Number(document.getElementById("txt_cantidad_restar").value);
    var cantidad_nueva=cantidad_anterior-cantidad_sumar;
    if (cantidad_nueva<0) {
        alert("Monto negativo");
        document.getElementById("txt_cantidad_restar").value =(0);
          document.getElementById("txt_nueva_cantidad").value =(0);
    }else{
        document.getElementById("txt_nueva_cantidad").value =(cantidad_nueva);

    } 
}
function calculo_tipo_precio_producto() {
    var precio_neto=Number(document.getElementById("txt_precio_neto").value);
    var iva_valor=Number(document.getElementById("txt_iva_valor").value);
    var iva=(precio_neto*iva_valor)/100;
    var total=precio_neto+iva;
    document.getElementById("txt_total").value =(total);
    document.getElementById("txt_iva").value =(iva); 
}
</script>