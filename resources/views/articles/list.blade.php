 
 @if ($article->stock <= 0)
 <tr class="table-danger">
  <td>{{$article->code}}</td>
  <td>{{$article->barcode}}</td>
  <td>{{$article->code_desc}}</td>
  <td>{{$article->price_cost}}</td>
  <td>{{$article->price_sell}}</td>
  <td>{{$article->stock}}</td>
  <td>{{($article->under_stock)}}</td>

  <td>
    @include('articles.nav.select')
  </td>
</tr>
 @elseif ($article->stock > 0 && $article->stock <= $article->under_stock)
 <tr class="table-warning">
  <td>{{$article->code}}</td>
  <td>{{$article->barcode}}</td>
  <td>{{$article->code_desc}}</td>
  <td>{{$article->price_cost}}</td>
  <td>{{$article->price_sell}}</td>
  <td>{{$article->stock}}</td>
  <td>{{($article->under_stock)}}</td>

  <td>
    @include('articles.nav.select')
  </td>
</tr>
  @else
  <tr class="table-success">
    <td>{{$article->code}}</td>
    <td>{{$article->barcode}}</td>
    <td>{{$article->code_desc}}</td>
    <td>{{$article->price_cost}}</td>
    <td>{{$article->price_sell}}</td>
    <td>{{$article->stock}}</td>
    <td>{{($article->under_stock)}}</td>
  
    <td>
        @include('articles.nav.select')
    </td>
  </tr>
 @endif