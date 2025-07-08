@props(['status' => 'info']) 
@php 
if($status === 'info'){ $bgColor = 'bg-blue-300';} 
if($status === 'error'){$bgColor = 'bg-red-500';} 

@endphp 
@if(session('message')) {{ session('message' )}} 
@endif 
