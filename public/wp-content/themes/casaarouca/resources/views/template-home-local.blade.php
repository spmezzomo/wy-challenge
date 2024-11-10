{{--
  Template Name: Home Local
--}}

@php
  session_start();
  $_SESSION['pagina_origem'] = $_SERVER['REQUEST_URI'];
@endphp

@extends('layouts.app')
@section('content')
  @include('main-page-parts.highlights')
  @include('main-page-parts.nossa-historia')
  @include('main-page-parts.sobre')
  @include('main-page-parts.alojamentos')
  @include('main-page-parts.servicos')
  @include('main-page-parts.comentarios')
  @include('main-page-parts.sugestoes')
  @include('main-page-parts.faq')
  @include('main-page-parts.contactos')
@endsection