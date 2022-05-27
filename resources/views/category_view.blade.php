@extends('layouts.app')

@section('title', '{{$category->name}}')
@section('content')
<p>Mostrar los productos de la categoria con $products</p>
@endsection