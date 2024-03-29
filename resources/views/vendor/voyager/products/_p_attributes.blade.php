<div class="col-lg-12">
    <label>Attributes (Size,...)</label>
    <br>
    <table class="table table-bordered" id="dynamicTable">
        <tr>
            <th>Name</th>
            <th>Value</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <tr>

            <td><input type="text" name="attrs[0][name]" placeholder="Enter your Name" class="form-control" /></td>
            <td><input type="text" name="attrs[0][value]" placeholder="Enter your value" class="form-control" /></td>
            <td><input type="text" name="attrs[0][quantity]" placeholder="Enter your Qty" class="form-control" /></td>
            <td><input type="text" name="attrs[0][price]" placeholder="Enter your Price" class="form-control" /></td>

            <td><button type="button" name="add" id="add" class="btn btn-success">Ajouter</button></td>
        </tr>
        @isset($attributesData)
            
                <tr>

                    <td>
                      
                        <div class="col-sm-6 col-md-12">
                            <select 
                               id="itemsData"
                               name="attributeData"
                               class="form-control"
                               onChange="getAttributes(this);"
                            >
                             <option>Please Select Attribute</option>
                              @foreach ($attributesData as $attr)
                                <option id="{{$attr->id}}" value="{{$attr->slug}}">{{$attr->name}}</option>
                              @endforeach
                            </select> 
                        </div>

                    </td>
                    <td><input id="attrs-value" type="text" name="attrset[0][value]" placeholder="Enter your value" class="form-control" /></td>
                    <td><input id="attrs-quantity" type="text" name="attrset[0][quantity]" value="" class="form-control" /></td>
                    <td><input id="attrs-price" type="text" name="attrset[0][price]" value="" class="form-control" /></td>

                    <td><button data-attrid="" type="button" class="btn btn-danger remove-tr deleteAttr">supprimer</button></td>
                </tr>
        @endisset

        @isset($attributesDataExist)
            @foreach ($attributesDataExist as $attr)
                    @php 
                    $values = $attr->values->whereIn('product_id',$product->id);
                    @endphp
                            <tr>

                                <td>
                                
                                    <div class="col-sm-6 col-md-12">
                                        <select id="itemsData{{$attr->id}}" class="form-control">
                    
                                        <option id="{{$attr->id}}" value="{{$attr->slug}}">{{$attr->name}}</option>
                                    
                                        </select> 
                                    </div>

                                </td>
                                <td>
                                    @foreach($values as $value )
                                    
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                <input 
                                                    id="attrs-value" 
                                                    type="text" 
                                                    name="attrsets[{{$attr->id}}][{{$attr->value}}]" 
                                                    value="{{$value->value}}" 
                                                    
                                                    class="form-control"
                                                    readonly

                                                />
                                        </div>
                                        
                                    @endforeach
                                </td>
                                <td>
                                
                                        @foreach($values as $value )
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                            <input 
                                                
                                                type="text" 
                                                name="attrsets[{{$attr->id}}][{{$attr->quantity}}]" 
                                                value="{{$value->quantity}}" 
                                                class="form-control" 
                                                readonly
                                            />
                                            </div>
                                        @endforeach
                                
                                </td>
                                <td>
                                
                                        @foreach($values as $value )
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                <input 
                                                
                                                    type="text" 
                                                    name="attrsets[{{$attr->id}}][{{$attr->price}}]" 
                                                    value="{{$value->price}}" 
                                                    class="form-control" 
                                                    readonly
                                                />
                                            </div>
                                        @endforeach
                                    
                                </td>

                                <td><button data-attrid="" type="button" class="btn btn-danger remove-tr deleteAttr">supprimer</button></td>
                            </tr>
            @endforeach
        @endisset
    
    </table>
    <br>
  </div><!-- /.col-lg-6 -->

  <script>
      /*********** define Global variable to use it in customeJs file ***/
      window.deleteAttrRoute = "{{route('admin.attrs.delete')}}";
      window.csrfToken = "{{  csrf_token() }}";
  </script>