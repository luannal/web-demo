@extends('layout')
@section('title', $title)
@section('content')
<?=View::make('cat',['listtin'=>$listtin,'TenLT' =>$TenLT,'lang'=>$lang]);?>
@stop
@section('sidebar')
<?=View::make('tinxemnhieu',['lang'=>$lang]);?> 
<?=View::make('loaitin',['lang'=>$lang]);?> 
<?=View::make('banxemchua',['lang'=>$lang]);?>
@stop
