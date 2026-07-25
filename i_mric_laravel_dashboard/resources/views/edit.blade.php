@extends('components.master')
@section('contents')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Edit Product Stock</h1>
                        <a href="/product" class="btn btn-outline-danger">Back</a>
                    </div>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                      </div>
                      <div class="form-group">
                        <label for="qty">Product Qty</label>
                        <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty">
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des">Description</label>
                        <textarea class="form-control" name="des" id="des" rows="2"></textarea>
                      </div>
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection