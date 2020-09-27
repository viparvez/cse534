@extends('layouts.app')

@section('content')

      <div class="container-fluid">
        <div class="row py-2">
          <div class="col-8">
            <div class="card bg-light shadow p-3" id="droppable">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the first card</p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card bg-light shadow p-3" id="draggable">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the first card</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row py-2">
          <div class="col-4">
            <div class="card bg-light shadow p-3"">
              <div class="card bg-light shadow p-2" id="draggable2">
                <div class="card-body text-center">
                  <h6 class="card-text">Heading</h6>
                  <p class="card-text">Some text inside the first card</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="card bg-light shadow p-3" id="filledCards" style="z-index:-1;">
              <div class="card bg-light shadow p-2" id="droppable2" style="z-index:-1;">
                <div class="card-body text-center">
                  <h6 class="card-text">Heading</h6>
                  <p class="card-text">Some text inside the first card</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid py-2">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Text</th>
              <th scope="col">Reply</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Hello</td>
              <td>Welcome, how may I help you?</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Price</td>
              <td>Please, have a price list!</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Feedback</td>
              <td>Give your valuable feedback</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Thank You</td>
              <td>Glad to have been a part of the service</td>
            </tr>
          </tbody>
        </table>
        </tbody>
        </table>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  @endsection
