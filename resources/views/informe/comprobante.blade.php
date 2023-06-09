<!DOCTYPE html>
<html lang="en">

</html>
<style>
    table {
        font-family: sans-serif;
        table-layout: fixed;
        margin: 0 auto;
        width: 100%;
        border: 1px solid #000;
    }
    table {
        border-spacing: 10px 10px;
    }
    tr {
        padding: 10px 0;
    }
    .title span {
        display: block;
        padding: 30px 0;
        font-size: 26px;
        font-weight: bold;
        text-align: right;
    }
    tr .date {
        font-size: 12px;
        font-weight: bold;
    }
    tr .date span {
        font-weight: normal;
    }
    tr .text-top span {
        text-align: center;
        font-size: 12XZpx;
        display: block;
        padding-bottom: 30px;
    }
    tr .text-bottom span {
        text-align: center;
        font-size: 10px;
        display: block;
        font-style: italic;
    }
    .text-key {
        font-weight: bold;
        font-size: 18px;
    }
    .text-value {
        min-width: 100%;
        font-size: 18px;
        border-bottom: 1px dotted #000;
    }
    .total-key {
        font-weight: bold;
        font-size: 25px;
    }
    .total-value {
        font-size: 25px;
        border-bottom: 1px dotted #000;
    }
    img{
        width: 200px ;
    }    

</style>
<table>
    <tbody>
        <tr>
            <td colspan="2">
                <img src='./img/logoPDF.png' alt="">
            </td>
            <td class="title" colspan="4"> <span>COMPROBANTE DE PAGO</span></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="date" colspan="2">Nro: <span>12321312</span></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="date" colspan="2">Periodo: <span>12/23/323</span> </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-top" colspan="6">
                <span>
                    Cochabamba - Bolivia
                </span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6"><span class="text-key">Titular: </span><span class="text-value">{{ $pago->pagoTitular->nombre }} {{ $pago->pagoTitular->apellido }}</span></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"><span class="text-key">Sitio (Parqueo):</span> <span class="text-value"> {{ $pago->pagoSitio->sitio }}</span></td>
            <td colspan="3"><span class="text-key">Zona:</span> <span class="text-value"> {{ $pago->pagoSitio->zona }}</span></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6"><span class="total-key">TOTAL: </span><span class="total-value">{{ $pago->pagoTarifa->precio }}</span> <span
                    class="total-key">Bs</span></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-bottom" colspan="6"> <span>Este comprobante es válido para tramites administrativos  <br>
                Universidad Mayor de San Simón </span></td>
            <td></td>
        </tr>
    </tbody>
</table>
