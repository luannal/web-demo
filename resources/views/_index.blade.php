@extends('layout')

@section('title','Tin Tức Tổng Hợp')

@section('tinnoibat')
<?=View::make('tinnoibat',['lang'=>$lang]);?>
@stop

@section('carousel')
<?=View::make('carousel',['lang'=>$lang]);?>
@stop

@section('2columns')
<?=View::make('2columns',['lang'=>$lang]);?>
@stop

@section('sidebar')
<?=View::make('tinxemnhieu',['lang'=>$lang]);?> 
<?=View::make('loaitin',['lang'=>$lang]);?> 
<?=View::make('banxemchua',['lang'=>$lang]);?>
@stop

@section('content')
<?=View::make('tinmoinhat',['lang'=>$lang]);?>
@stop
