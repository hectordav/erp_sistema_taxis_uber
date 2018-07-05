<script>
function fncSumar(){
var precio_compra = Number(document.getElementById("txt_p_compra").value);
var ganancia = Number(document.getElementById("txt_ganancia").value);
var valor_iva = Number(document.getElementById("txt_valor_iva").value);
var precio_neto = ((precio_compra*ganancia)/100);
var precio_neto_2=Number(document.getElementById("txt_precio_neto").value =  precio_neto+precio_compra);
var iva =(precio_neto_2*valor_iva)/100;
var iva_procentaje=iva;
var total=precio_neto_2+iva_procentaje;
document.getElementById("txt_iva").value =(iva_procentaje);
document.getElementById("txt_pvp").value =(total);
}
</script>