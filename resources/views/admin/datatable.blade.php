<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<title>Products Table</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<div class="mt-3">
<table class="table table-bordered" id="users-list">
<thead>
<tr>
<th>id</th>
<th>pname</th>
<th>pdesc</th>
<th>price</th>
</tr>
</thead>
<tbody>
 @if($products)
@foreach($products as $product)
	 
<tr>
<td>{{ $product->id }}</td>
 <td>{{ $product->pname }}</td>
 <td>{{ $product->pdesc }}</td>
 <td>{{ $product->price }}</td>
</tr>
 @endforeach
 @endif
 
</tbody>
</table>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
	$('#users-list').DataTable();
});
</script>
</body>
</html>