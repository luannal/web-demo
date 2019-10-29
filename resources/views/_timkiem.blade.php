@extends('layout')
@section('title', $title)
@section('content')
<?=View::make('timkiem',['lang'=>$lang,'tin'=>$tin,'tukhoa'=>$tukhoa]);?>
@stop
@section('sidebar')
<?=View::make('tinxemnhieu',['lang'=>$lang]);?> 
<?=View::make('loaitin',['lang'=>$lang]);?> 
<?=View::make('banxemchua',['lang'=>$lang]);?>
@stop
