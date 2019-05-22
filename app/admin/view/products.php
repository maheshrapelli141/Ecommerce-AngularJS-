<div class="container custom-container" ng-init="loadProducts()" ng-init="editMode=false">
    <div class="titlebar">Products <span class="add"><button class="btn btn-primary" ng-click="addNewProduct()">Add</button> </span></div>

<!--    add new product-->
    <div  class="editModeSection">
        <button class="btn-link btn-lg " ng-click="productFieldToggle()"><span class="glyphicon glyphicon-remove-circle"></span></button>
        <div class="row" style="clear: both; max-width: 450px;">

                <form>

                    <input type="file"  name="image" onchange="angular.element(this).scope().uploadNewImage(this);">
                    <p ng-show="myform.image.$invalid && !myform.image.$pristine" class="help-block">Image/File is required.</p>
                </form>
          <label>Product Name </label></td>
                     <input type="text" ng-model="" class="form-control">
                   <label>Cost     </label>
                        <input type="text" ng-model="" class="form-control">
                            <label>Selling Price    </label>
                        <input type="text" ng-model="" class="form-control">


                        <label>Stock    </label>
                        <input type="text" ng-model="" class="form-control">


                        <label>Description   </label>
                        <textarea ng-model="" class="form-control" cols="40"></textarea>
                  <button ng-click="">Save</button></td>
            <button ng-click="newProductFieldToggle()">Cancel</button>
            </div>
        </div>
    </div>

<!--     edit products section-->
    <div ng-show="editMode" class="editModeSection">
        <button class="btn-link btn-lg close_editModeSection" ng-click="productFieldToggle()"><span class="glyphicon glyphicon-remove-circle"></span></button>
        <div class="row" style="clear: both">
            <div class="col-sm-4">
                <form>
                <input type="text" ng-model="currentProduct.productID" name="productID" hidden>
                <img ng-src="../uploads/{{currentProduct.productImage}}" height="150px" width="150px">
                <input type="file"  name="image" onchange="angular.element(this).scope().uploadImage(this);">
                <p ng-show="myform.image.$invalid && !myform.image.$pristine" class="help-block">Image/File is required.</p>
                </form>
            </div>
            <div class="col-sm-8">
                <table>
                    <tr>
                        <td><label>Product Name </label></td>
                        <td> <input type="text" ng-model="currentProduct.productName" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Cost     </label></td>
                        <td><input type="text" ng-model="currentProduct.productCost" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Selling Price    </label></td>
                        <td><input type="text" ng-model="currentProduct.productSell" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Stock    </label></td>
                        <td><input type="text" ng-model="currentProduct.productStock" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Description   </label></td>
                        <td><textarea ng-model="currentProduct.productDescription" class="form-control" cols="40"></textarea></td>
                    </tr>
                    <tr>
                        <td><button ng-click="updateProduct(currentProduct.productID,currentProduct.productName,currentProduct.productCost,currentProduct.productSell,currentProduct.productStock,currentProduct.productDescription)" ng-show="editMode">Save</button></td>
                        <td><button ng-click="productFieldToggle()" ng-show="editMode">Cancel</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

<!--    message if no items in products-->
    <div ng-if="list.length == 0" class="alert alert-info">No items in cart</div>


<!--    list of products in table-->
    <table class="table table-hover table-responsive">
        <thead>
        <th>#</th>
        <th>Product Name</th>
        <th>Cost price</th>
        <th>Selling price</th>
        <th>Profit</th>
        <th>Stock</th>
        <th>Edit / Delete</th>
        </thead>
        <tr ng-repeat="product in list">
            <td>{{$index+1}}</td>
            <td>{{ product.name}} </td>
            <td>{{product.cost_price}}</td>
            <td>{{product.selling_price}}</td>
            <td><span class="label" ng-class="(product.selling_price-product.cost_price)>0 ? 'label-success':'label-danger'">{{product.selling_price-product.cost_price}}</span></td>
            <td><span class="label" ng-class="product.stock>10 ? 'label-success':'label-danger'">{{product.stock}}</span></td>
            <td>
                <button ng-click="editProduct(product.product_id,product.name,product.cost_price,product.selling_price,product.stock,product.description,product.image)"  class=" btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button> /
                <button ng-click="editMode = true" class=" btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>

<!--                <div id="product_edit" ng-show="editMode">
                    <h1>Edit Mode</h1>
                    <span ng-show="editMode">
                    <input ng-model="product.name">
                </span>
                    <button ng-click="updateProductName(product.name,product.product_id); editMode=false" ng-show="editMode">Save</button>
                    <button ng-click="editMode=false" ng-show="editMode">Cancel</button>
                </div>-->
            </td>
        </tr>

    </table>
</div>

