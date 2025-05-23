@extends('AppTemplate.app')

@section('style')
<style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container {
    width: 100%;
    margin: auto;
    overflow: hidden;
}





main {
    padding: 20px;
    /* background: #f4f4f4; */
    margin-top: 20px;
    border-radius: 5px;
}

main h2 {
    color: #007BFF;
    margin-bottom: 10px;
}

img {
    max-width: 70%;
    height: auto;
    display: block;
    margin: 20px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px;
}
h1 {
    text-align: center;
    text-transform: uppercase;
    margin: 0;
    font-size: 24px;
}

ul {
    list-style: disc inside;
    margin: 10px 0;
    padding-left: 20px;
}
</style>
@endsection

@section('title','Documentation')

@section('module','SGC APP')

@section('page','à propos')

@section('content')

@endsection
