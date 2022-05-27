<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

    </head>
    <body>
       <h3  style="text-align: center;">Abarrotes "Anita"</h3>
        <h4>Fecha y hora de la compra: </h4>{{$data[0][0]->created_at}} <br>
       <h4>Total de la compra: ${{$data[0][0]->total}}.00 </h4>
        Detalle de la venta:
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th >Cantidad</th>
                    <th >Precio unitario</th>
                    <th >Total Producto</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data[0] as $d)
                <tr>
                    <th >{{$d->nombre}}</th>
                    <th >{{$d->cantidad}} unidad(es)</th>
                    <th>${{$d->precioUnitario}}.00</th>
                    <th >${{$d->precioTotal}}.00</th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th ></th>
                    <th ></th>
                    <th >TOTAL:</th>
                    <th >${{$data[0][0]->total}}.00</th>
                </tr>
            </tfoot>
        </table>

    <br><br>

    <div style="text-align: center;">
    Dirección: Cerro el Lobo #2101, Fracc. Real de San Pedro, Soledad de Graciano Sanchez
    <br>
    Tel. 1-29-56-68
    </div>    
</body>
</html>