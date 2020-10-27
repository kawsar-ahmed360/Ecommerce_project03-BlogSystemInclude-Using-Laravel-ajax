 <table class="table" style="border:1px solid red;padding: 4px;">
    <thead>
      <tr>
        <th>product_name</th>
        <th>product quentity</th>
        <th>product price</th>
      </tr>
    </thead>
    <tbody>

  @foreach($order as $shiporder)

      <tr>
        <td>{{$shiporder->products['product_title']}}</td>
        <td>{{$shiporder->product_quentity}}</td>
        <td>{{$shiporder->product_price}}</td>
      </tr>

      @endforeach
     
    </tbody>
  </table>