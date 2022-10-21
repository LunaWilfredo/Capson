<?php
//registrar de productos en carrito
$carrito= CarController::addProducto();
?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="p-5 mx-5">
          <h1 class="display-1 mx-5 px-5 text-light">
            Carrito de compras
          </h1>
        </div>
      </div>
    </header>

    <form action="" method="post">
      <section id="">
        <div class="container p-5">
          <div class="row">
            <div class="col">
              <h3 class="h3">Detallado de Productos</h3>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                      <input type="text" class="form-control" value="1">
                    </td>
                    <td>
                      <button class="btn btn-primary">E</button>
                    </td>
                    <td>
                      <button class="btn btn-danger">D</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td>1</td>
                  </tr>
                </tbody>
              </table>
              <div class="h4">
                No hay productos seleccionados.
              </div>
            </div>
            <div class="col">
              <h3 class="h3">Detallado de Pago</h3>
              <table>
                <tr>
                  <th>SubTotal:</th>
                  <td>19.00</td>
                </tr>
                <tr>
                  <th>IGV:</th>
                  <td>1.00</td>
                </tr>
                <tr>
                  <th>Total</th>
                  <hr>
                  <td>20.00</td>
                </tr>
              </table>
              <div class="">
                <button class="btn btn-success">
                  Realizar Pedido
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>