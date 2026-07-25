@extends('components.master')
@section('contents')
    <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h1>Product Stock</h1>
                          <a href="/product/create" class="btn btn-primary">new product</a>
                        </div>
                        
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Product ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>P001</td>
                                <td>product.jpg</td>
                                <td>Iphone 13</td>
                                <td>$500</td>
                                <td>10</td>
                                <td>
                                  <a href="/product/edit" class="btn btn-sm btn-outline-primary mr-1">Edit</a>
                                  <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection